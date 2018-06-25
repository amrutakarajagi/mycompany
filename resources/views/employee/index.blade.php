@extends('layouts.app')

@section('title') Listing Employees @endsection

@section('content')
<a href="{{url('employee/create')}}">Add New</a><br><br>
<table>
<th>ID</th>
<th>Name</th>
<th>Actions</th>
@foreach($employees as $employee)
<tr>
<td>{{ $employee->id }}</td>
<td>{{ $employee->name }}</td>
<td>
	<a href="{{url('employee/'.$employee->id.'/edit')}}">Edit</a>
	<a href="{{url('employee/'.$employee->id)}}">View</a>
	<form action="{{url('employee/'.$employee->id)}}" method="POST">
		{{ method_field('DELETE') }} 
		{{ csrf_field() }}
		<input type="submit" value="delete">
	</form>
</td>
</tr>
@endforeach
</table>

@endsection