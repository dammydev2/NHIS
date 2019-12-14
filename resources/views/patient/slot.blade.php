@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-ld-10 panel panel-primary">
			<div class="panel-heading">Slot Users</div>
			<div class="panel-body">
				<?php 
				$total = DB::table('slot_users')->where('patient_id', Session::get('patient_id'))->get();
				$total = count($total);
				$num = 5;
				$create = $num - $total;
				?>

				@php

				$today = (Carbon\Carbon::today()->format('Y-m-d'));
				$info = DB::table('dailies')->where('date', $today)->get();
				if ($info->isEmpty()) {
				$num = 1;
			}
			else{
			foreach ($info as $key => $row) {
			$num = $row->today_num - 1;
		}
	}
	$today = $today;

	@endphp

	<form method="post" action="{{ url('/enterslot') }}">
		@csrf

		@for ($i=1; $i <=  $create; $i++) 

		<div style="border: 1px solid #000">

			<h3 class="center">Slot User {{ $i }}</h3>

		<div class="form-group col-lg-4">
			<label>Slot User(s) name</label>
			<input type="text" name="name[]" required="" class="form-control" required="">
		</div>

		<div class="form-group col-lg-4">
			<label>Slot User(s) Age</label>
			<input type="Number" name="age[]" required="" class="form-control" required="">
		</div>

		<div class="form-group col-lg-2">
			<label>Added ID</label>
			<input type="text" name="added_id[]" value="{{ Session::get('patient_id').'-'.$i }}" readonly="" class="form-control" required="">
		</div>

		<div class="form-group col-lg-2">
			<label>Patient Number</label>
			<input type="text" class="form-control" readonly="" name="today_num[]" value="{{ $i }}">
		</div>

	</div>

		<input type="hidden" name="today" value="{{ $today }}">


		@endfor


		<input type="submit" class="btn btn-primary" value="Continue" name="">

	</form>

	<hr>
	<h3>Users currently using code</h3>
	<table class="table table-bordered">
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>User ID</th>
			<th></th>
		</tr>
		@foreach($data2 as $row)
		<tr>
			<td>{{ $row->name }}</td>
			<td>{{ $row->age }}</td>
			<td>{{ $row->added_id }}</td>
			<td><a href="{{ url('slot_edit/'.$row->id) }}"><i class="fa fa-edit"></i></a></td>
		</tr>
		@endforeach
	</table>

</div>
</div>


</div>
</div>
@endsection
