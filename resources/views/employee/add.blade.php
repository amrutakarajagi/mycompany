@extends('layouts.app')

@section('title') Add New Employees @endsection

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


<form action="{{url('employee')}}" method="POST">
{{ csrf_field() }}

<input type="text" name="name" id="name" placeholder="name">
<input type="text" name="age" id="age" placeholder="age">
<input type="text" name="salary" id="salary" placeholder="salary">
<input type="text" name="hobbies" id="hobbies" placeholder="hobbies">
<input type="text" name="passport_no" id="passport_no" placeholder="passport_no">
<input type="text" name="pancard_no" id="pancard_no" placeholder="pancard_no">
<input type="submit">
</form>

@endsection