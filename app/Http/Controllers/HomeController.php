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
use App\SlotUser;
use App\Doctor;
use App\Refer;
use App\DrugPrescribe;
use App\ICD;
use App\Code;
use App\Operation;
use App\Diagnosis;
use App\addDiagnosis;
use App\User;
use Session;
use Hash;
use Carbon;
use DB;

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
        ]);
        $data = SlotUser::where('added_id', $request['patient_id'])->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'no record found');
            return redirect('addcare');
        }
        $this->check_number();
        Session::put('patient_id', $request['patient_id']);
        Session::put('type', $request['type']);
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
        $type = Session::get('type');
        $patient_id = Session::get('patient_id');
        if ($type == 'beneficiary') {
            $data = SlotUser::where('added_id', $patient_id)->get();
            if ($data->isEmpty()) {
                Session::flash('error', 'no record found');
                return redirect('addcare');
            }
        }
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

        if(\Auth::User()->type == 6){
            return redirect('doctor');
        }

        if(\Auth::User()->type == 8){
            return redirect('ICD');
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

    public function slot($id)
    {
        $data = Patient::select('patient_id')->where('id', $id)->get();
        foreach ($data as $key => $row) {
            Session::put('patient_id',$row->patient_id);
        }
        $data2 = SlotUser::where('patient_id', Session::get('patient_id'))->get();
        $num = count($data2);
        return view('patient.slot', compact('data','data2','num'));
    }

    public function enterslot(Request $request)
    {
        $num = count($request['name']);
        for ($i=0; $i < $num; $i++) { 
            SlotUser::create([
                'patient_id' => Session::get('patient_id'),
                'name' => $request['name'][$i],
                'age' => $request['age'][$i],
                'added_id' => $request['added_id'][$i],
            ]);
        }
        Session::flash('success', 'Slot added successfully');
        return redirect('patient');
    }

    public function doctor()
    {
        $patient_num = Session::get('patient_num');
        $data = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('vital');
        }
        return view('patient.doctor', compact('data'));
    }

    public function adddoctordata(Request $request)
    {
        $num = count($_POST['question']);
        for ($i=0; $i < $num; $i++) { 
            Doctor::create([
                'rec' => $request['rec'],
                'today_num' => $request['today_num'],
                'added_id' => $request['added_id'],
                'question' => $request['question'][$i],
                'answer' => $request['answer'][$i],
                'choose' => $request['choose'],
                'doctor' => \Auth::User()->name,
            ]);
        }
        Session::put('rec', $request['rec']);
        Session::put('today_num', $request['today_num']);
        Session::put('added_id', $request['added_id']);
        if ($request['choose']=='Reffer') {
            return redirect('reffer');
        }
        else if($request['choose']=='Prescribe Drug') {
            return redirect('prescribe');
        }
        
    }

    public function reffer()
    {
        return view('patient.reffer');
    }

    public function addrefdata(Request $request)
    {
        Refer::create([
            'rec' => $request['rec'],
            'today_num' => $request['today_num'],
            'added_id' => $request['added_id'],
            'reffered' => $request['referred'],
            'name' => \Auth::User()->name,
        ]);
        Session::flash('success', 'patient reffered Successfuly');
        return redirect('vital');
        // return redirect('printrec');
    }

    public function checkprint()
    {
        return view('record.checkprint');
    }

    public function verifyprint(Request $request)
    {
        $request->validate([
            'patient_num' => 'required',
            'select' => 'required',
        ]);
        $today = Carbon\Carbon::today()->format('Y-m-d');
        $data = Doctor::where('today_num', $request['patient_num'])
        ->where('created_at', 'like', '%' . $today . '%' )->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('checkprint');
        }
        foreach ($data as $row) {
            Session::put('rec', $row->rec);
        }
        #:::::::PRINT THE RECEIPT::::::::
        if ($request['select'] == 'Referred') {
            Session::put('patient_num');
            return redirect('printrec');
        } 
        #:::::::PRINT PRESCRIPTION :::::::::
        if ($request['select'] == 'Prescription') {
            Session::put('patient_num');
            return redirect('printprescribe');
        } 
    }

    public function printrec()
    {
        $rec = Session::get('rec');
        $data = Addcare::where('rec', $rec)->get();
        $data2 = Refer::where('rec', $rec)->get();
        return view('patient.printrec', compact('data','data2'));
    }

    public function prescribe()
    {
        $patient_num = Session::get('patient_num');
        $data = Addcare::where('today_num', $patient_num)
        ->where('date', Carbon\Carbon::today()->format('Y-m-d'))->get();
        return view('prescribe', compact('data'));
    }

    public function addprescribe(Request $request)
    {
        $num = count($_POST['drug']);
        for ($i=0; $i < $num; $i++) { 
            DrugPrescribe::create([
                'drug' => $request['drug'][$i],
                'rec' => $request['rec'],
                'today_num' => $request['today_num'],
                'added_id' => $request['added_id'],
                'name' => \Auth::User()->name,
            ]);
        }
        Session::flash('success', 'drugs for patient added successfully');
        return redirect('vital');
    }

    public function printprescribe()
    {
        $rec = Session::get('rec');
        $data = Addcare::where('rec', $rec)->get();
        $data2 = DrugPrescribe::where('rec', $rec)->get();
        return view('patient.printprescribe', compact('data','data2'));
    }

    public function ICD()
    {
        $patient_num = Session::get('patient_num');
        $data = SlotUser::where('added_id', $patient_num)->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'data not found');
            return redirect('addICDreport');
        }
        $data2 = Addcare::where('added_id', $patient_num)
        ->orderby('created_at', 'desc')->first();
        //return $data2->;
        return view('patient.ICD', compact('data','data2'));
    }

    public function addICD(Request $request)
    {
        ICD::create([
            'rec' => $request['rec'],
            'today_num' => $request['today_num'],
            'surname' => $request['surname'],
            'other_name' => $request['other_name'],
            'added_id' => $request['added_id'],
            'address' => $request['address'],
            'date' => $request['date'],
            'email' => $request['email'],
            'spouse' => $request['spouse'],
            'gender' => $request['gender'],
            'kin' => $request['kin'],
            'kin_address' => $request['kin_address'],
            'xray' => $request['xray'],
            'kin_phone' => $request['kin_phone'],
            'domicile' => $request['domicile'],
            'nationality' => $request['nationality'],
            'occupation' => $request['occupation'],
            'date_acceptance' => $request['date_acceptance'],
            'referred' => $request['referred'],
            'surgeon' => $request['surgeon'],
            'ward' => $request['ward'],
            'discharged' => $request['discharged'],
            'discharged_to' => $request['discharged_to'],
            'condition' => $request['condition'],
        ]);
        Session::put('rec', $request['rec']);
        Session::put('today_num', $request['today_num']);
        Session::put('added_id', $request['added_id']);
        return redirect('operations');
    }

    public function operations()
    {
        $data = Code::all();
        return view('patient.operations', compact('data'));
    }

    public function addcode()
    {
        return view('patient.addcode');
    }

    public function entercode(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:codes'
        ]); 
        Code::create([
            'code' => $request['code'],
            'operation' => $request['operation'],
        ]);
        Session::flash('success', 'code added Successfuly');
        return back();
    }

    public function addoperation(Request $request)
    {
        Operation::create([
            'rec' => $request['rec'],
            'today_num' => $request['today_num'],
            'added_id' => $request['added_id'],
            'surgeon' => $request['surgeon'],
            'operation' => $request['operation'],
            'code' => $request['code'],
        ]);
        return redirect('addDiag');
    }

    public function addDiag()
    {
        $data = Diagnosis::all();
        return view('patient.addDiag', compact('data'));
    }

    public function printICD()
    {
        $rec = Session::get('rec');
        $data = ICD::where('rec', $rec)->get();
        $data2 = addDiagnosis::where('rec', $rec)->get();
        $data3 = Operation::where('rec', $rec)->get();
        return view('printICD', compact('data','data2','data3'));
    }

    public function history()
    {
        return view('history');
    }

    public function viewhistory(Request $request)
    {
        $data = ICD::where('added_id', $request['num'])->orderby('id', 'desc')->get();
        if ($data->isEmpty()) {
            Session::flash('error', 'no record found');
            return redirect('history');
        }
        return view('viewhistory', compact('data'));
        // Session::put('rec', $request['rec']);
        // return redirect('printICD');
    }

    public function checkhistory(Request $request)
    {
       Session::put('rec', $request['rec']);
       return redirect('printICD');
   }

   public function addICDreport()
   {
    return view('patient.addICDreport');
}

