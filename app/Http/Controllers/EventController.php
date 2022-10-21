<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view("events.list", [
            'events' => Event::paginate(10)
            ]);
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
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Event::create($form);

        return redirect(route('LIST_EVENTS'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    { 
        return view("events.show", [
            'event' => $event,
            'users' => User::all()
            ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function edit(Event $event){
        return view('events.edit',[
            'event' => $event
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $form = $request -> validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $event->update($form);

        return redirect(route('LIST_EVENTS'));
    }
    
    /**
     * Set the event_running state for the customer.
     *
     * @param  App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function toggle(Event $event)
    {
        if ($event->event_running)
        {
            $event->event_running = false;
            $event->save();
        }
        else{
            $allEvents = Event::all();
            foreach ($allEvents as $checkEvent) {
               if($checkEvent->event_running)
               {
                $checkEvent->event_running = false;
                $checkEvent->save();
               }
            }
            $event->event_running = true;
            $event->save();

        }
        return redirect(route('LIST_EVENTS'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('LIST_EVENTS'));
    }
        /**
     * Attaches chosen Users on Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users(Request $request, Event $event)
    {
        $event->users()->detach();
        foreach ($request->request as $key => $value ) {
            if($key !== '_token' && $key !== '_method')
            {
                $user = User::find($value);
                $user->events()->attach($event);
            }
        }
        return redirect(route('SHOW_EVENT', $event));
    }
}
