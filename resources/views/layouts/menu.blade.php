@if(\Auth::User()->type==1)
<li><a href="{{ url('/patient') }}">Patient(s)</a></li>
<li><a href="{{ url('/addcare') }}">Add Care</a></li>
<!-- <li><a href="{{ url('/slot') }}">Slot User</a></li> -->
@elseif(\Auth::User()->type==0)
<li><a href="{{ url('/user') }}">User(s)</a></li>

@elseif(\Auth::User()->type==2)

<li><a href="{{ url('/checkprint') }}">print</a></li>

@elseif(\Auth::User()->type==8)

<li><a href="{{ url('/addICDreport') }}">Add Report</a></li>
<li><a href="{{ url('/addcode') }}">Add Code</a></li>
<li><a href="{{ url('/history') }}">History</a></li>
<li><a href="{{ url('/statistics') }}">Check Statistics</a></li>

@elseif(\Auth::User()->type!=8)
<li><a href="{{ url('/vital') }}">Validate Patients</a></li>
@endif