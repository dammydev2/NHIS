@if(\Auth::User()->type==1)
<li><a href="{{ url('/patient') }}">Patient(s)</a></li>
<li><a href="{{ url('/addcare') }}">Add Care</a></li>

@endif

<li><a href="{{ url('/vital') }}">Validate Patients</a></li>