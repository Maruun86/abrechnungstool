<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list() {
        return view("items.list", [
        'items' => Item::all()
        ]);
    }
    public function create(){
        return view('items.create',[
            'vats' => Vat::all()
        ]);
    }
    public function add(Request $request){
        $form = $request -> validate([
            'name' => 'required',
            'preis' => 'required',
            'prozent_in_decimal' => 'required'
        ]);
        $vat = Vat::where('prozent_in_decimal', $form['prozent_in_decimal'])
            ->first();
        $form['vat_id'] = $vat->id;
        Item::create($form);

        return redirect(route('LIST_ITEMS'))->with('message', 'Listing created successfully!');
    }

}
