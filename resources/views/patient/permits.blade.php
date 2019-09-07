@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-10 panel panel-primary">
			<div class="panel-heading">Add Care</div>
			<div class="panel-body">

				@if(Session::has('error'))
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
				@endif

				<form method="post" action="{{ url('/enterpermits') }}">
					@csrf
					
					@for ($i=1; $i <=  Session::get('slot_number'); $i++) 

					<div class="form-group col-lg-4">
						<label>Slot User(s) name</label>
						<input type="text" name="name[]" required="" class="form-control" required="">
					</div>

					<div class="form-group col-lg-4">
						<label>Slot User(s) Age</label>
						<input type="Number" name="age[]" min="70" required="" class="form-control" required="">
					</div>

					<div class="form-group col-lg-4">
						<label>Added ID</label>
						<input type="text" name="added_id[]" value="{{ Session::get('patient_id').'-'.$i }}" readonly="" class="form-control" required="">
					</div>

					@endfor

					<input type="submit" class="btn btn-primary" value="Continue" name="">

				</form>
			</div>
		</div>

	</div>
</div>
@endsection
