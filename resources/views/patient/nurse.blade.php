@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-10 panel panel-primary">
			<div class="panel-heading">Patient Vital Signs</div>
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

				<form method="post" action="{{ url('/addnursedata') }}">
					@csrf

					@foreach($data as $row)

					<input type="hidden" name="rec" value="{{ $row->rec }}">
					<input type="hidden" name="today_num" value="{{ $row->today_num }}">
					<input type="hidden" name="added_id" value="{{ $row->added_id }}">

					<div class="form-group col-lg-4 has-feedback{{ $errors->has('temperature') ? ' has-error' : '' }}">
						<label>Temperature</label>
						<input type="text" class="form-control" name="temperature" value="{{ old('temperature') }}" placeholder="temperature">
						<span class="form-control-feedback"></span>

						@if ($errors->has('temperature'))
						<span class="help-block">
							<strong>{{ $errors->first('temperature') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-4 has-feedback{{ $errors->has('BP') ? ' has-error' : '' }}">
						<label>Blood Pressure</label>
						<input type="text" class="form-control" name="BP" value="{{ old('BP') }}" placeholder="Blood Pressure">
						<span class="form-control-feedback"></span>

						@if ($errors->has('BP'))
						<span class="help-block">
							<strong>{{ $errors->first('BP') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-4 has-feedback{{ $errors->has('weight') ? ' has-error' : '' }}">
						<label>Weight</label>
						<input type="text" class="form-control" name="weight" value="{{ old('weight') }}" placeholder="Weight">
						<span class="form-control-feedback"></span>

						@if ($errors->has('weight'))
						<span class="help-block">
							<strong>{{ $errors->first('weight') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-4 has-feedback{{ $errors->has('height') ? ' has-error' : '' }}">
						<label>Height</label>
						<input type="text" class="form-control" name="height" value="{{ old('height') }}" placeholder="height">
						<span class="form-control-feedback"></span>

						@if ($errors->has('height'))
						<span class="help-block">
							<strong>{{ $errors->first('height') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-4 has-feedback{{ $errors->has('pulse') ? ' has-error' : '' }}">
						<label>Pulse</label>
						<input type="text" class="form-control" name="pulse" value="{{ old('pulse') }}" placeholder="pulse">
						<span class="form-control-feedback"></span>

						@if ($errors->has('pulse'))
						<span class="help-block">
							<strong>{{ $errors->first('pulse') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group col-lg-4 has-feedback{{ $errors->has('sight') ? ' has-error' : '' }}">
						<label>Sight/Stering Chat</label>
						<input type="text" class="form-control" name="sight" value="{{ old('sight') }}" placeholder="Sight">
						<span class="form-control-feedback"></span>

						@if ($errors->has('sight'))
						<span class="help-block">
							<strong>{{ $errors->first('sight') }}</strong>
						</span>
						@endif
					</div>

					@endforeach

					<input type="submit" class="btn btn-primary" value="Add" name="">

				</form>
			</div>
		</div>


	</div>
</div>
@endsection
