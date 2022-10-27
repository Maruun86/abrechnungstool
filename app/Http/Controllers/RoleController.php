<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Shows the Create View.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create',[
            'perm_customers' => Permission::where('gate_name','LIKE', '%'.'-customer'.'%')->get(),
            'perm_items' => Permission::where('gate_name','LIKE', '%'.'-item'.'%')->get(),
            'perm_vendors' => Permission::where('gate_name','LIKE', '%'.'-vendor'.'%')->get(),
            'perm_layouts' => Permission::where('gate_name','LIKE', '%'.'-layout'.'%')->get(),
            'perm_vats' => Permission::where('gate_name','LIKE', '%'.'-vat'.'%')->get(),
            'perm_events' => Permission::where('gate_name','LIKE', '%'.'-event'.'%')->get(),
            'perm_roles' => Permission::where('gate_name','LIKE', '%'.'-role'.'%')->get()
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
            'auth_needed' => 'required'
        ]);

        if($request->get('auth_needed') == 'pin'){
            $form['pin_needed'] = true;
        }
        if($request->get('auth_needed') == 'password'){
            $form['password_needed'] = true;
        }
        $role = Role::create($form);

        foreach ($request->request as $key => $value ) {
            if($key !== '_token' && $key !== 'name' && $key !== 'auth_needed')
            {
                $permission = Permission::where('gate_name', $key)->first();    
                $role->permissions()->attach($permission);
            }
        }

        return redirect(route('LIST_USERS'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Shows the Edit View.
     *@param  App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role){
        return view('roles.edit',[
            'role' => $role,
            'perm_customers' => Permission::where('gate_name','LIKE', '%'.'-customer'.'%')->get(),
            'perm_items' => Permission::where('gate_name','LIKE', '%'.'-item'.'%')->get(),
            'perm_vendors' => Permission::where('gate_name','LIKE', '%'.'-vendor'.'%')->get(),
            'perm_layouts' => Permission::where('gate_name','LIKE', '%'.'-layout'.'%')->get(),
            'perm_vats' => Permission::where('gate_name','LIKE', '%'.'-vat'.'%')->get(),
            'perm_events' => Permission::where('gate_name','LIKE', '%'.'-event'.'%')->get(),
            'perm_roles' => Permission::where('gate_name','LIKE', '%'.'-role'.'%')->get()
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $form = $request -> validate([
            'name' => 'required',
        ]);

        $form['password_needed'] = false;
        $form['pin_needed'] = false;

        if($request->get('auth_needed') == 'pin'){
            $form['pin_needed'] = true;
        }
        if($request->get('auth_needed') == 'password'){
            $form['password_needed'] = true;
        }
        
        $role->permissions()->detach();
        foreach ($request->request as $key => $value ) {
            if($key !== '_token' && $key !== 'name' && $key !== 'auth_needed' && $key !== '_method')
            {
                $permission = Permission::where('gate_name', $key)->first();
                $role->permissions()->attach($permission);
            }
        }
        $role->update($form);
        return redirect(route('LIST_USERS'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
