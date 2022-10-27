<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("index", [
            'vendors' => Vendor::paginate(10),
            'event' => Event::where('event_running', 1)->first()
            ]);
    }
    public function redirect()
    {
        return redirect(route('HOME'));
    }
}
