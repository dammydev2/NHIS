@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

<div class="container">
	<div class="row">

		<div class="col-sm-10 col-lg-10 panel panel-primary row">
			<div class="panel-heading">ICD Unit</div>
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

				<form method="post" action="{{ url('/addDiagnosis') }}">
					@csrf

					<input type="hidden" name="rec" value="{{ Session::get('rec') }}">
					<input type="hidden" name="today_num" value="{{ Session::get('today_num') }}">
					<input type="hidden" name="added_id" value="{{ Session::get('added_id') }}">

					<!-- <div class="form-group col-lg-4 col-sm-4">
						<label>Surgeon</label>
						<input type="text" required="" name="surgeon" class="form-control">
					</div> -->

					<div class="form-group col-lg-4 col-sm-4">
						<label>Diagnosis</label>
						<input type="text" readonly="" id="operation" name="diagnosis" class="form-control operation">
					</div>

					<div class="form-group col-lg-4 col-sm-4">
						<label>Code Number</label> <a href="#" data-toggle="modal" data-target="#myModal">add new code</a>
						<select name="code" class="form-control js-example-basic-single" id='code'>
							<option>select code</option>
							@foreach($data as $row)
							<option value="{{ $row->code }}" data-name="{{ $row->diagnosis }}">{{ $row->code }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" value="Continue" name="">
					</div>					

				</form>


			</div>
		</div>


	</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Diagnosis</h4>
			</div>
			<div class="modal-body">

				<form method="post" action="{{ url('/enterdiagnosis') }}">
					@csrf

					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					<div class="form-group col-lg-4 col-sm-4">
						<label>Code</label>
						<input type="text" required="" name="code" class="form-control">
					</div>

					<div class="form-group col-lg-8 col-sm-8">
						<label>Diagnosis</label>
						<input type="text" required="" name="diagnosis" class="form-control">
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" value="Continue" name="">
					</div>					

				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
