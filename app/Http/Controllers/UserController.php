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
            'users' => User::paginate(10)
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
        $form = $request -> validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users','email')],
            'role_id' => 'required',
            'vendor_id' => 'required',
            'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')]
        ]);

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
    public function edit(user $user){
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
    public function update(Request $request, user $user){
        $form = $request -> validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users','email')->ignore($user->email, 'email')],
            'role_id' => 'required',
            'vendor_id' => 'required',
            'rfid_nr' => ['required',  Rule::unique('users','rfid_nr')->ignore($user->rfid_nr, 'rfid_nt')]
        ]);

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

}
