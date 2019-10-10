@extends('master')

@section('title', 'Question')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>Question</h2>

        {{--        {!! ($examData[0]->id) !!}--}}

        <form method="POST" action="/admin/create-question">
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
                <label for="question_title">Question Title:</label>
                <input type="question_title" class="form-control" id="question_title" placeholder="Enter Question"
                       name="question_title" required>
            </div>

            <div class="form-group">
                <label for="ques_option1">Option 1:</label>
                <input type="ques_option1" class="form-control" id="ques_option1" placeholder="Enter Option"
                       name="ques_option1" required>
            </div>

            <div class="form-group">
                <label for="ques_option2">Option 2:</label>
                <input type="ques_option2" class="form-control" id="ques_option2" placeholder="Enter Option"
                       name="ques_option2" required>
            </div>

            <div class="form-group">
                <label for="ques_option3">Option 3:</label>
                <input type="ques_option3" class="form-control" id="ques_option3" placeholder="Enter Option"
                       name="ques_option3" required>
            </div>

            <div class="form-group">
                <label for="ques_option4">Option 4:</label>
                <input type="ques_option4" class="form-control" id="ques_option4" placeholder="Enter Option"
                       name="ques_option4" required>
            </div>

            <div class="form-group">
                <label for="correct_option">Correct Option:</label>
                <select class="form-control" id="sel1" name="correct_option">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>

                {{--<input type="correct_option" class="form-control" id="correct_option" placeholder="Enter Question"--}}
                       {{--name="correct_option" required>--}}
            </div>





            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection