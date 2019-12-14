@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <a href="#" onclick="window.print()">print</a>

    	<div class="col-sm-10" style="border: 1px solid #000">
            <center><h2>FEDERAL MEDICAL CENTER, IDI-ABA ABEOKUTA</h2></center>
    		<table class="table">
    			<tr>
                    @foreach($data as $row)
    				<th>Name: <b>{{ $row->name }}</b></th>
                    <th>Age: <b>{{ $row->age }} year(s)</b></th>
                    @endforeach
    			</tr>
                <tr>
                    @foreach($data2 as $row)
                    <td>Referred to: {{ $row->reffered }}</td>
                    <td>Referred by: {{ $row->name }}</td>
                    @endforeach
                </tr>
    		</table>
    	</div>


    </div>
</div>
@endsection
