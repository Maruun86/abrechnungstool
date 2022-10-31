<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view("users.list", [
            'users' => User::paginate(10),
            'roles' => Role::paginate(10)
            ]);
    }

    /**
     * Shoes the create Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('users.create', [
            'vendors' => Vendor::all(),
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::find($request->get('role_id'));
        if($request->get('role_id') != 'NULL')
        {
            if($role->pin_needed | $role->password_needed)
            {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')],
                    'role_id'   => 'required',
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
                ]);

                $form['password'] = bcrypt('temp');
                $newUser = User::create($form);
                $role = Role::find($request->get('role_id'));
                $vendor = Vendor::find($request->get('vendor_id'));
                $newUser->role()->associate($role)->save();
                $newUser->vendor()->associate($vendor)->save();

                return redirect()->route('PASSWORD_USER', [$newUser]);
            }
            else
            {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')],
                    'vendor_id' => 'required',
                    'role_id' => ['required','numeric'],
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
                ]);
    
                $form['password'] = bcrypt('no_password');
                $newUser = User::create($form);
                $role = Role::find($request->get('role_id'));
                $vendor = Vendor::find($request->get('vendor_id'));
                $newUser->role()->associate($role)->save();
                $newUser->vendor()->associate($vendor)->save();

                return redirect(route('LIST_USERS'));
    
            }      
        }
       

     
    }
         /**
     * Show the Password/Pin View.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(User $user)
    {
        return view('users.password',[
            'user' => $user
        ]);
    }

     /**
     * Sets the Password/Pin.
     *
     * @param  App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function setpassword(Request $request, User $user)
    {
        $form = $request->validate([
            'password' => 'required',
            'repeat'   => 'required|same:password',
        ]);        

            $form['password'] = bcrypt( $request['password']);
            $user->update($form);

            return redirect(route('LIST_USERS'));
       
    }

    /**
     * Shows the edit Form.
     *
     * @param  App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        return view('users.edit',[
            'user' => $user,
            'vendors' => Vendor::all(),
            'roles' => Role::all()

        ]);
    }
   /**
     * Updates the ressource.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  App\Models\Item  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){
        
        if($request->get('role_id') != 0)
        {
            $role = Role::find($request->get('role_id'));
            if($request->get('role_id') != 'NULL')
            {
                if($role->pin_needed | $role->password_needed)
                {
                    $form = $request -> validate([
                        'name' => 'required',
                        'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
                        'role_id'   => 'required',
                        'vendor_id' => 'required',
                        'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nr')]
                    ]);
                    $form['password'] = bcrypt('temp');
                    $role = Role::find($request->get('role_id'));
                    $vendor = Vendor::find($request->get('vendor_id'));
                    $user->role()->associate($role)->save();
                    $user->vendor()->associate($vendor)->save();
                    $user->update($form);
    
                    return redirect()->route('PASSWORD_USER', [$user]);
                }
                else
                {
                    $form = $request -> validate([
                        'name' => 'required',
                        'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
                        'vendor_id' => 'required',
                        'role_id' => ['required','numeric'],
                        'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nr')]
                    ]);
        
                    $form['password'] = bcrypt('no_password');
                    $role = Role::find($request->get('role_id'));
                    $vendor = Vendor::find($request->get('vendor_id'));
                    $user->role()->associate($role)->save();
                    $user->vendor()->associate($vendor)->save();
                    $user->update($form);

                    return redirect(route('LIST_USERS'));
        
                }      
            }
        }
        else
        {
        $form = $request -> validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
            'role_id' => 'required',
            'vendor_id' => 'required',
            'rfid_nr' => ['required', Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nr')]
        ]);
     }
        $role = Role::find($request->get('role_id'));
        $vendor = Vendor::find($request->get('vendor_id'));
        $user->role()->associate($role)->save();
        $user->vendor()->associate($vendor)->save();
        $user->update($form);

        return redirect(route('LIST_USERS'));
    }
        

    /**
     * Toggles the active state for the user.
     *
     * @param  App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function toggle(user $user)
    {
        if ($user->active)
        {
            $user->active = false;
            $user->save();
        }
        else{
            $user->active = true;
            $user->save();

        }
        return redirect(route('LIST_USERS'));
    }

    /**
     * Deletes the model.
     *
     * @param  App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user){
        $user->delete();
        return redirect(route('LIST_USERS'));
    }

    //Below Everything related to Login and Authentification/Authorization+

    /**
     * Login for User.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        return view('auth.login');
    }

    /**
     * Login User.
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request){
        $form = $request -> validate([
            'rfid_nr' => 'required'
        ]);
       
        if( $user = User::where('rfid_nr', $request->get('rfid_nr'))->first())
        {
            if ($user->role->pin_needed)
            {
                //Pin needed for user redirect
                return redirect(route('PINLogin', $user));
            }
            if ($user->role->password_needed)
            {
                //Pin needed for user redirect
                return redirect(route('PINLogin', $user));
            }
    
           
        }else
        {
            return redirect(route('/'));
        }
        
    }
      /**
     * Authenticate User
     *
     * @return \Illuminate\Http\Response
     **/
     public function authenticate(Request $request, User $user) {
        $formFields = $request->validate([
            'password' => 'required'
        ]);
       
        $formFields['email'] = $user->email;
        if(auth()->attempt($formFields)) {

            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }
        
        return back();
    }
    /**
     * If user needs Pin .
     *
     * @return \Illuminate\Http\Response
     */
    public function PINLogin(User $user)
    {

        return view('auth.pin.show',[
            'user' => $user
        ]);
    }
}
