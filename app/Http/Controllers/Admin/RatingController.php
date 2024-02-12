<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Student;
class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return view('admin.rating.index')->with('ratings', $ratings);
    }

    public function show(Rating $rating)
    {
        return view('admin.rating.show', compact('rating'));
    }

    public function studentRate(Request $request)
    {
        try
        {
            $rating = new Rating;

            $student = Student::where('student_number', $request->session()->get('user'))->get();
            if (isset($student)) {
                $rating->student_id = $student[0]->id;
                $rating->rating = $request->input('rating');
                $rating->comment = $request->input('comment');
                $rating->quiz_id = $request->input('quiz_id');
                $rating->save();
                return redirect()->back()->with('success', 'Thanks for your rating!');   
            } else {
                return redirect()->back()->with('error', 'Student record is not found. Please contact administrator.');
            }
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }  
    }
}




    