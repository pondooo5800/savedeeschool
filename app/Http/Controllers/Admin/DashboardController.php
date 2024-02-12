<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\UserQuiz;
use App\Models\Enrolment;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use stdClass;

class DashboardController extends Controller
{
    public function index() 
    {
        $arr_obj = new stdClass;
        $courses = Course::all();
        $arr_obj->total_course = $courses->count();

        $quizzes = Quiz::all();
        $arr_obj->total_quiz = $quizzes->count();

        $questions = Question::all();
        $arr_obj->total_qns = $questions->count();

        $students = Student::all();
        $arr_obj->total_student = $students->count();

        $arr_obj->courseJson = Enrolment::select('title as label', DB::raw('count(*) as y'))
                                ->join('courses', 'courses.id', '=', 'enrolments.course_id')
                                ->orderBy('y', 'desc')
                                ->groupBy('title')
                                ->get(5);

        
        return view('admin.dashboard', compact('arr_obj'));
    }
}