<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RFID;
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
        //id is here the RFID
        $form = $request -> validate([
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required',
            'rfid_nr' => ['required',  Rule::unique('rfids','rfid_nr')]
        ]);

        $rfid = RFID::create([
            'rfid_nr' => $request->get('rfid_nr')
        ]);
        $form['rfid_id'] = $rfid->id;
        Customer::create($form);

        return redirect(route('LIST_CUSTOMERS'));

    }
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
    public function destroy(Customer $customer){
        $customer->rfid()->delete();
        return redirect(route('LIST_CUSTOMERS'));
    }

}
