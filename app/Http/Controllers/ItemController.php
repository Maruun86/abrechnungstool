<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list() {
        return view("items.list", [
        'items' => Item::paginate(10)
        ]);
    }
    public function create(){
        return view('items.create',[
            'vats' => Vat::all()
        ]);
    }
    public function edit(Item $item){
        return view('items.edit',[
            'vats' => Vat::all(),
            'item' => $item
        ]);
    }
    public function store(Request $request){
        $form = $request -> validate([
            'name' => 'required',
            'preis' => 'required',
            'prozent_in_decimal' => 'required'
        ]);
        $vat = Vat::where('prozent_in_decimal', $form['prozent_in_decimal'])
            ->first();
        $form['vat_id'] = $vat->id;
        Item::create($form);

        return redirect(route('LIST_ITEMS'));
    }
    public function update(Request $request, Item $item){
        $form = $request -> validate([
            'name' => 'required',
            'preis' => 'required',
            'prozent_in_decimal' => 'required'
        ]);
        $vat = Vat::where('prozent_in_decimal', $form['prozent_in_decimal'])
            ->first();
        $item->name = $request->get('name');
        $item->preis = $request->get('preis');
        $item->vat_id = $vat->id;
        $item->save();

        return redirect(route('LIST_ITEMS'));
    }
    
}
