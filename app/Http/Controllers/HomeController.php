<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Addcare;
use App\Daily;
use App\Nurse;
use App\Department;
use App\AddDept;
use App\Authorization;
use App\Voucher;
use Session;
use Carbon;

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

    public function addcare()
    {
        return view('patient.addcare');
    }

    public function checkid(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'slot_number' => 'required|integer|min:1|max:5',
        ]);
        $data = Patient::where('patient_id', $request['patient_id'])->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'no record found');
            return redirect('addcare');
        }
        $this->check_number();
        Session::put('patient_id', $request['patient_id']);
        Session::put('slot_number', $request['slot_number']);
        return redirect('permits');
    }

    function check_number(){

        $unique_number = rand();
        $exists = Addcare::where('rec', $unique_number);

        if (empty($exists)){
            $results = check_number();
        }
        else{
            $results = $unique_number;
            Session::put('rec', $results);
        }


    }

    public function permits()
    {
        return view('patient.permits');
    }

    public function enterpermits(Request $request)
    {
        $num = count($request['name']);
        for ($i=0; $i < $num; $i++) { 
            Addcare::create([
                'rec' => Session::get('rec'),
                'name' => $request['name'][$i],
                'age' => $request['age'][$i],
                'added_id' => $request['added_id'][$i],
                'date' => $request['today'],
                'today_num' => $request['today_num'][$i],
            ]);
        }

        for ($i=0; $i < $num; $i++) { 
            Daily::create([
                'date' => $request['today'],
                'today_num' => $request['today_num'][$i],
            ]);
        }
        Session::flash('success', 'patient Information added Successfuly');
        return redirect('addcare');
    }

    public function vital()
    {
        return view('patient.vital');
    }

    public function checkvital(Request $request)
    {
        $request->validate([
            'patient_num' => 'required'
        ]);
        Session::put('patient_num', $request['patient_num']);
        if(\Auth::User()->type == 2){
            return redirect('nurse');
        }

        if(\Auth::User()->type == 3){
            return redirect('healthrecord');
        }

        if(\Auth::User()->type == 4){
            return redirect('authorization');
        }

        if(\Auth::User()->type == 5){
            return redirect('voucher');
        }
        
    }

    public function nurse()
    {
        $patient_num = Session::get('patient_num');
        $data = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('vital');
        }
        return view('patient.nurse', compact('data'));
    }

    public function addnursedata(Request $request)
    {
        $request->validate([
            'temperature' => 'required',
            'BP' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'pulse' => 'required',
            'sight' => 'required',
        ]);
        Nurse::create([
            'rec' => $request['rec'],
            'added_id' => $request['added_id'],
            'today_num' => $request['today_num'],
            'date' => Carbon\Carbon::today()->format('Y-m-d'),
            'temperature' => $request['temperature'],
            'BP' => $request['BP'],
            'weight' => $request['weight'],
            'height' => $request['height'],
            'pulse' => $request['pulse'],
            'sight' => $request['sight'],
        ]);
        Session::flash('success', 'Information added Successfuly');
        return redirect('vital');
    }

    public function healthrecord()
    {
        $patient_num = Session::get('patient_num');
        $data = Nurse::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        $data2 = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        $data3 = Department::all();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('vital');
        }
        return view('patient.healthrecord', compact('data', 'data2', 'data3'));
    }

    public function addDept(Request $request)
    {
        $request->validate([
            'department' => 'required|unique:departments'
        ]);
        Department::create([
            'department' => $request['department']
        ]);
        Session::flash('success', 'Department Added Successfuly');
        return redirect('healthrecord');
    }

    public function enterdept(Request $request)
    {
        $request->validate([
            'dept' => 'required'
        ]);
        AddDept::create([
            'rec' => $request['rec'],
            'today_num' => $request['today_num'],
            'dept' => $request['dept'],
            'today' => $request['today'],
        ]);
        Session::flash('success', 'Department Added Successfuly for patient');
        return redirect('vital');
    }

    public function authorization()
    {
        $patient_num = Session::get('patient_num');
        $data = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('vital');
        }

        foreach ($data as $key => $row) {
            $added_id = $row->added_id;
        }
        $str_explode=explode("-",$added_id);
        $string1 = $str_explode[0];
        $string2 = $str_explode[1];
        $data2 = Patient::where('patient_id', $string1)->get();

        $data3 = AddDept::where('today_num', $patient_num)
        ->where('today', Carbon\Carbon::today()->format('Y-m-d'))->get();

        return view('patient.authorization', compact('data', 'data2', 'data3'));
    }

    public function addauthorization(Request $request)
    {
        Authorization::create([
            'rec' => $request['rec'],
            'today_num' => $request['today_num'],
            'name' => $request['name'],
            'patient_id' => $request['patient_id'],
            'hmo' => $request['hmo'],
            'nhis' => $request['nhis'],
            'hospital' => $request['hospital'],
            'clinic' => $request['clinic'],
            'authorization' => $request['authorization'],
            'today' => $request['today'],
        ]);
        return redirect('print_authorization');
    }

    public function print_authorization()
    {
        $patient_num = Session::get('patient_num');
        $data = Authorization::where('today_num', $patient_num)
        ->where('today', Carbon\Carbon::today()->format('Y-m-d'))->get();
        return view('patient.print_authorization', compact('data'));
    }

    public function voucher()
    {
        $patient_num = Session::get('patient_num');
        $data = Nurse::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        $data2 = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        $data3 = Department::all();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('vital');
        }
        return view('patient.voucher', compact('data', 'data2', 'data3'));
    }

    public function entervoucher(Request $request)
    {
        Voucher::create([
            'rec' => $request['rec'],
            'today_num' => $request['today_num'],
            'voucher' => $request['voucher'],
            'today' => $request['today'],
        ]);
        return redirect('print_voucher');
    }

    public function print_voucher()
    {
        $patient_num = Session::get('patient_num');
        $data = Nurse::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        $data2 = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        $data3 = Voucher::where('today_num', $patient_num)
        ->where('today', Carbon\Carbon::today()->format('Y-m-d'))->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('vital');
        }
        return view('patient.print_voucher', compact('data', 'data2', 'data3'));
    }




}
