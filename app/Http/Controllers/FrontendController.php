<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Course;
use App\Models\Blog;
use App\Models\Video;


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
        $blog = Blog::all();
        $video = Video::all();
        return view('frontend.index')->with([
            'slides' => $slide,
            'courses' => $cours,
            'blogs' => $blog,
            'videos' => $video,
        ]);
    }
    public function about($id = null)
    {
        if ($id !== null) {
            $blog = Blog::find($id);
            return view('frontend.about_detail')->with('blog', $blog);
        } else {
            $blogs = Blog::all();
            return view('frontend.about')->with('blogs', $blogs);
        }
    }    public function course_detail($id)
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
        $video = Video::all();
        return view('frontend.video')->with([
            'videos' => $video,
        ]);
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
