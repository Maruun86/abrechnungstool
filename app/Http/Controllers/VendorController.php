<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Layout;
use App\Models\Vendor;
use App\Models\ItemVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    public function index() {
        return view("index", [
        'vendors' => Vendor::paginate(10)
        ]);
    }

    public function show(Vendor $vendor, ) {
        $prefix = "vendor_layouts.";
        $suffix = $vendor->layout->view_path;
        $view = $prefix.$suffix;

        return view($view, [
        'vendor' => $vendor,
        ]);
    }

    public function list() {
        return view("vendors.list", [
        'vendors' => Vendor::paginate(10)
        ]);
    }    

    public function create(){
        return view('vendors.create',[
            'layouts' => Layout::all(),
            'items' => Item::all()
        ]);
    }
    public function edit(Vendor $vendor){
        return view('vendors.edit',[
            'layouts' => Layout::all(),
            'items' => Item::all(),
            'vendor' => $vendor
        ]);
    }
    public function store(Request $request){
        $form = $request -> validate([
            'name' => 'required',
            'layout_id' => 'required'
        ]);
        $layout = Layout::where('name', $form['layout_id'])
            ->first();
        $form['layout_id'] = $layout->id;
        $vendor = Vendor::create($form);

        foreach ($request->request as $key => $value ) {
            if($key !== '_token' && $key !== 'name' && $key !== 'layout_id')
            {
                $item = Item::where('name', $key)
                ->first();
                $vendor->items()->attach($item);
            }
        }

        return redirect(route('LIST_VENDORS'));
    }
    public function update(Request $request, Vendor $vendor){
        $form = $request -> validate([ 
            'name' => 'required',
            'layout_id' => 'required'
        ]);
        $layout = Layout::where('name', $form['layout_id'])
            ->first();

        $vendor->name = $request->get('name');
        $vendor->layout_id = $layout->id;
        $vendor->save();

        $vendor->items()->detach();
        foreach ($request->request as $key => $value ) {
            if($key !== '_token' && $key !== 'name' && $key !== 'layout_id'  && $key !== '_method')
            {

                $item = Item::where('name', $key)
                ->first();
                $vendor->items()->attach($item);
            }
        }
        return redirect(route('LIST_VENDORS'));
    }
    public function destroy(Vendor $vendor){
        $vendor->items()->detach();
        $vendor->delete();
        return redirect(route('LIST_VENDORS'));
    }
}
