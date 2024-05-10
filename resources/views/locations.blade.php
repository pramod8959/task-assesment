
@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">APP</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-danger"  href="{{route('logout')}}">Logout</a>
        </li>
      </ul>
  </div>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Location</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('locations.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="state">State:</label>
                                <input type="text" name="state" id="state" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="pincode">Pincode:</label>
                                <input type="text" name="pincode" id="pincode" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Location</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this location?")) {
            window.location.href = url;
        }
    }
</script>
@endsection
