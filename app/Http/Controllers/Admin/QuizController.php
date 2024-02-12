<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\UserQuiz;
use App\Models\Rating;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        return view('admin.quiz.index')->with('quiz', $quiz);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'number_qns' => 'required',
            'course_id' => 'required',
            'status' => 'required',
            'access_code' => 'required',
        ]);

        if ($request->input('random_qns') == 'on') {
            $request->merge([
                'random_qns' => 1,
            ]);
        } else {
            $request->merge([
                'random_qns' => 0,
            ]);
        }

        if ($request->input('review_qns') == 'on') {
            $request->merge([
                'review_qns' => 1,
            ]);
        } else {
            $request->merge([
                'review_qns' => 0,
            ]);
        }

        if ($request->input('show_answer') == 'on') {
            $request->merge([
                'show_answer' => 1,
            ]);
        } else {
            $request->merge([
                'show_answer' => 0,
            ]);
        }

        if ($request->input('allow_rate') == 'on') {
            $request->merge([
                'allow_rate' => 1,
            ]);
        } else {
            $request->merge([
                'allow_rate' => 0,
            ]);
        }

        if ($request->input('show_pagination') == 'on') {
            $request->merge([
                'show_pagination' => 1,
            ]);
        } else {
            $request->merge([
                'show_pagination' => 0,
            ]);
        }

        Quiz::create($request->all());

        return redirect()->route('quiz.index')
            ->with('success', 'สร้างแบบทดสอบสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $quiz = $quiz;
        $user_quiz = UserQuiz::where('quiz_id', $quiz->id)->where('status', 'Completed')->get();
        $arr_obj = new stdClass;
        $result_arr = $user_quiz->pluck('grade')->toArray();
        $counts = array_count_values($result_arr);
        if (isset($counts['Passed'])) {
            $arr_obj->total_passed = $counts['Passed'];
        } else {
            $arr_obj->total_passed = 0;
        }

        if (isset($counts['Failed'])) {
            $arr_obj->total_failed = $counts['Failed'];
        } else {
            $arr_obj->total_failed = 0;
        }

        $score_arr = $user_quiz->pluck('score')->toArray();
        if ($score_arr != null) {
            $arr_obj->highest = max($score_arr);
            $arr_obj->lowest = min($score_arr);
        } else {
            $arr_obj->highest = 0;
            $arr_obj->lowest = 0;
        }

        $user_quiz = UserQuiz::where('quiz_id', $quiz->id)->where('status', 'Completed')->latest('end_time')->take(5)->get();

        $value = $this->getRatingYValue($quiz->id);

        $output = $this->getScoreRange($quiz->id);

        return view('admin.quiz.show', compact('quiz', 'user_quiz', 'arr_obj', 'value', 'output'));
    }

    public function getRatingYValue($quiz_id)
    {
        $value = [0, 0, 0, 0, 0];
        $r = Rating::where('quiz_id', $quiz_id)->groupBy('rating')
            ->selectRaw('count(*) as total, rating')
            ->get();

        foreach ($r as $r) {
            $value[$r->rating - 1] = $r->total;
        }

        return json_encode($value);
    }

    public function getScoreRange($quiz_id)
    {
        $value = [0, 0, 0, 0, 0];
        $ranges = [ // the start of each score-range.
            '0 - 19' => 0,
            '20 - 39' => 20,
            '40 - 59' => 40,
            '60 - 79' => 60,
            '80 - 100' => 80
        ];

        $output = UserQuiz::where('quiz_id', $quiz_id)->where('status', 'Completed')
            ->get()
            ->map(function ($result) use ($ranges) {
                $score = $result->score;
                foreach ($ranges as $key => $breakpoint) {
                    if ($breakpoint >= $score) {
                        $result->range = $key;
                        break;
                    }
                }
                return $result;
            })
            ->mapToGroups(function ($result, $key) {
                return [$result->range => $result];
            })
            ->map(function ($group) {
                return count($group);
            });
        foreach ($output as $key => $val) {
            if ($key == '0 - 19') {
                $value[0] = $val;
            } else if ($key == '20 - 39') {
                $value[1] = $val;
            } else if ($key == '40 - 59') {
                $value[2] = $val;
            } else if ($key == '60 - 79') {
                $value[3] = $val;
            } else {
                $value[4] = $val;
            }
        }

        return json_encode($value);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $courses = Course::all();
        return view('admin.quiz.edit', compact('quiz', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required',
            'number_qns' => 'required',
            'status' => 'required',
            'access_code' => 'required',
        ]);

        if ($request->input('random_qns') == 'on') {
            $request->merge([
                'random_qns' => 1,
            ]);
        } else {
            $request->merge([
                'random_qns' => 0,
            ]);
        }

        if ($request->input('review_qns') == 'on') {
            $request->merge([
                'review_qns' => 1,
            ]);
        } else {
            $request->merge([
                'review_qns' => 0,
            ]);
        }

        if ($request->input('show_answer') == 'on') {
            $request->merge([
                'show_answer' => 1,
            ]);
        } else {
            $request->merge([
                'show_answer' => 0,
            ]);
        }

        if ($request->input('allow_rate') == 'on') {
            $request->merge([
                'allow_rate' => 1,
            ]);
        } else {
            $request->merge([
                'allow_rate' => 0,
            ]);
        }

        if ($request->input('show_pagination') == 'on') {
            $request->merge([
                'show_pagination' => 1,
            ]);
        } else {
            $request->merge([
                'show_pagination' => 0,
            ]);
        }

        $quiz->update($request->all());

        return redirect()->route('quiz.index')
            ->with('success', 'แก้ไขแบบทดสอบสำเร็จแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('quiz.index')
            ->with('success', 'Quiz deleted successfully');
    }

    public function get_accesscode(Request $request)
    {
        return response()->json(Str::random(10));
    }
}