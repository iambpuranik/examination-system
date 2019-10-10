@extends('master')

@section('title', 'Login')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>Login</h2>

        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-group">
                <label for="user_name">User Name:</label>
                <input type="user_name" class="form-control" id="user_name" placeholder="Enter User Name"
                       name="user_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection