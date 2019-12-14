@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		@php

		$today = (Carbon\Carbon::today()->format('Y-m-d'));
        $info = DB::table('dailies')->where('date', $today)->get();
        if ($info->isEmpty()) {
           $num = 1;
        }
        else{
            foreach ($info as $key => $row) {
                $num = $row->today_num + 1;
            }
        }
        $today = $today;

		@endphp

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
					
					<div class="form-group col-lg-4">
						<label>Slot User(s) name</label>
						<input type="text" name="name[]" required="" class="form-control" required="">
					</div>

					<div class="form-group col-lg-4">
						<label>Slot User(s) Age</label>
						<input type="Number" name="age[]" required="" class="form-control" required="">
					</div>

					<div class="form-group col-lg-2">
						<label>System number</label>
						<input type="text" name="added_id[]" value="{{ Session::get('patient_id') }}" class="form-control" required="">
					</div>

					<div class="form-group col-lg-2">
						<label>Patient Number</label>
						<input type="text" class="form-control" readonly="" name="today_num[]" value="{{ $num  }}">
					</div>

					<input type="hidden" name="today" value="{{ $today }}">
					

					<!-- <input type="hidden" name="today" value="{{ $today }}"> -->

					<input type="submit" class="btn btn-primary" value="Continue" name="">

				</form>
			</div>
		</div>

	</div>
</div>
@endsection
