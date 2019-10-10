<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Exam;
use App\Questions;
use App\AssignedExam;
use App\UserResponse;
use PhpParser\Node\Expr\Assign;

class AdminController extends Controller
{
    public function createUser(Request $request)
    {
        $checkUser = Users::select('user_name')->where('user_name', $request->user_name)->count();
        if ($checkUser == 0) {
            Users::create([
                'user_name' => $request->get('user_name'),
                'user_role' => 'user'

            ]);
            return redirect('admin');
        } else {
            session()->flash('msg', 'User Already Exist');
            return redirect('admin/create-user');
        }
    }

    public function createExam(Request $request)
    {
        $checkExam = Exam::where('exam_title', $request->exam_title)->count();
        if ($checkExam == 0) {
            Exam::create([
                'exam_title' => $request->get('exam_title')
            ]);
            return redirect('admin');
        } else {
            session()->flash('msg', 'This exam already exists');
            return redirect('admin/create-exam');
        }
    }

    public function createQuestion()
    {
        $examData = Exam::all(['id', 'exam_title']);
        return view('admin.question.create')->with('examData', $examData);

    }

    public function storeQuestion(Request $request)
    {
        Questions::create([
            'exam_id' => $request->get('exam_id'),
            'question_title' => $request->get('question_title'),
            'ques_option1' => $request->get('ques_option1'),
            'ques_option2' => $request->get('ques_option2'),
            'ques_option3' => $request->get('ques_option3'),
            'ques_option4' => $request->get('ques_option4'),
            'correct_option' => $request->get('correct_option'),
        ]);
        return redirect('admin');
    }

    public function createAssignExam()
    {
        $userList = Users::where('user_role', 'user')->get();
        $examData = Exam::all(['id', 'exam_title']);

        return view('admin.assign.create')->with('examData', $examData)->with('userList', $userList);
    }

    public function storeAssignExam(Request $request)
    {
        $checkAssign = AssignedExam::where('exam_id', $request->exam_id)->where('user_id', $request->user_id)->count();
        if ($checkAssign == 0) {
            AssignedExam::create([
                'exam_id' => $request->get('exam_id'),
                'user_id' => $request->get('user_id'),
            ]);
            return redirect('admin');
        } else {
            session()->flash('msg', 'Already Assigned this exam to the user');
            return redirect('/admin/assign-exam');
        }
    }

    public function userResponse(Request $request)
    {
        $exams_assigned_users = AssignedExam::join('users', 'assigned_exam.user_id', '=', 'users.id')->get()->groupBy('user_name');
        $final_data = array();
        $i = 0;
        foreach ($exams_assigned_users as $key => $user) {
            $single_userData = Users::join('assigned_exam', 'users.id', '=', 'assigned_exam.user_id')
                ->join('exams', 'exams.id', '=', 'assigned_exam.exam_id')
                ->where('assigned_exam.user_id', $user[$i]['user_id'])
                ->get()->toArray();

            foreach ($single_userData as $k => $data) {
                $single_userData[$k]['correct_response'] = UserResponse::where('exam_id', $data['exam_id'])->where('user_id', $data['user_id'])->where('is_correct', 1)->count();
                $single_userData[$k]['total_response'] = UserResponse::where('exam_id', $data['exam_id'])->where('user_id', $data['user_id'])->count();
            }
            $exams_assigned_users[$key]['user_data'] = $single_userData;
            $i++;
        }

        return view('admin.users.response')
            ->with('final_data', $exams_assigned_users->toArray());


    }


}
