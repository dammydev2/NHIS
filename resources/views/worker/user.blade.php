@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="panel panel-primary col-sm-12">
			<div class="panel-heading"><h3><center>All User(s)</center></h3></div>
			<div class="panel-body">
				@if(Session::has('success'))
				<div class="alert alert-success">{{ Session::get('success') }}</div>
				@endif

				@if(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
				@endif
				<div class="col-sm-9">
					<table class="table table-bordered">
						<tr>
							<td colspan="5"><center><a href="{{ url('/adduser') }}" class="btn btn-primary">Add new User <i class="fa fa-plus"></i></a></center></td>
						</tr>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>user type</th>
							<th></th>
							<th></th>
						</tr>
						@foreach($data as $row)
						<tr>
							<td>{{ $row->name }}</td>
							<td>{{ $row->email }}</td>
							<td>{{ $row->type }}</td>
							<td><!-- <a href="{{ url('/edit/'.$row->id) }}"><i class="fa fa-edit"></i></a> --></td>
							<td><a href="{{ url('/delete/'.$row->id) }}"><i class="fa fa-trash btn btn-danger"></i></a></td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="col-sm-3">
					<table class="table table-bordered">
						<tr>
							<th colspan="2"><center>User Type data</center></th>
						</tr>
						<tr>
							<td>1</td>
							<td>Front Desk/Registration</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Nurse</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Health Recorder</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Authorizer</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Voucher Preparer</td>
						</td>
						<tr>
							<td>6</td>
							<td>Doctor</td>
						</tr>
						<tr>
							<td>7</td>
							<td>NHIS Account</td>
						</tr>
						<tr>
							<td>8</td>
							<td>ICD</td>
						</tr>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
