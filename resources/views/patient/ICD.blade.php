@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

<div class="container">
	<div class="row">

		<div class="col-sm-10 col-lg-10 panel panel-primary row">
			<div class="panel-heading">ICD Unit</div>
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

				<form method="post" action="{{ url('/addICD') }}">
					@csrf

					<input type="hidden" name="rec" value="{{ $data2['rec'] }}">
					<input type="hidden" name="today_num" value="{{ $data2['today_num'] }}">

					<div class="form-group col-lg-4 col-sm-4">
						<label>Surname</label>
						<input type="text" required="" name="surname" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Other name(s)</label>
						<input type="text" required="" name="other_name" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Patient System Number</label>
						<input type="text" readonly="" class="form-control" name="added_id" value="{{ $data2['added_id'] }}">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Address</label>
						<input type="text" required="" name="address" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Date of Birth</label>
						<input type="date" required="" id="datepicker" name="date" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Spouse</label>
						<input type="text" required="" name="spouse" class="form-control">
					</div>

					<div class="form-group col-sm-4 col-lg-4">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Next of Kin</label>
						<input type="text" required="" name="kin" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Address of Next of kin</label>
						<input type="text" required="" name="kin_address" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>X-ray no</label>
						<input type="text" required="" name="xray" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Next of kin telephone</label>
						<input type="text" name="kin_phone" class="form-control" required="">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Place of usual domicile</label>
						<input type="text" name="domicile" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Nationality</label>
						<input type="text" name="nationality" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Occupation</label>
						<input type="text" name="occupation" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Date acceptance or discharged</label>
						<input type="date" name="date_acceptance" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Referred by</label>
						<input type="text" name="referred" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Physician or Surgeon</label>
						<input type="text" name="surgeon" value="{{ \Auth::User()->name }}" readonly="" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Ward/Clinic</label>
						<input type="text" name="ward" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Date Discharged</label>
						<input type="date" name="discharged" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Discharged to</label>
						<input type="text" name="discharged_to" class="form-control">
					</div>

					<div class="form-group col-sm-4 col-lg-4">
						<label>Condition</label>
						<select name="condition" class="form-control">
							<option>Cured</option>
							<option>Improved</option>
							<option>ISQ</option>
							<option>Worse</option>
							<option>Died</option>
						</select>
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" value="Continue" name="">
					</div>					

				</form>
  

			</div>
		</div>


	</div>
</div>


@endsection
