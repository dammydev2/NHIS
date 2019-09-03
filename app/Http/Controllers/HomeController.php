<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('patient.patient');
    }

    public function addpatient()
    {
        return view('patient.addpatient');
    }

    public function enterpatient(Request $request)
    {
        $request->validate()->all();
    }


}
