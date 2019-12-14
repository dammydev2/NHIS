@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<button class="btn btn-primary hidden-print" onclick="window.print()">Print</button>
		<div class="col-sm-10" style="border: 1px solid #000; background: pink">

			<table class="table table-bordered">
				@foreach($data as $row)
				<h3>CARD no: {{ $row->rec }}</h3>
				<tr>
					<td>Surname: <b>{{ $row->surname }}</b></td>
					<td>Other name: <b>{{ $row->other_name }}</b></td>
					<td>Physio number: <b>{{ $row->added_id }}</b></td>
				</tr>
				<tr>
					<td>Address: <b>{{ $row->address }}</b></td>
					<td>Date of birth: <b>{{ $row->date }}</b></td>
					<td>Email address: <b>{{ $row->email }}</b></td>
				</tr>
				<tr>
					<td>Next of kin: <b>{{ $row->kin }}</b></td>
					<td>Sex: <b>{{ $row->gender }}</b></td>
					<td>Address of next of kin: <b>{{ $row->kin_address }}</b></td>
				</tr>
				<tr>
					<td>Next of Kin Phone: <b>{{ $row->kin_phone }}</b></td>
					<td>Other name: <b>{{ $row->other_name }}</b></td>
					<td>X-ray number: <b>{{ $row->xray }}</b></td>
				</tr>
				<tr>
					<td>Place of usual Domicile: <b>{{ $row->domicile }}</b></td>
					<td>Nationality: <b>{{ $row->nationality }}</b></td>
					<td>Occupation: <b>{{ $row->occupation }}</b></td>
				</tr>
				<tr>
					<td>Religion: <b>{{ $row->religion }}</b></td>
					<td>Other name: <b>{{ $row->other_name }}</b></td>
					<td>Physio number: <b>{{ $row->added_id }}</b></td>
				</tr>
				@endforeach
			</table>

			<table class="table table-bordered">
				<tr>
					<td>Date of attendance/remmited: <b>{{ $row->date_acceptance }}</b></td>
					<td>Reffered by: <b>{{ $row->referred_by }}</b></td>
					<td>Physician or surgeon: <b>{{ $row->surgeon }}</b></td>
					<td>Ward or clinic: <b>{{ $row->ward }}</b></td>
					<td>Date discharged: <b>{{ $row->discharged }}</b></td>
					<td>Discharged to: <b>{{ $row->discharged_to }}</b></td>
					<td>Condition: <b>{{ $row->condition }}</b></td>
				</tr>
			</table>

			@foreach($data2 as $info)
			<table class="table table-bordered">
				<tr>
					<td>Date</td>
					<td>Diagnosis</td>
					<td>Code</td>
				</tr>
				<tr>
					<td>{{ $info->created_at }}</td>
					<td>{{ $info->diagnosis }}</td>
					<td>{{ $info->code }}</td>
				</tr>
			</table>
			@endforeach

			<table class="table table-bordered">
				<tr>
					<td>Date</td>
					<td>Surgeon</td>
					<td>Operations</td>
					<td>Code</td>
				</tr>
				@foreach($data3 as $info)
				<tr>
					<td>{{ $info->created_at }}</td>
					<td>{{ $info->surgeon }}</td>
					<td>{{ $info->operation }}</td>
					<td>{{ $info->code }}</td>
				</tr>
				@endforeach
			</table>

		</div>


	</div>
</div>

<style type="text/css">
	@media print {
  .hidden-print {
    display: none !important;
  }
}
</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$("html").on("contextmenu",function(e){
   return false;
});
</script> -->
@endsection
