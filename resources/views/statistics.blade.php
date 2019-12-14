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

				<form method="post" action="{{ url('/checkstat') }}">
					@csrf

					<div class="form-group col-lg-4 col-sm-4">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<option>All</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>From</label>
						<input type="date" name="from" required="" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>To</label>
						<input type="date" name="to" required="" class="form-control">
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" value="Continue" name="">
					</div>					

				</form>


			</div>
		</div>

		<div class="col-sm-10 col-lg-10 panel panel-primary row">
			<div class="panel-heading">ICD (Surgical History)</div>
			<div class="panel-body">
				<form method="post" action="{{ url('/checksug') }}">
					@csrf

					<div class="form-group col-lg-4 col-sm-4">
						<label>Gender</label>
						<select name="type" class="form-control">
							<option value="Operation">Surgery</option>
							<option value="Diagnosis">Diagnosis</option>
						</select>
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>From</label>
						<input type="date" name="from" required="" class="form-control">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>To</label>
						<input type="date" name="to" required="" class="form-control">
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" value="Continue" name="">
					</div>
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
