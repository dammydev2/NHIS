@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<div class="container">
	<div class="row">

		<div class="col-sm-10 col-lg-10 panel panel-primary">
			<div class="panel-heading">Patient Vital Signs</div>
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

				<form method="post" action="{{ url('/adddoctordata') }}">
					@csrf

					@foreach($data as $row)

					<input type="hidden" name="rec" value="{{ $row->rec }}">
					<input type="hidden" name="today_num" value="{{ $row->today_num }}">
					<input type="hidden" name="added_id" value="{{ $row->added_id }}">

					<table class="table table-bordered">
						<tbody id="textboxDiv">
							<tr>
								<td style="width: 65%"><input type="text" name="question[]" class="form-control" value="What symptoms do you have?"></td>
								<td>
									<input type="text" name="answer[]" class="form-control">
								</td>
							</tr>
							<tr>
								<td><input type="text" name="question[]" class="form-control" value="Where do you have discomfort? if any"></td>
								<td>
									<input type="text" name="answer[]" class="form-control">
								</td>
							</tr>
							<tr>
								<td><input type="text" name="question[]" class="form-control" value="How often do you have discomfort?"></td>
								<td>
									<input type="text" name="answer[]" class="form-control">
								</td>
							</tr>
							<tr>
								<td><input type="text" name="question[]" class="form-control" value="During what activity(ies) do you have discomfort?"></td>
								<td>
									<input type="text" name="answer[]" class="form-control">
								</td>
							</tr>
							<tr>
								<td><input type="text" name="question[]" class="form-control" value="what relieves your discomfort?"></td>
								<td>
									<input type="text" name="answer[]" class="form-control">
								</td>
							</tr>
							<tr>
								<td><input type="text" name="question[]" class="form-control" value="what other symptoms happens when you feel discomfort?"></td>
								<td>
									<input type="text" name="answer[]" class="form-control">
								</td>
							</tr>
						</tbody>
						
					</table>

					<a href="#" id="Add" class="btn btn-success fa fa-plus">Add more field(s)</a>
					<a href="#" id="Remove" class="btn btn-danger fa fa-minus">Remove field</a>

					@endforeach

					<div class="form-group">
						<label>Choose Option</label>
						<select name="choose" class="form-control">
							<option>Reffer</option>
							<option>Prescribe Drug</option>
						</select>
					</div>

					<input type="submit" class="btn btn-primary" value="Continue" name="">

				</form>

				<script>  
					$(document).ready(function() {  
						$("#Add").on("click", function() {  
							$("#textboxDiv").append('<tr><td><input type="text" name="question[]" class="form-control" value=""></td><td><input type="text" name="answer[]" class="form-control"></td></tr>');  
						});  
						$("#Remove").on("click", function() {  
							$("#textboxDiv").children().last().remove();  
						});  
					});  
				</script>  

			</div>
		</div>


	</div>
</div>

<script type="text/javascript">
	$(document).ready(function()){
		$('#add').on('click'.function(){
			$('textBox').append('<tr><td><input type="text" name="question[]" class="form-control" value=""></td><td><input type="text" name="answer[]" class="form-control"></td></tr>');
		});
	}
</script>
@endsection
