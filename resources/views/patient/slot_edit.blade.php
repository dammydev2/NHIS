@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-ld-10 panel panel-primary">
			<div class="panel-heading">Slot Users</div>
			<div class="panel-body">


				<form method="post" action="{{ url('/slotupdate') }}">
					@csrf

					<div style="border: 1px solid #000">

						@foreach($data as $row)

						<div class="form-group col-lg-4">
							<label>Slot User(s) name</label>
							<input type="text" name="name" value="{{ $row->name }}" required="" class="form-control" required="">
						</div>

						<div class="form-group col-lg-4">
							<label>Slot User(s) Age</label>
							<input type="Number" name="age" value="{{ $row->age }}" required="" class="form-control" required="">
						</div>

						<div class="form-group col-lg-2">
							<label>Added ID</label>
							<input type="text" name="added_id" value="{{ $row->added_id }}" readonly="" class="form-control" required="">
						</div>

<input type="hidden" name="id" value="{{ $row->id }}">
						
						@endforeach

					</div>



					<input type="submit" class="btn btn-primary" value="Continue" name="">

				</form>


			</div>
		</div>


	</div>
</div>
@endsection
