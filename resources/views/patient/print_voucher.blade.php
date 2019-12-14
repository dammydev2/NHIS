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

				@foreach($data3 as $row)
				<h3>Voucher Number: {{ $row->voucher }}</h3>
				@endforeach

				
			</div>
		</div>


	</div>
</div>
@endsection
