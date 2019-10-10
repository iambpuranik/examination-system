<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Exam;
use App\Questions;
use App\AssignedExam;
use App\UserResponse;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $usersData = Exam::join('assigned_exam', 'exams.id', '=', 'assigned_exam.exam_id')
            ->where('assigned_exam.user_id', $userId)
            ->get();

        for ($i = 0; $i < count($usersData); $i++) {
            $usersData[$i]['correct_response'] = UserResponse::where('exam_id', $usersData[$i]['exam_id'])->where('user_id', $userId)->where('is_correct', 1)->count();
            $usersData[$i]['total_response'] = UserResponse::where('exam_id', $usersData[$i]['exam_id'])->where('user_id', $userId)->count();
        }
        return view('user.index')
            ->with('usersData', $usersData);

    }

    public function startExam(Request $request)
    {
        $examDetail = Questions::where('exam_id', $request->examId)->get();

        return view('user.startExam')->with('examDetail', $examDetail)->with('examId', $request->examId);
    }

    public function endExam(Request $request)
    {
        $answers = $request->answer;
        foreach ($answers as $k => $ans) {
            $endExam = new UserResponse();
            $endExam->user_id = auth()->user()->id;
            $endExam->question_id = $k;
            $endExam->exam_id = $request->exam_id;
            $endExam->user_response = $ans;
            $check = Questions::where('id', $k)->pluck('correct_option');
            $is_correct = 0;
            if ($check == $ans) $is_correct = 1;
            $endExam->is_correct = $is_correct;
            $endExam->save();
        }
        return redirect()->route('user.index');
    }


}
