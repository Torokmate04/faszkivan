<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();     
        return view('events.index', ['esemenyek' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {


    //    Event::create($request->all())->save();

         $request->thumbnail->storeAs(
            'event_thumbnails',
            'Event_IMG'.$request->name,
            'public'
        );
        $fileName = 'Event_IMG'.$request->name;

        $event = Event::create($request->all());
        $event->thumbnail=$fileName;
        $event->save();

       return back()->with('message', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show',['esemeny' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', ['esemeny' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());
        $fileName = "";

        if($request->thumbnail != null){
            //faljnev kimentese
            $fileName = 'Event_IMG'.$request->name;
            $event->thumbnail = $fileName;

            //file feltotese
            $request->thumbnail->storeAs(
                'event_thumbnails',
                'Event_IMG'.$request->name,
                'public'
            ); 
            $event->update();
        }
        return redirect()->route('events.index')->with('success','Event Updated Succesfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success','Event Deleted Succesfully');
    }
}
