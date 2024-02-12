<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Carbon\Traits\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\stdClass;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportQuestions;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.question.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
        if ($id != 0)
        {
            $quiz_id = $id;
            $quiz = Quiz::find($quiz_id);
            $quiz_title = $quiz->title;
            return view('admin.question.create', compact('quiz_id', 'quiz_title'));
        }
        else
        {
            return view('admin.question.create');
        }
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
            'question' => 'required',
            'question_type' => 'required',
            'quiz_id' => 'required',
            'qns_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        $validator->validate();
        if ($request->hasFile('qns_image')) {
            $file = $request->file('qns_image');
            $filename = rand() . '.' .$file->getClientOriginalName();
            $request->merge([
                'image_name' => $filename
            ]);

            $file->move(public_path().'/uploads/', $filename);
        }

        if ($request->input('question_type') == 'True Or False') {
            $option = "{ \"options\": [";
            $option .= "{\"name\": \"True\"} , ";
            $option .= "{\"name\": \"False\"} ";
            $option .= "]}";

            $answer_list = $request->input('qns_ans_1');

            if ($answer_list == null || $answer_list == '') {
                $validator->errors()->add('field', 'Correct answer can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator);
            }

            $answer = "{ \"answer\": [";
            if ($request->input('qns_ans_1') == 'True') {
                $answer .= "{\"name\": \"True\"} ";
            } else {
                $answer .= "{\"name\": \"False\"} ";
            }

            $answer .= "]}";
        } else if ($request->input('question_type') == 'Multi Choice') {
            $qns_opt_1 = $request->input('qns_opt_2_1');
            $qns_opt_2 = $request->input('qns_opt_2_2');
            $qns_opt_3 = $request->input('qns_opt_2_3');
            $qns_opt_4 = $request->input('qns_opt_2_4');
            $qns_opt_5 = $request->input('qns_opt_2_5');
            $qns_opt_6 = $request->input('qns_opt_2_6');
            $answer_list = $request->input('qns_ans_2');
            if (sizeof($answer_list) == 0) {
                $validator->errors()->add('field', 'Correct answer can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $option = "{ \"options\": [";
            $answer = "{ \"answer\": [";
            $option_list = [];

            if ($qns_opt_1 != null && $qns_opt_1 != '') {
                $option_list[] = $qns_opt_1;
            }
            if ($qns_opt_2 != null && $qns_opt_2 != '') {
                $option_list[] = $qns_opt_2;
            }
            if ($qns_opt_3 != null && $qns_opt_3 != '') {
                $option_list[] = $qns_opt_3;
            }
            if ($qns_opt_4 != null && $qns_opt_4 != '') {
                $option_list[] = $qns_opt_4;
            }
            if ($qns_opt_5 != null && $qns_opt_5 != '') {
                $option_list[] = $qns_opt_5;
            }
            if ($qns_opt_6 != null && $qns_opt_6 != '') {
                $option_list[] = $qns_opt_6;
            }

            if (sizeof($option_list) == 0) {
                $validator->errors()->add('field', 'Options can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            foreach ($option_list as $op) {
                $option .= "{\"name\": \"" . $op . "\"} ,";
            }

            $option = substr($option, 0, -1);

            foreach ($answer_list as $ans) {
                $answer .= "{\"name\": \"" . ${"qns_opt_" . $ans}  . "\"} ,";
            }

            $answer = substr($answer, 0, -1);

            $option .= "]}";
            $answer .= "]}";
        } else if ($request->input('question_type') == 'Single Choice') {
            $qns_opt_1 = $request->input('qns_opt_3_1');
            $qns_opt_2 = $request->input('qns_opt_3_2');
            $qns_opt_3 = $request->input('qns_opt_3_3');
            $qns_opt_4 = $request->input('qns_opt_3_4');
            $qns_opt_5 = $request->input('qns_opt_3_5');
            $qns_opt_6 = $request->input('qns_opt_3_6');

            $answer_list = $request->input('qns_ans_3');
            if ($answer_list == null || $answer_list == '') {
                $validator->errors()->add('field', 'Correct answer can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $option = "{ \"options\": [";
            $answer = "{ \"answer\": [";
            $option_list = [];

            if ($qns_opt_1 != null && $qns_opt_1 != '') {
                $option_list[] = $qns_opt_1;
            }
            if ($qns_opt_2 != null && $qns_opt_2 != '') {
                $option_list[] = $qns_opt_2;
            }
            if ($qns_opt_3 != null && $qns_opt_3 != '') {
                $option_list[] = $qns_opt_3;
            }
            if ($qns_opt_4 != null && $qns_opt_4 != '') {
                $option_list[] = $qns_opt_4;
            }
            if ($qns_opt_5 != null && $qns_opt_5 != '') {
                $option_list[] = $qns_opt_5;
            }
            if ($qns_opt_6 != null && $qns_opt_6 != '') {
                $option_list[] = $qns_opt_6;
            }

            if (sizeof($option_list) == 0) {
                $validator->errors()->add('field', 'Options can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            foreach ($option_list as $op) {
                $option .= "{\"name\": \"" . $op . "\"} ,";
            }

            $option = substr($option, 0, -1);
            $answer .= "{\"name\": \"" . ${"qns_opt_" . $answer_list[0]}  . "\"} ,";

            $answer = substr($answer, 0, -1);

            $option .= "]}";
            $answer .= "]}";
        } else {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        }

        $request->merge([
            'question_options' => $option,
            'question_answers' => $answer
        ]);

        Question::create($request->all());
        if ($request->input('action') == 'sc')
        {
            $quiz_id = $request->input('quiz_id');
            $quiz = Quiz::find($quiz_id);
            $quiz_title = $quiz->title;
            $success = 'สร้างคำถามเรียบร้อยแล้ว';

            return view('admin.question.create', compact('quiz_id', 'quiz_title', 'success'));
        }
        else
        {
            return redirect()->route('question.create')
            ->with('success', 'สร้างคำถามเรียบร้อยแล้ว');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $qns_opts = json_decode($question->question_options, true);
        $qns_opts = $qns_opts['options'];
        if ($question->question_type == 'Multi Choice' || $question->question_type == 'Single Choice') {
            if (count($qns_opts) < 6) {
                $remaining = 6 - count($qns_opts);
                for ($i=0; $i < $remaining; $i++) {
                    $qns_opts[] = ['name' => ''];
                }
            }
        }

        $qns_ans = json_decode($question->question_answers, true);
        $qns_ans = $qns_ans['answer'];
        return view('admin.question.edit', compact('question', 'qns_opts', 'qns_ans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validator = Validator::make(request()->all(), [
            'question' => 'required',
            'question_type' => 'required',
            'quiz_id' => 'required',
        ]);

        $validator->validate();

        if ($request->input('question_type') == 'True Or False') {

            // $qns_opt_1 = $request->input('qns_opt_1_1');
            // $qns_opt_2 = $request->input('qns_opt_1_2');

            $option = "{ \"options\": [";
            $option .= "{\"name\": \"True\"} , ";
            $option .= "{\"name\": \"False\"} ";
            $option .= "]}";

            $answer_list = $request->input('qns_ans_1');

            if ($answer_list == null || $answer_list == '') {
                $validator->errors()->add('field', 'Correct answer can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator);
            }

            $answer = "{ \"answer\": [";
            if ($request->input('qns_ans_1') == 'True') {
                $answer .= "{\"name\": \"True\"} ";
            } else {
                $answer .= "{\"name\": \"False\"} ";
            }

            $answer .= "]}";
        } else if ($request->input('question_type') == 'Multi Choice') {
            $qns_opt_1 = $request->input('qns_opt_2_1');
            $qns_opt_2 = $request->input('qns_opt_2_2');
            $qns_opt_3 = $request->input('qns_opt_2_3');
            $qns_opt_4 = $request->input('qns_opt_2_4');
            $qns_opt_5 = $request->input('qns_opt_2_5');
            $qns_opt_6 = $request->input('qns_opt_2_6');

            $answer_list = $request->input('qns_ans_2');

            if (sizeof($answer_list) == 0) {
                $validator->errors()->add('field', 'Correct answer can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $option = "{ \"options\": [";
            $answer = "{ \"answer\": [";
            $option_list = [];

            if ($qns_opt_1 != null && $qns_opt_1 != '') {
                $option_list[] = $qns_opt_1;
            }
            if ($qns_opt_2 != null && $qns_opt_2 != '') {
                $option_list[] = $qns_opt_2;
            }
            if ($qns_opt_3 != null && $qns_opt_3 != '') {
                $option_list[] = $qns_opt_3;
            }
            if ($qns_opt_4 != null && $qns_opt_4 != '') {
                $option_list[] = $qns_opt_4;
            }
            if ($qns_opt_5 != null && $qns_opt_5 != '') {
                $option_list[] = $qns_opt_5;
            }
            if ($qns_opt_6 != null && $qns_opt_6 != '') {
                $option_list[] = $qns_opt_6;
            }

            if (sizeof($option_list) == 0) {
                $validator->errors()->add('field', 'Options can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            foreach ($option_list as $op) {
                $option .= "{\"name\": \"" . $op . "\"} ,";
            }

            $option = substr($option, 0, -1);

            foreach ($answer_list as $ans) {
                $answer .= "{\"name\": \"" . ${"qns_opt_" . $ans}  . "\"} ,";
            }

            $answer = substr($answer, 0, -1);

            $option .= "]}";
            $answer .= "]}";
        } else if ($request->input('question_type') == 'Single Choice') {
            $qns_opt_1 = $request->input('qns_opt_3_1');
            $qns_opt_2 = $request->input('qns_opt_3_2');
            $qns_opt_3 = $request->input('qns_opt_3_3');
            $qns_opt_4 = $request->input('qns_opt_3_4');
            $qns_opt_5 = $request->input('qns_opt_3_5');
            $qns_opt_6 = $request->input('qns_opt_3_6');

            $answer_list = $request->input('qns_ans_3');
            if ($answer_list == null || $answer_list == '') {
                $validator->errors()->add('field', 'Correct answer can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $option = "{ \"options\": [";
            $answer = "{ \"answer\": [";
            $option_list = [];

            if ($qns_opt_1 != null && $qns_opt_1 != '') {
                $option_list[] = $qns_opt_1;
            }
            if ($qns_opt_2 != null && $qns_opt_2 != '') {
                $option_list[] = $qns_opt_2;
            }
            if ($qns_opt_3 != null && $qns_opt_3 != '') {
                $option_list[] = $qns_opt_3;
            }
            if ($qns_opt_4 != null && $qns_opt_4 != '') {
                $option_list[] = $qns_opt_4;
            }
            if ($qns_opt_5 != null && $qns_opt_5 != '') {
                $option_list[] = $qns_opt_5;
            }
            if ($qns_opt_6 != null && $qns_opt_6 != '') {
                $option_list[] = $qns_opt_6;
            }

            if (sizeof($option_list) == 0) {
                $validator->errors()->add('field', 'Options can\'t be empty.');
                return redirect()->route('question.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            foreach ($option_list as $op) {
                $option .= "{\"name\": \"" . $op . "\"} ,";
            }

            $option = substr($option, 0, -1);
            $answer .= "{\"name\": \"" . ${"qns_opt_" . $answer_list[0]}  . "\"} ,";

            $answer = substr($answer, 0, -1);

            $option .= "]}";
            $answer .= "]}";
        } else {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        }

        $request->merge([
            'question_options' => $option,
            'question_answers' => $answer
        ]);

        $question->update($request->all());

        return redirect()->route('question.index')
            ->with('success', 'แก้ไขคำถามเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('question.index')
            ->with('success', 'ลบคำถามเรียบร้อยแล้ว');
    }

    public function import(Request $request)
    {
        Excel::import(new ImportQuestions($request->input('quiz_id')), $request->file('file'));
        return redirect()->route('question.index')
        ->with('success', 'Question has been imported');
    }

    public function quiz_search(Request $request)
    {
        $quizzes = [];

        if ($request->has('q')) {
            $search = $request->q;
            $quizzes = Quiz::select("id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
            }else {
                $quizzes = Quiz::select("id", "title")
                ->get();
            }
        return response()->json($quizzes);
    }

    public function quiz_search_active(Request $request)
    {
        $quizzes = [];

        if ($request->has('q')) {
            $search = $request->q;
            $quizzes = Quiz::select("id", "title")
                ->where('status', 'Active')
                ->where('title', 'LIKE', "%$search%")
                ->get();
        }else {
            $quizzes = Quiz::select("id", "title")
            ->where('status', 'Active')
            ->get();
        }
        return response()->json($quizzes);
    }
}
