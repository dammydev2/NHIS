@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-5 panel panel-primary">
			<div class="panel-heading">Add Care</div>
			<div class="panel-body">

				@if(Session::has('error'))
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
				@endif

				<form method="post" action="{{ url('/checkid') }}">
					@csrf

					<div class="form-group col-lg-12 has-feedback{{ $errors->has('patient_id') ? ' has-error' : '' }}">
						<label>Patient ID Number</label>
						<input type="text" class="form-control" name="patient_id" value="{{ old('name') }}" placeholder="Patient ID Number">
						<span class="form-control-feedback"></span>

						@if ($errors->has('patient_id'))
						<span class="help-block">
							<strong>{{ $errors->first('patient_id') }}</strong>
						</span>
						@endif
					</div>

					<input type="submit" class="btn btn-primary" value="Validate" name="">

				</form>
			</div>
		</div>


	</div>
</div>
@endsection