public function checkpatient(Request $request)
{
    $request->validate([
        'patient_num' => 'required'
    ]);
    Session::put('patient_num', $request['patient_num']);
    return redirect('ICD');
}

public function statistics()
{
    return view('statistics');
}

public function checkstat(Request $request)
{
    $from = $request['from'].' 00:00:00';
    $to = $request['to'].' 11:59:59';
    $gender = $request['gender'];
    if ($gender != 'All') {
        $data = ICD::where('created_at', '>=', $from)
        ->where('created_at', '<=', $to)
        ->where('gender', $gender)->get();
    }
    else{
        $data = ICD::where('created_at', '>=', $from)
        ->where('created_at', '<=', $to)->get();
    }

    return view('checkstat', compact('data'));
}

public function enterdiagnosis(Request $request)
{
    Diagnosis::create([
        'code' => $request['code'],
        'diagnosis' => $request['diagnosis'],
    ]);
    Session::flash('success', 'code added Successfuly');
    return back();
}

public function addDiagnosis(Request $request)
{
    //return $request;
    addDiagnosis::create([
        'rec' => $request['rec'],
        'today_num' => $request['today_num'],
        'added_id' => $request['added_id'],
        'diagnosis' => $request['diagnosis'],
        'code' => $request['code'],
    ]);
    return redirect('printICD');
}

