@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

<div class="container">
	<div class="row">

		<div class="col-sm-10 col-lg-10 panel panel-primary row">
			<div class="panel-heading">ICD Unit (View History)</div>
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

				<table class="table table-bordered">
					<tr>
						<th>Date/time</th>
						<th>Name</th>
						<th>Address</th>
						<th>Patient System Number</th>
						<th>Gender</th>
						<th>Surgeon</th>
						<th>condition</th>
					</tr>
					@foreach($data as $row)
					<tr>
						<td>{{ $row->created_at }}</td>
						<td>{{ $row->surname.' '.$row->other_name }}</td>
						<td>{{ $row->address }}</td>
						<td>{{ $row->added_id }}</td>
						<td>{{ $row->gender }}</td>
						<td>{{ $row->surgeon }}</td>
						<td>{{ $row->condition }}</td>
					</tr>
					@endforeach
				</table>


			</div>
		</div>


	</div>
</div>



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/js/select2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#code').change(function(){
			var myText = $("#code :selected").data("name");
			$('.operation').val(myText);
		});
	});
</script>


@endsection
