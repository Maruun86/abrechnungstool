<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * This Controller is for the first Part of Login using the RFID_Nr of Users 
     * Customers
     * After that general Loginbehavior is being managed by the Laravel Auth/LoginController
     * 
     */
   
    /**
     * Login for User.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        return view('auth.login');
    }

    public function logout(Request $request)
    {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');


    }

    /**
     * Login User.
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request,){
        $form = $request -> validate([
            'rfid_nr' => 'required'
        ]);
       
        $user = User::where('rfid_nr', $request->get('rfid_nr'))->first();
        $customer = Customer::where('rfid_nr', $request->get('rfid_nr'))->first();

        if($user)
        {
            if ($user->role->pin_needed)
            {
                //Pin needed for user redirect
                return view('auth.pin.show',[
                    'user' => $user
                ]);

            }
            if ($user->role->password_needed)
            {
                //Password needed for user redirect
                return view('auth.password.show',[
                    'user' => $user
                ]);

            }
            $credentials['email'] = $user->email; 
            $credentials['password'] = 'no_password'; 
            if((Auth::attempt($credentials))) {

                $request->session()->regenerate();
                return redirect('/home');
            }

        }else
        {
            return redirect(route('login'));
        }
        
    }
      /**
     * Authenticate User
     *
     * @return \Illuminate\Http\Response
     **/

    
     public function authenticate(Request $request, User $user) {
        $credentials = $request->validate([
            'password' => 'required'
        ]);
        
        $credentials['email'] = $user->email;
        if((Auth::attempt($credentials))) {

            $request->session()->regenerate();
            return redirect('/home');
        }
        
        return back();
    }


}
