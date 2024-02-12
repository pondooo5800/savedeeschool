<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserQuiz;
use PDF;

class ResultController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = UserQuiz::all();
        return view('admin.result.index', compact('results'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserQuiz  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userquiz = UserQuiz::find($id);
        $total_correct = $userquiz->total_correct;
        $total_question = $userquiz->quiz->number_qns;
        $arr_obj = json_decode($userquiz->review_json);
        return view('admin.result.show', compact('userquiz', 'arr_obj', 'total_correct', 'total_question'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserQuiz  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userquiz = UserQuiz::find($id);
        $userquiz->delete();

        return redirect()->back()
            ->with('success', 'User quiz result has been deleted successfully');
    }
}