<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Event;
use App\Models\Layout;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Shows the cards of all ressources.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index() {
        return view("index", [
        'vendors' => Vendor::paginate(10),
        'event' => Event::where('event_running', 1)->first()
        ]);
    }
    /**
     * Shows the specific view connected for this ressource.
     *
     * @param  App\Models\Vendor  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor, ) {
        $prefix = "vendor_layouts.";
        $suffix = $vendor->layout->view_path;
        $view = $prefix.$suffix;

        return view($view, [
        'vendor' => $vendor,
        ]);
    }

    public function shop(Event $event , Vendor $vendor) {
        $prefix = "vendor_layouts.";
        $suffix = $vendor->layout->view_path;
        $view = $prefix.$suffix;

        
        return view($view, [
        'vendor' => $vendor,
        'event' => $event
        ]);
    }


    /**
     * Shows a list of all ressources.
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        return view("vendors.list", [
        'vendors' => Vendor::paginate(10)
        ]);
    }    

    /**
     * Shows the Create Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('vendors.create',[
            'layouts' => Layout::all(),
            'items' => Item::all()
        ]);
    }

     /**
     * Shows the edit Form.
     *
     * @param  App\Models\Vendor  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor){
        return view('vendors.edit',[
            'layouts' => Layout::all(),
            'items' => Item::all(),
            'vendor' => $vendor
        ]);
    }

    /**
     * Stores the ressource.
     *
     * @param  Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $form = $request -> validate([
            'name' => 'required',
            'layout_id' => 'required'
        ]);
        $layout = Layout::where('name', $form['layout_id'])
            ->first();
        $form['layout_id'] = $layout->id;
        Vendor::create($form);
        $vendor = Vendor::where('name', $form['name'])->first();
        foreach ($request->request as $key => $value ) {

            if($key !== '_token' && $key !== 'name' && $key !== 'layout_id')
            {
                $key = str_replace('_',' ', $key,);
                $item = Item::where('name', $key)
                ->first();
                $vendor->items()->attach($item);
            }
        }

        return redirect(route('LIST_VENDORS'));
    }

    /**
     * Updates the ressource.
     *
     * @param  Illuminate\Http\Request;  $request   
     * @param  App\Models\Vendor  $layout
     * @return \Illuminate\Http\Response
     */
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
                
                $key = str_replace('_',' ', $key,);
                $item = Item::where('name', $key)
                ->first();
                $vendor->items()->attach($item);
            }
        }
        return redirect(route('LIST_VENDORS'));
    }

    /**
     * Deletes the ressource.
     *
     * @param  App\Models\Vendor  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor){
        $vendor->items()->detach();
        $vendor->delete();
        return redirect(route('LIST_VENDORS'));
    }

}
