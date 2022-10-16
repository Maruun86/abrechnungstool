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
        'vendors' => Vendor::all()
        ]);
    }

    public function show(Vendor $vendor, ) {
        $prefix = "vendor_layouts.";
        $suffix = $vendor->layout->view_path;
        $view = $prefix.$suffix;

        return view($view, [
        'vendor' => $vendor,
        'items' => Item::all()
        ]);
    }

    public function list() {
        return view("vendors.list", [
        'vendors' => Vendor::all()
        ]);
    }    

    public function create(){
        return view('vendors.create',[
            'layouts' => Layout::all()
        ]);
    }

    public function add(Request $request){
        $form = $request -> validate([
            'name' => 'required',
            'layout_id' => 'required'
        ]);
        $layout = Layout::where('name', $form['layout_id'])
            ->first();
        $form['layout_id'] = $layout->id;
        Vendor::create($form);

        return redirect(route('LIST_VENDORS'))->with('message', 'Listing created successfully!');
    }

}
