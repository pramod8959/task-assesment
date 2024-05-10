@extends('layouts.app')

@section('title','verify')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container col-md-4">
    <h3>Enter OTP</h3>
    <form method="POST" action="{{ route('verify') }}">
        @csrf
        <div class="form-group">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" id="otp" class="form-control" required>
            <input type="hidden" name="phone_number">
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>
</div>
<script>
        fetch('{{ route('get-otp') }}')
            .then(response => response.json())
            .then(data => console.log('OTP:', data.otp))
            .catch(error => console.error('Error fetching OTP:', error));
    </script>
@endsection