@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-5 panel panel-primary">
			<div class="panel-heading">check data</div>
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

				<form method="post" action="{{ url('/verifyprint') }}">
					@csrf

					<div class="form-group col-lg-12 has-feedback{{ $errors->has('patient_num') ? ' has-error' : '' }}">
						<label>Patient Number</label>
						<input type="text" class="form-control" name="patient_num" value="{{ old('patient_id') }}" placeholder="Patient Number">
						<span class="form-control-feedback"></span>

						@if ($errors->has('patient_num'))
						<span class="help-block">
							<strong>{{ $errors->first('patient_num') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-12 has-feedback{{ $errors->has('select') ? ' has-error' : '' }}">
						<select class="form-control" name="select">
							<option value="">select</option>
							<option>Referred</option>
							<option>Prescription</option>
						</select>
						
						@if ($errors->has('select'))
						<span class="help-block">
							<strong>{{ $errors->first('select') }}</strong>
						</span>
						@endif
					</div>

					<input type="hidden" value="{{ Carbon\Carbon::today()->format('Y-m-d') }}" name="today">

					<input type="submit" class="btn btn-primary" value="Validate" name="">

				</form>
			</div>
		</div>


	</div>
</div>
@endsection
