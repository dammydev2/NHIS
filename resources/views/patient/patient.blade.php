@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		@if(Session::has('success'))
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
		@endif

		{{ $data->links() }}

		<div class="span3 achievements-wrapper">
			<table class="table" >
				<tr>
					<th colspan="16"><center><a href="{{ url('/addpatient') }}" class="btn btn-primary" ><i class="fa fa-user-plus">Add New patient</i></a></center></th>
				</tr>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Patient id</th>
					<th>HNIS id</th>
					<th>HMO</th>
					<th>Phone</th>
					<th>Ministry</th>
					<th>Address</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Marital</th>
					<th>Occupation</th>
					<th>Religion</th>
					<th>Relationship</th>
					<th>Summary</th>
					<th>Diagnosis</th>
					<th>Regst. Date</th>
				</tr>
				@foreach($data as $row)
				<tr>
					<td><a href="{{ url('/slot/'.$row->id) }}">Slot</a></td>
					<td>{{ $row->name }}</td>
					<td>{{ $row->patient_id }}</td>
					<td>{{ $row->nhis_id }}</td>
					<td>{{ $row->hmo }}</td>
					<td>{{ $row->phone }}</td>
					<td>{{ $row->ministry }}</td>
					<td>{{ $row->address }}</td>
					<td>{{ $row->gender }}</td>
					<td>{{ $row->dob }}</td>
					<td>{{ $row->marital }}</td>
					<td>{{ $row->occupation }}</td>
					<td>{{ $row->religion }}</td>
					<td>{{ $row->relationship }}</td>
					<td>{{ $row->summary }}</td>
					<td>{{ $row->diagnosis }}</td>
					<td>{{ $row->date }}</td>
				</tr>
				@endforeach
			</table>
		</div>


	</div>
</div>

<style type="text/css">
	.achievements-wrapper 
	{ 
		height: 300px; 
		width: 900px; 
		overflow: auto; 
	}

th, td{
	border: 1px solid #000;
}

</style>

@endsection
