<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayoutsController extends Controller
{
    public function show() {
        return view("vendor_layouts.crud.show", [
        'layouts' => Layout::all()
        ]);
    }
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
    
    public function add(Request $request){
        $form = $request -> validate([
            'name' => 'required',
            'view_path' => 'required'
        ]);
        Layout::create($form);

        return redirect(route('SHOW_LAYOUTS'))->with('message', 'Listing created successfully!');
    }

}
