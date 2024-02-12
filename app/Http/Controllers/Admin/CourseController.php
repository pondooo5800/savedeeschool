<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
class CourseController extends Controller
{
    //
    public function list()
    {
        $courses = Course::all();
        return view('admin.course.list')->with('courses', $courses);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Course::latest()->paginate(5);

        // return view('admin.course.index', compact('courses'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('course.index')
            ->with('success', 'สร้างหลักสูตรสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $course->update($request->all());
        return redirect()->route('course.index')
            ->with('success', 'แก้ไขหลักสูตรเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')
            ->with('success', 'ลบหลักสูตรเรียบร้อยแล้ว');
    }

    public function course_search(Request $request)
    {
        $courses = [];

        if ($request->has('q')) {
            $search = $request->q;
            $courses = Course::where('title', 'LIKE', "%$search%")
                ->select('id', 'title')
                ->get();
        }

        if ($request->has('q')) {
            $search = $request->q;
            $courses = Course::where('title', 'LIKE', "%$search%")
                ->select('id', 'title')
                ->get();
        }else {
            $courses = Course::select("id", "title")
            ->get();
        }

        return response()->json($courses);
    }

    public function enroll(Request $request, $id) {
        $course = Course::where('id', $id)->first();
        $studentList = $request->input('studentList');
        // Need to check if the student already enrolled?
        $course->students()->syncWithoutDetaching($studentList);
        return view('admin.course.show', compact('course'));
    }

    public function unenroll(Request $request, $id, $cid) {
        $course = Course::where('id', $cid)->first();
        $course->students()->detach($id);
        return view('admin.course.show', compact('course'));
    }
}