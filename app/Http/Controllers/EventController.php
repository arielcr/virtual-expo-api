<?php

namespace VirtualExpo\Http\Controllers;

use Illuminate\Http\Request;
use VirtualExpo\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::with('location.state.country')->with('dates')->get();
    }

    public function show($id)
    {
        return Event::with('location.state.country')
            ->with('dates')
            ->with('stands.company')
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return 204;
    }
}
