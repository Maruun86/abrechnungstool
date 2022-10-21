<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class LayoutsController extends Controller
{
    /**
     * Shows a list of all ressources.
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        return view("vendor_layouts.crud.list", [
        'layouts' => Layout::paginate(10)
        ]);
    }
    /**
     * Shows the Create Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $files = Storage::disk('layouts')->files();
        $explodedFiles = [];
        foreach ($files as $file) {
            $file = explode('.',$file);
            $file = $file[0];
            array_push($explodedFiles,$file);
        }
        return view("vendor_layouts.crud.create", [
            'filelist' => $explodedFiles
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
            'view_path' => 'required'
        ]);
        Layout::create($form);

        return redirect(route('LIST_LAYOUTS'));
    }
    /**
     * Shows the edit Form.
     *
     * @param  App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Layout $layout){
        $files = Storage::disk('layouts')->files();
        $explodedFiles = [];
        foreach ($files as $file) {
            $file = explode('.',$file);
            $file = $file[0];
            array_push($explodedFiles,$file);
        }
        return view("vendor_layouts.crud.edit", [
            'filelist' => $explodedFiles,
            'layout' => $layout
        ]);
    }
    /**
     * Updates the ressource.
     *
     * @param  Illuminate\Http\Request;  $request   
     * @param  App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layout $layout)
    {
        $form = $request -> validate([
            'name' => 'required',
            'view_path' => 'required'
        ]);
        $layout->update($form);

        return redirect(route('LIST_LAYOUTS'));
    }
     /**
     * Deletes the ressource.
     *
     * @param  App\Models\Layout;  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        $vendors = Vendor::where('layout_id', $layout->id)->get();
        
        foreach ($vendors as $vendor) {
            $vendor->layout_id = Layout::where('view_path', 'no_layout')->first()->id;
            $vendor->save();
        }
       
        $layout->delete();
       
        return redirect(route('LIST_LAYOUTS'));
    }

}
