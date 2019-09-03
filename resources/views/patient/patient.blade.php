@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    	<table class="table table-bordered">
    		<tr>
    			<th><a href="{{ url('/addpatient') }}" class="btn btn-primary" ><i class="fa fa-user-plus">Add New patient</i></a></th>
    		</tr>
    	</table>


    </div>
</div>
@endsection
