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
        if($request->get('role_id') != 0)
        {
            if(Role::find($request->get('role_id'))->pin_needed)
            {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')],
                    'pin'   => ['required', 'integer','digits:5'],
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
                ]);
            }elseif (Role::find($request->get('role_id'))->password_needed) {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')],
                    'password'   => 'required',
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
                ]);
            }
            else {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')],
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
                ]);
            }
        }
        else
        {
        $form = $request -> validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users','email')],
            'vendor_id' => 'required',
            'role_id' => 'required',
            'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
        ]);
        }
       
        if(Role::find($request->get('role_id'))->pin_needed)
        {
            $form['password'] = bcrypt( $request['pin']);
        }elseif(Role::find($request->get('role_id'))->password_neeeded)
        {
            $form['password'] = bcrypt( $request['password']);
        }else{
            $form['password'] = bcrypt('no_password');
        }



        $newUser = User::create($form);
        $role = Role::find($request->get('role_id'));
        $vendor = Role::find($request->get('vendor_id'));

        $newUser->role()->associate($role)->save();
        $newUser->vendor()->associate($vendor)->save();

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
            if(Role::find($request->get('role_id'))->pin_needed)
            {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required',Rule::unique('users','email')->ignore($user->email, 'email')],
                    'role_id' => 'required',
                    'pin'   => ['required', 'integer','digits:5'],
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nt')]
                ]);
            }elseif (Role::find($request->get('role_id'))->password_needed) {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
                    'role_id' => 'required',
                    'password'   => 'required',
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nt')]
                ]);
            }
            else {
                $form = $request -> validate([
                    'name' => 'required',
                    'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
                    'role_id' => 'required',
                    'vendor_id' => 'required',
                    'rfid_nr' => ['required', Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nt')]
                ]);
            }
        }
        else
        {
        $form = $request -> validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
            'role_id' => 'required',
            'vendor_id' => 'required',
            'rfid_nr' => ['required', Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nt')]
        ]);
     }
        $role = Role::find($request->get('role_id'));
        $vendor = Role::find($request->get('vendor_id'));
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
