<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view("customers.list", [
            'customers' => Customer::paginate(10)
            ]);
    }

    /**
     * Shoes the create Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('customers.create');
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
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required',
            'rfid_nr' => ['required',  Rule::unique('customers','rfid_nr')]
        ]);

        Customer::create($form);

        return redirect(route('LIST_CUSTOMERS'));
    }

    /**
     * Shows the edit Form.
     *
     * @param  App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer){
        return view('customers.edit',[
            'customer' => $customer

        ]);
    }
   /**
     * Updates the ressource.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  App\Models\Item  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer){
       $request -> validate([
        'vorname' => 'required',
        'nachname' => 'required',
        'email' => 'required',
        'rfid_nr' => ['required',  Rule::unique('customers')->ignore($customer->rfid_nr, 'rfid_nr')]
        ]);


        $customer->vorname =  $request->get('vorname');
        $customer->nachname =  $request->get('nachname');
        $customer->email =  $request->get('email');
        $customer->rfid_nr = $request->get('rfid_nr');
        $customer->save();  

        return redirect(route('LIST_CUSTOMERS'));
    }
        

    /**
     * Toggles the active state for the customer.
     *
     * @param  App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function toggle(Customer $customer)
    {
        if ($customer->active)
        {
            $customer->active = false;
            $customer->save();
        }
        else{
            $customer->active = true;
            $customer->save();

        }
        return redirect(route('LIST_CUSTOMERS'));
    }

    /**
     * Deletes the model.
     *
     * @param  App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer){
        $customer->delete();
        return redirect(route('LIST_CUSTOMERS'));
    }

}
