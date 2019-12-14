@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<button class="btn btn-primary hidden-print" onclick="window.print()">Print</button>
		<div class="col-sm-10" style="border: 1px solid #000; background: pink">

			<table class="table table-bordered">
				<tr>
					<th colspan="2" class="text-center">ICD CODE ({{ Session::get('type') }}) occurences from {{ Session::get('from') }} to {{ Session::get('to') }}</th>
				</tr>
				<tr>
					<th>Code</th>
					<th>No of occurences</th>
				</tr>
				@foreach($data as $row)
				<tr>
					<td>{{ $row->code }}</td>
					<td>{{ $row->total }}</td>
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
