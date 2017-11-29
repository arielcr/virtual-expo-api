<?php

namespace VirtualExpo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use VirtualExpo\Company;

class CompanyController extends Controller{
    public function index(){
        return Company::with('contacts')->with('documents')->with('stands.visitors')->get();
    }

    public function show($id)
    {
        return Company::with('contacts')->with('documents')->with('stands.visitors')
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        //$path = $request->file('logo')->store('images/companies');

        $company = new Company();
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->logo = 'images/companies/1.jpg';
        $company->save();

        return response()->json($company, 201);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return 204;
    }
}
