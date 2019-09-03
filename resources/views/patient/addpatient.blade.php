@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-8 panel panel-primary">
			<div class="panel-heading">Add Patient</div>
			<div class="panel-body">

				<form method="post" action="{{ url('/enterpatient') }}">
					@csrf

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Full Name</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
						<span class="form-control-feedback"></span>

						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('nhis_id') ? ' has-error' : '' }}">
						<label>NHIS ID</label>
						<input type="text" class="form-control" name="nhis_id" value="{{ old('nhis_id') }}" placeholder="NHIS ID">
						<span class="form-control-feedback"></span>

						@if ($errors->has('nhis_id'))
						<span class="help-block">
							<strong>{{ $errors->first('nhis_id') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('hmo') ? ' has-error' : '' }}">
						<label>HMO</label>
						<input type="text" class="form-control" name="hmo" value="{{ old('hmo') }}" placeholder="HMO">
						<span class="form-control-feedback"></span>

						@if ($errors->has('hmo'))
						<span class="help-block">
							<strong>{{ $errors->first('hmo') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
						<span class="form-control-feedback"></span>

						@if ($errors->has('phone'))
						<span class="help-block">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('ministry') ? ' has-error' : '' }}">
						<label>Ministry</label>
						<input type="text" class="form-control" name="ministry" value="{{ old('nhis_id') }}" placeholder="ministry">
						<span class="form-control-feedback"></span>

						@if ($errors->has('ministry'))
						<span class="help-block">
							<strong>{{ $errors->first('ministry') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('address') ? ' has-error' : '' }}">
						<label>Address</label>
						<input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
						<span class="form-control-feedback"></span>

						@if ($errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
						<label>Date of Birth</label>
						<input type="date" class="form-control" name="dob" value="{{ old('dob') }}" placeholder="DAte of Birth">
						<span class="form-control-feedback"></span>

						@if ($errors->has('dob'))
						<span class="help-block">
							<strong>{{ $errors->first('dob') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('marital') ? ' has-error' : '' }}">
						<label>Marital Status</label>
						<input type="text" class="form-control" name="marital" value="{{ old('marital') }}" placeholder="Marital Status">
						<span class="form-control-feedback"></span>

						@if ($errors->has('marital'))
						<span class="help-block">
							<strong>{{ $errors->first('marital') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('occupation') ? ' has-error' : '' }}">
						<label>Occupation</label>
						<input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" placeholder="Occupation">
						<span class="form-control-feedback"></span>

						@if ($errors->has('occupation'))
						<span class="help-block">
							<strong>{{ $errors->first('occupation') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('religion') ? ' has-error' : '' }}">
						<label>Religion</label>
						<input type="text" class="form-control" name="religion" value="{{ old('religion') }}" placeholder="Religion">
						<span class="form-control-feedback"></span>

						@if ($errors->has('religion'))
						<span class="help-block">
							<strong>{{ $errors->first('religion') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('relationship') ? ' has-error' : '' }}">
						<label>Relationship</label>
						<input type="text" class="form-control" name="relationship" value="{{ old('relationship') }}" placeholder="Relationship">
						<span class="form-control-feedback"></span>

						@if ($errors->has('relationship'))
						<span class="help-block">
							<strong>{{ $errors->first('relationship') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-12 has-feedback{{ $errors->has('summary') ? ' has-error' : '' }}">
						<label>Summary of Treatment</label>
						<input type="text" class="form-control" name="summary" value="{{ old('summary') }}" placeholder="Summary of Treatment">
						<span class="form-control-feedback"></span>

						@if ($errors->has('summary'))
						<span class="help-block">
							<strong>{{ $errors->first('summary') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('diagnosis') ? ' has-error' : '' }}">
						<label>Diagnosis</label>
						<input type="text" class="form-control" name="diagnosis" value="{{ old('diagnosis') }}" placeholder="Diagnosis">
						<span class="form-control-feedback"></span>

						@if ($errors->has('diagnosis'))
						<span class="help-block">
							<strong>{{ $errors->first('diagnosis') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-6 has-feedback{{ $errors->has('date') ? ' has-error' : '' }}">
						<label>Date of Registration</label>
						<input type="text" class="form-control" name="date" value="{{ old('date') }}" placeholder="Date of Registration">
						<span class="form-control-feedback"></span>

						@if ($errors->has('date'))
						<span class="help-block">
							<strong>{{ $errors->first('date') }}</strong>
						</span>
						@endif
					</div>

					<input type="submit" class="btn btn-primary" value="Register" name="">

				</form>
			</div>
		</div>


	</div>
</div>
@endsection
