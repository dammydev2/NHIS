@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-5 panel panel-primary">
			<div class="panel-heading">Voucher</div>
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

				@foreach($data2 as $row)
					Patient Name: {{ $row->name }}<br>
					Age: {{ $row->age }} Years
				@endforeach

				<table class="table">
					@foreach($data as $row)

					<tr>
						<td>Temperature: {{ $row->temperature }}<sup>0</sup>C</td>
						<td>Blood Pressure: {{ $row->BP }}</td>
					</tr>

					<tr>
						<td>Weight: {{ $row->weight }} Kg</td>
						<td>Height: {{ $row->height }}</td>
					</tr>

					<tr>
						<td>Pulse: {{ $row->pulse }}<sup>0</sup>C</td>
						<td>Sight: {{ $row->sight }}</td>
					</tr>

				@endforeach
				</table>

				<form method="post" action="{{ url('/entervoucher') }}">
					@csrf

					<input type="hidden" name="rec" value="{{ $row->rec }}">
					<input type="hidden" name="today_num" value="{{ $row->today_num }}">

					<div class="form-group col-lg-12 has-feedback{{ $errors->has('department') ? ' has-error' : '' }}">
						<label>Voucher number</label>
						<input type="text" class="form-control" name="voucher" value="{{ rand() }}" placeholder="Deparment Name">
						<span class="form-control-feedback"></span>

						@if ($errors->has('department'))
						<span class="help-block">
							<strong>{{ $errors->first('department') }}</strong>
						</span>
						@endif
					</div>

					<input type="hidden" value="{{ Carbon\Carbon::today()->format('Y-m-d') }}" name="today">

					<input type="submit" class="btn btn-primary" value="Add Voucher" name="">

				</form>
			</div>
		</div>


	</div>
</div>
@endsection
