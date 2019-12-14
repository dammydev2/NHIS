@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-10 panel panel-primary">
			<div class="panel-heading">Authorization</div>
			<div class="panel-body">

				@if(Session::has('error'))
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
				@endif

				@if(Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
				@endif

				<form method="post" action="{{ url('/addauthorization') }}">
					@csrf

					@foreach($data as $row)
					<input type="hidden" name="rec" value="{{ $row->rec }}">
					<input type="hidden" name="today_num" value="{{ $row->today_num }}">

					<div class="form-group col-lg-4">
						<label>Patient Name</label>
						<input type="text" name="name" class="form-control" value="{{ $row->name }}">
					</div>

					<div class="form-group col-lg-4">
						<label>Patient ID</label>
						<input type="text" name="patient_id" class="form-control" value="{{ $row->added_id }}">
					</div>

					@endforeach

					@foreach($data2 as $row)

					<div class="form-group col-lg-4">
						<label>HMO</label>
						<input type="text" name="hmo" class="form-control" value="{{ $row->hmo }}">
					</div>

					<div class="form-group col-lg-4">
						<label>NHIS</label>
						<input type="text" name="nhis" class="form-control" value="{{ $row->nhis_id }}">
					</div>

					<div class="form-group col-lg-4">
						<label>Hospital No</label>
						<input type="text" name="hospital" class="form-control" required="">
					</div>

					@endforeach

					@foreach($data3 as $row)

					<div class="form-group col-lg-4">
						<label>Clinic</label>
						<input type="text" name="clinic" value="{{ $row->dept }}" class="form-control" required="">
					</div>

					@endforeach

					<div class="form-group col-lg-12">
						<label>Authorization Code</label>
						<input type="text" name="authorization" class="form-control" required="">
					</div>

					<input type="hidden" value="{{ Carbon\Carbon::today()->format('Y-m-d') }}" name="today">

					<input type="submit" class="btn btn-primary" value="Add authorization" name="">

				</form>
			</div>
		</div>


	</div>
</div>
@endsection
