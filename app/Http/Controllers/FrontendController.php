<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Course;


class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slide = Slide::all();
        $cours = Course::all();
        return view('frontend.index')->with([
            'slides' => $slide,
            'courses' => $cours
        ]);
    }
    public function about($id = null)
    {
        if ($id != null) {
            return view('frontend.about_detail');

            // $quiz_id = $id;
            // $quiz = Quiz::find($quiz_id);
            // $quiz_title = $quiz->title;
            // return view('admin.question.create', compact('quiz_id', 'quiz_title'));
        } else {
            return view('frontend.about');
        }
    }
    public function course_detail($id)
    {
        $course = Course::find($id);
        $coursAll = Course::all();
        return view('frontend.course_detail')->with([
            'course' => $course,
            'coursAll' => $coursAll
        ]);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function video()
    {
        return view('frontend.video');
    }
    public function gallery()
    {
        return view('frontend.gallery');
    }
    public function new_license()
    {
        return view('frontend.new_license');
    }
    public function renew_license()
    {
        return view('frontend.renew_license');
    }
    public function internationa_license()
    {
        return view('frontend.internationa_license');
    }
    public function theory()
    {
        return view('frontend.theory');
    }
    public function practical()
    {
        return view('frontend.practical');
    }
}
