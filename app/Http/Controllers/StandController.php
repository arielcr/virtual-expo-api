<?php

namespace VirtualExpo\Http\Controllers;

use Illuminate\Http\Request;
use VirtualExpo\Stand;

class StandController extends Controller
{
    public function index()
    {
        return Stand::with('company.contacts')->with('visitors')->get();
    }

    public function show($id)
    {
        return Stand::with('company.contacts')->with('visitors')->with('event')
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        $stand = Stand::create($request->all());

        return response()->json($stand, 201);
    }

    public function update(Request $request, $id)
    {
        $stand = Stand::findOrFail($id);
        $stand->update($request->all());

        return $stand;
    }

    public function delete($id)
    {
        $stand = Stand::findOrFail($id);
        $stand->delete();

        return 204;
    }
}
