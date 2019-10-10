@extends('master')

@section('title', 'Assign Exam')


@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>Assign</h2>
        {!! Session::has('msg') ? Session::get("msg") : '' !!}
        <br>
        <form method="POST" action="/admin/assign-exam">
            <input type="hidden" name="_token" value="{{ Session::token() }}">

            <div class="form-group">
                <label for="exam_id">Select Exam:</label>

                <select class="form-control" name="exam_id">
                    @if($examData->count() > 0)
                        @foreach($examData as $data)
                            <option value="{{$data->id}}">{{$data->exam_title}}</option>
                        @endForeach
                    @else
                        No Record Found
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="exam_id">Select User:</label>

                <select class="form-control" name="user_id">
                    @if($userList->count() > 0)
                        @foreach($userList as $data)
                            <option value="{{$data->id}}">{{$data->user_name}}</option>
                        @endForeach
                    @else
                        No Record Found
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection