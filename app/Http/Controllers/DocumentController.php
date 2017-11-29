<?php

namespace VirtualExpo\Http\Controllers;

use Illuminate\Http\Request;
use VirtualExpo\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::with('company')->get();
    }

    public function show($id)
    {
        return Document::with('company')
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        //$path = $request->file('path')->store('documents');
        
        $document = new Document();
        $document->name = $request->input('name');
        $document->path = 'documents/marketing.txt';
        $document->company_id = $request->input('company_id');
        $document->save();

        return response()->json($document, 201);
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $document->update($request->all());

        return $document;
    }

    public function delete($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return 204;
    }
}
