<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Patient;
use Session;

class PatientsController extends Controller
{
    public function index()
    {

    	$patients = Patient::all();

        return view('patients.index')->withPatients($patients);
    }

    public function create()
    {
    	return view('patients.create');
    }

    public function store(Request $request)
    {
    	//dd($request->all());

    	$this->validate($request, [
    		'firstname' => 'required',
    		'lastname' => 'required'
    	]);

    	$input = $request->all();

    	Patient::create($input);

		Session::flash('flash_message', 'Patient successfully added!');

    	return redirect()->back();
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.show')->withPatient($patient);
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.edit')->withPatient($patient);
    }

    public function update($id, Request $request)
    {
        $patient = Patient::findOrFail($id);

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required'
        ]);

        $input = $request->all();

        $patient->fill($input)->save();

        Session::flash('flash_message', 'Patient successfully updated!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        Session::flash('flash_message', 'Patient successfully deleted!');

        return redirect()->route('patients.index');
    }

}
