<?php

namespace VirtualExpo\Http\Controllers;

use Illuminate\Http\Request;
use VirtualExpo\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::with('company')->get();
    }

    public function show($id)
    {
        return Contact::with('company')
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->all());

        return response()->json($contact, 201);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return $contact;
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return 204;
    }
}
