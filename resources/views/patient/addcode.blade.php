@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

<div class="container">
	<div class="row">

		<div class="col-sm-10 col-lg-10 panel panel-primary row">
			<div class="panel-heading">Add Code</div>
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

				<form method="post" action="{{ url('/entercode') }}">
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
						<label>Operations</label>
						<input type="text" required="" name="operation" class="form-control">
					</div>

					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary" value="Continue" name="">
					</div>					

				</form>
				

			</div>
		</div>


	</div>
</div>


@endsection
