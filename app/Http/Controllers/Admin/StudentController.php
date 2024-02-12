<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'student_number' => 'required|unique:students',
        ]);

        $validator->validate();

        Student::create($request->all());
        return redirect()->route('student.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student_result = UserQuiz::where('user_id', $student->id)->where('status', 'Completed')->get();
        return view('admin.student.show', compact('student', 'student_result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'student_number' => 'required|unique:students,student_number,' .$student->student_number ,
        ]);

        $validator->validate();

        $student->update($request->all());

        return redirect()->route('student.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')
            ->with('success', 'Student deleted successfully');
    }

    public function register_index()
    {
        return view('register');
    }

    public function register_student(Request $request)
    {
        // TODO insert into DB student details.
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            // 'student_number' => 'required',
            'quiz_id' => 'required',
            // 'access_code' => 'required',
        ]);

        $validator->validate();
        // Check if user exist.
        $student = Student::where('email', $request->input('email'))->first();
        if ($student == null)
        {
            $student_number = 'SD' . random_int(10000000, 99999999);
            $data =[
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'quiz_id'=>$request->input('quiz_id'),
                'student_number'=>$student_number,
            ];
            $student = Student::create($data);
        }

        // check if quiz access code valid
        $quiz = Quiz::where('id', $request->input('quiz_id'))->first();

        $request->merge([
            'logged_in' => new \DateTime("now"),
            'current_quiz' => $request->input('quiz_id')
        ]);
        $request->session()->put('user', $student->id);
        return view('exam')->with('quiz', $quiz);

    }

    public function search(Request $request)
    {
        $keyword = $request->get('term');
        $results = Student::where('name', 'like', '%'.$keyword.'%')->orWhere('student_number', 'like', '%'.$keyword.'%')->select('id', 'name', 'student_number')->get();
        return response()->json($results);
    }

    public function enroll(Request $request, $id) {
        $student = Student::where('id', $id)->first();
        $courseList = $request->input('courseList');
        $student->courses()->syncWithoutDetaching($courseList);
        return view('admin.student.show', compact('student'));
    }

    public function unenroll(Request $request, $id, $sid) {
        $student = Student::where('id', $sid)->first();
        $student->courses()->detach($id);
        return view('admin.student.show', compact('student'));
    }

    function timeDifference($start, $stop){

        $diff = $stop - $start;
        $fullHours   = floor($diff/(60*60));
        $fullMinutes = floor(($diff-($fullHours*60*60))/60);
        $fullSeconds = floor($diff-($fullHours*60*60)-($fullMinutes*60));

        return sprintf("%02d",$fullHours) . ":" . sprintf("%02d",$fullMinutes) . ":" . sprintf("%02d",$fullSeconds);
    }
}