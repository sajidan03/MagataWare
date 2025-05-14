@extends('template')
@section('content')

@if (session('message'))
    <div class="container alert alert-danger alert-dismissible mt-10" style="margin-bottom: -100px">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="container mt-10">
    <h2>Login</h2>
    <form action="/member/auth" method="post">
        @csrf
        <div class="container mt-10 border ">
            <div class="mt-3 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="mt-3 mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
