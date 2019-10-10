@extends('master')

@section('title', 'Exam')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>Create Exam</h2>

        <form method="POST" action="/admin/create-exam">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-group">
                <label for="exam_title">Exam Title:</label>
                <input type="exam_title" class="form-control" id="exam_title" placeholder="Enter Exam Title"
                       name="exam_title" required>
                {!! Session::has('msg') ? Session::get("msg") : '' !!}
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection