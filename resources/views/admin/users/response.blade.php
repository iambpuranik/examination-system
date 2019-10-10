@extends('master')

@section('title', 'User Response')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <h2>User Response</h2>

        <ul class="list-group">


            @foreach($final_data as $key => $data)

                <li class="list-group-item">{{ ucfirst($key) }}
                    <ol>
                        @foreach($data['user_data'] as $result)

                            <li>Exam: {!! $result['exam_title'] !!} - Marks:{!! $result['correct_response'] !!}</li>
                        @endforeach
                    </ol>
                </li>

            @endforeach
        </ul>

    </div>

@endsection