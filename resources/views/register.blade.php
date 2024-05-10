@extends('layouts.app')

@section('title','register')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container col-md-4">
    <h5>Registeration</h5>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group" >
            <label for="phone_number">Enter mobile number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

</div>
@endsection