@extends('master')

@section('title', 'Index')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>Assigned Exam</h2>

        <form method="POST" action="/user/start-exam/{examId}">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="hidden" name="exam_id" value="{{$examId}}">

            @foreach($examDetail as $data)

                <div class="form-group response">
                    <label for="question_title">{{ $data->question_title  }}</label>
                    <div class="radio">
                        <label><input type="radio" name="answer[{{$data->id}}]" value="1"
                                      checked>{{$data->ques_option1}}</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="answer[{{$data->id}}]" value="2">{{$data->ques_option2}}
                        </label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="answer[{{$data->id}}]" value="3">{{$data->ques_option3}}
                        </label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="answer[{{$data->id}}]" value="4">{{$data->ques_option4}}
                        </label>
                    </div>
                </div>

            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

{{--<script>--}}

   {{--$(document).ready(){--}}

    {{--var response =   $('.response').val();--}}

       {{--console.log(response);--}}

   {{--}--}}

{{--</script>--}}