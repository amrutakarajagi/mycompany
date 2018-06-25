@extends('layouts.app')

@section('title') Edit Employee @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{url('employee/'.$employee->id)}}" method="POST">
{{ csrf_field() }}
{{ method_field('PUT') }} 
<input type="text" name="name" id="name" placeholder="name" value="{{$employee->name}}">
<input type="text" name="age" id="age" placeholder="age" value="{{$employee->age}}">
<input type="text" name="salary" id="salary" placeholder="salary" value="{{$employee->salary}}">
<input type="text" name="hobbies" id="hobbies" placeholder="hobbies" value="{{$employee->hobbies}}">
<input type="text" name="passport_no" id="passport_no" placeholder="passport_no" value="{{$employee->employeeDetail->passport_no}}">
<input type="text" name="pancard_no" id="pancard_no" placeholder="pancard_no" value="{{$employee->employeeDetail->pancard_no}}">
<input type="submit">
</form>

@endsection