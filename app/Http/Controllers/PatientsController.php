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

}
