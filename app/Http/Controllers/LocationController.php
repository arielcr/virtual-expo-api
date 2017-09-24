<?php

namespace VirtualExpo\Http\Controllers;

use Illuminate\Http\Request;
use VirtualExpo\Location;

class LocationController extends Controller
{
    public function index()
    {
        return Location::with('state.country')->get();
    }

    public function show($id)
    {
        return Location::with('state.country')
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        $location = Location::create($request->all());

        return response()->json($location, 201);
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $location->update($request->all());

        return $location;
    }

    public function delete($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return 204;
    }
}
