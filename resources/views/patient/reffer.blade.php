@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-sm-12 col-lg-10 panel panel-primary">
			<div class="panel-heading">Refer</div>
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

				<form method="post" action="{{ url('/addrefdata') }}">
					@csrf


					<input type="hidden" name="rec" value="{{ Session::get('rec') }}">
					<input type="hidden" name="today_num" value="{{ Session::get('today_num') }}">
					<input type="hidden" name="added_id" value="{{ Session::get('added_id') }}">

					<div class="form-group">
						<label>Reffered to</label>
						<input type="text" name="referred" class="form-control">
					</div>

					<div class="form-group">
						<label>Ward</label>
						<input type="text" name="ward" class="form-control">
					</div>					

					<input type="submit" class="btn btn-primary" value="Continue" name="">

				</form>
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
