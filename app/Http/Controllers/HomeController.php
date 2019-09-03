<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function patient()
    {
        $data = Patient::orderBy('name', 'asc')->paginate(100);
        return view('patient.patient', compact('data'));
    }

    public function addpatient()
    {
        return view('patient.addpatient');
    }

    public function enterpatient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nhis_id' => 'required|unique:patients',
            'hmo' => 'required',
            'phone' => 'required',
            'ministry' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'marital' => 'required',
            'occupation' => 'required',
            'religion' => 'required',
            'relationship' => 'required',
            'summary' => 'required',
            'diagnosis' => 'required',
            'date' => 'required',
        ]);
        Patient::create([
            'name' => $request['name'],
            'patient_id' => rand(),
            'nhis_id' => $request['nhis_id'],
            'hmo' => $request['hmo'],
            'phone' => $request['phone'],
            'ministry' => $request['ministry'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'dob' => $request['dob'],
            'marital' => $request['marital'],
            'occupation' => $request['occupation'],
            'religion' => $request['religion'],
            'relationship' => $request['relationship'],
            'summary' => $request['summary'],
            'diagnosis' => $request['diagnosis'],
            'date' => $request['date'],
        ]);
        Session::flash('success', 'Patient Added Successfuly');
        return redirect('patient');
    }


}
