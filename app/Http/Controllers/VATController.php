<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use Illuminate\Http\Request;

class VATController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list() {
        return view("vats.list", [
        'vats' => Vat::paginate(10)
        ]);
    } 
       
    public function create()
    {
        return view("vats.create");
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
            'prozent_in_decimal' => 'required'
        ]);

        if($request->get('prozent_in_decimal') > 0)
        {
            Vat::create($form);
        }
      
        return redirect(route('LIST_VATS'));
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
     * Display the edit form for specific resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vat $vat)
    {
        return view("vats.edit",[
            'vat' => $vat
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vat $vat)
    {
        $form = $request -> validate([
            'prozent_in_decimal' => 'required'
        ]);

        $vat->update($form);

        return redirect(route('LIST_VATS'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat)
    {
        //Checks if a alternative Vat exist, if not create a 0 and assign it before delete it from
        //connected items.
        if($newVat = Vat::where('prozent_in_decimal', 0)->first())
        {
                $vat->items()->update(['vat_id' => $newVat->id]);
        }
        else
        {
            $newVat = Vat::create([
                'prozent_in_decimal' => 0
            ]);
            $vat->items()->update(['vat_id' => $newVat->id]);
            
        }
        $vat->delete();

        return redirect(route('LIST_VATS'));
    }
}
