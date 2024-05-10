@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">User Info</a>
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
                <h5>User location info</h5>
            <table class="table">
                            <thead>
                                <tr>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>PinCode</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $location->state }}</td>
                                        <td>{{ $location->city }}</td>
                                        <td>{{ $location->pincode }}</td>
                                        <td>
                                            <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="#" onclick="confirmDelete('{{ route('locations.delete', $location->id) }}')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                </table>
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