public function user()
{
    $data = User::where('type', '<>', 0)->get();
    return view('worker.user', compact('data'));
}

public function adduser()
{
    return view('worker.adduser');
}

public function enteruser(Request $data)
{
 $data->validate([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
]);
 User::create([
    'name' => $data['name'],
    'email' => $data['email'],
    'password' => Hash::make($data['password']),
    'type' => $data['type']
]);
 Session::flash('success', 'user added successfully');
 return redirect('user');
}

public function delete($id)
{
    User::where('id',$id)->delete();
    Session::flash('error', 'deleted successfully');
    return redirect('user');
}

public function slot_edit($id)
{
 $data = SlotUser::where('id', $id)->get();
 return view('patient.slot_edit', compact('data'));
}

public function slotupdate(Request $request)
{
    SlotUser::where('id', $request['id'])
    ->update([
        'name' => $request['name'],
        'age' => $request['age'],
        'added_id' => $request['added_id']
    ]);
    Session::flash('success', 'Slot added successfully');
    return redirect('patient');
}

public function checksug(Request $request)
{
    $from = $request['from'].' 00:00:00';
    $to = $request['to'].' 11:59:59';
    Session::put('from', $request['from']);
    Session::put('to', $request['to']);
    Session::put('type', $request['type']);
    $type = $request['type'];
    if ($type == 'Diagnosis') {
        $data = DB::table('add_diagnoses')->select('code',  DB::raw('SUM(num) as total'))
        ->where('created_at', '>=', $from)
        ->where('created_at', '<=', $to)
        ->groupBy('code')
        ->get();
    }
    elseif ($type == 'Operation') {
        $data = DB::table('operations')->select('code',  DB::raw('SUM(num) as total'))
        ->where('created_at', '>=', $from)
        ->where('created_at', '<=', $to)
        ->groupBy('code')
        ->get();
    }



    
    return view('patient.checksug', compact('data'));
}



}
