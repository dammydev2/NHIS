@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<div class="container">
	<div class="row">

		<div class="col-sm-10 col-lg-10 panel panel-primary">
			<div class="panel-heading">Prescribe Drugs</div>
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

				<form method="post" action="{{ url('/addprescribe') }}">
					@csrf

					@foreach($data as $row)

					<input type="hidden" name="rec" value="{{ $row->rec }}">
					<input type="hidden" name="today_num" value="{{ $row->today_num }}">
					<input type="hidden" name="added_id" value="{{ $row->added_id }}">

					<table class="table table-bordered">
						<tbody id="textboxDiv">
							<tr>
								<th><center>Prescribe Drugs</center></th>
							</tr>
							<tr>
								<td>
									<input type="text" name="drug[]" class="form-control" placeholder="Drugs">
								</td>
							</tr>
						</tbody>
						
					</table>

					<a href="#" id="Add" class="btn btn-success fa fa-plus">Add more field(s)</a>
					<a href="#" id="Remove" class="btn btn-danger fa fa-minus">Remove field</a>

					@endforeach

					<input type="submit" class="btn btn-primary" value="Continue" name="">

				</form>

				<script>  
					$(document).ready(function() {  
						$("#Add").on("click", function() {  
							$("#textboxDiv").append('<tr><td><input type="text" name="drug[]" class="form-control" value="" placeholder="Drugs"></td></tr>');  
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
			$('textBox').append('<tr><td><input type="text" name="drug[]" class="form-control" value=""></td></tr>');
		});
	}
</script>
@endsection
