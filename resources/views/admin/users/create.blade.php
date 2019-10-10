@extends('master')

@section('title', 'Add User')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        <h2>Add User</h2>

        <form method="POST" action="/admin/create-user">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-group">
                <label for="user_name">User Name:</label>
                <input type="user_name" class="form-control" id="user_name" placeholder="Enter User Name"
                       name="user_name" required>
                <br>
                {!! Session::has('msg') ? Session::get("msg") : '' !!}
            </div>

            <button type="submit" class="btn btn-primary">Add User</button>

        </form>
    </div>

@endsection