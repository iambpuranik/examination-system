@extends('master')

@section('title', 'Index')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>User Dashboard</h2>

        <ul class="list-group">
            @foreach($usersData as $data)
            <li class="list-group-item">Exam : {{ $data->exam_title  }} -
                @if(($data->total_response) > 0)
                   Marks : {{ $data->correct_response }}
                @else
                    <a href="{{ route('user.start.exam',$data->exam_id) }}" class="btn btn-sm btn-primary pull-right">Take Exam</a>
                @endif
            </li>
            @endforeach
        </ul>


    </div>

@endsection