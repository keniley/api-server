@extends ('layout')

@section('content')
    <h1>Admin</h1>
    <a href="{{ url()->current() }}/user" class="btn btn-danger">Show all users</a>
@endsection