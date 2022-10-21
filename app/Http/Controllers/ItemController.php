<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Shows a list of all ressources.
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        return view("items.list", [
        'items' => Item::paginate(10)
        ]);
    }
    /**
     * Shows the Create Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('items.create',[
            'vats' => Vat::all()
        ]);
    }
    /**
     * Shows the edit Form.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item){
        return view('items.edit',[
            'vats' => Vat::all(),
            'item' => $item
        ]);
    }
    /**
     * Stores the ressource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Updates the ressource.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Deletes the ressource.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item){
        $item->vendors()->detach();
        $item->delete();
        return redirect(route('LIST_ITEMS'));
    }
    
}
