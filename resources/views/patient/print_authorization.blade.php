@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-10 panel panel-primary">
			<div class="panel-heading">Print Authorization</div>
			<div class="panel-body">

				<div class="col-lg-10" style="border: 1px solid #000;">
					<button onclick="window.print()">Print</button>
					<table class="table">
					@foreach($data as $row)

					<center><h3>{{ $row->authorization }}</h3></center>

					<tr>
						<th>Patient Name {{ $row->name }}</th>
						<th>HMO {{ $row->hmo }}</th>
						<th>NHIS NO {{ $row->nhis }}</th>
					</tr>

					<tr>
						<th>HOSP NO {{ $row->hospital }}</th>
						<th>Clinic {{ $row->clinic }}</th>
						<th>Signature: ................</th>
					</tr>

					@endforeach

					</table>

					<p>....................<br>OFFICIAL STAMP</p>

				</div>

			</div>
		</div>


	</div>
</div>
@endsection
