<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Rating;
use App\Models\Question;
use App\Models\UserQuiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EmailHelper;

class StartQuizController extends Controller
{
    public function quiz_details(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');

        // Check if user eligible to
        if (!session()->has('user')) {
            return view('register')->with('error', 'You are not eligible to access the quiz.');
        }
        // If quiz started redirect user to his/her current question.
        $user_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $request->session()->get('user'))->where('status', 'Started')->first();
        $user_c_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $request->session()->get('user'))->where('status', 'Completed')->first();

        if ($user_c_quiz && $user_c_quiz->quiz->retake == 0) {
            return view('exam')->with('error', 'You\'ve taken the quiz on ' . date('d M y', $user_c_quiz->start_time));
        }

        if ($user_quiz != null) {
            return redirect()->route('question_link_number', ['course_id' => $course_id, 'quiz_id' => $quiz_id, 'qns_id' => $user_quiz->current_question]);
        }

        $quiz = Quiz::where('course_id', $course_id)->where('id', $quiz_id)->where('status', 'Active')->first();

        if ($quiz == null) {
            return view('exam')->with('error', 'Course does not exist or does not contain the quiz. Please contact administrator.');
        }

        if (((new \DateTime("now"))->getTimestamp() + 8 * 60 * 60) <= strtotime($quiz->available_on)) {
            $invalid = 'The quiz is not available yet!';
            return view('exam', compact('quiz', 'invalid'));
        }

        return view('exam')->with('quiz', $quiz);
    }

    public function start_quiz(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');


        $quiz = Quiz::where('course_id', $course_id)->where('id', $quiz_id)->first();

        if ($quiz == null) {
            return redirect()->back()->with('error', 'Course does not exist or does not contain the quiz');
        }
        $user_quiz = new UserQuiz;
        $user_quiz->user_id = $request->session()->get('user');
        $user_quiz->quiz_id = $quiz_id;
        $user_quiz->start_time = new \DateTime("now");
        $user_quiz->status = 'Started';
        $user_quiz->grade = 'Active';
        $all_question_ids = $quiz->get_question_ids($quiz_id);



        $question_ids = [];
        //   dd($quiz_id);
        //   dd($quiz->number_qns);
        if (
            $quiz->random_qns == 1
        ) {
            if ($quiz->number_qns <= count($all_question_ids)) {
                $randIndex = array_rand($all_question_ids, $quiz->number_qns);

                foreach ($randIndex as $i) {
                    $question_ids[] = $all_question_ids[$i];
                }

                $this->shuffle_assoc($question_ids);
            } else {
                $question_ids = $all_question_ids;
            }
        } else {
            $question_ids = array_slice($all_question_ids, 0, $quiz->qns_number);
        }
        $question_answers = "{\"qns_ans\":[";
        foreach ($question_ids as $j) {
            $question_answers .= "{\"qns_id\": " . $j . ", \"ans_text\": [], \"qns_review\": 0 },";
        }
        $question_answers = substr($question_answers, 0, -1);
        $question_answers .= "]}";
        $qns_id = $question_ids[0];
        $user_quiz->current_question = $qns_id;
        $user_quiz->question_answers = $question_answers;

        $user_quiz->save();

        return redirect()->route('question_link', ['course_id' => $course_id, 'quiz_id' => $quiz_id, 'qns_id' => $qns_id]);
    }

    public function get_question_number(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');
        $qns_id = $request->route('qns_id');
        $user_id = $request->session()->get('user');

        $user_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $user_id)->where('status', 'Started')->first();
        if ($user_quiz != null) {
            $qns_id = $qns_id;
            $qns = Question::find($qns_id);

            if ($qns == null) {
                return view('question')->with('error', 'Question does\'t exist. Please contact administrator.');
            }
            $quizans = [];
            $pos =  1;

            $user_quiz->current_question = $qns_id;
            $user_quiz = tap($user_quiz)->update()->fresh();

            $qns_ans_list = json_decode($user_quiz->question_answers, true);
            $list = $qns_ans_list['qns_ans'];
            for ($i = 0; $i < count($list); $i++) {
                if ($list[$i]['qns_id'] == $qns_id) {
                    $pos = $i + 1;
                    $quizans = $list[$i]['ans_text'];
                    $qns_review =  $list[$i]['qns_review'];
                    break;
                }
            }
            return view('question', compact('user_quiz', 'qns', 'quizans', 'pos', 'qns_review'));
        } else {
            $quiz = Quiz::where('course_id', $course_id)->where('id', $quiz_id)->first();
            return redirect()->route('get_quiz', ['course_id' => $course_id, 'quiz_id' => $quiz_id]);
        }
    }

    public function get_question(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');
        $qns_id = $request->route('qns_id');
        $user_id = $request->session()->get('user');

        $user_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $user_id)->where('status', 'Started')->first();

        if ($user_quiz != null) {
            $qns_id = $user_quiz->current_question;
            $qns = Question::find($qns_id);

            if ($qns == null) {
                return view('question')->with('error', 'Question does\'t exist. Please contact administrator.');
            }
            $quizans = [];
            $pos =  1;
            $qns_review = 0;

            $qns_ans_list = json_decode($user_quiz->question_answers, true);
            $list = $qns_ans_list['qns_ans'];
            for ($i = 0; $i < count($list); $i++) {
                if ($list[$i]['qns_id'] == $qns_id) {
                    $pos = $i + 1;
                    $quizans = $list[$i]['ans_text'];
                    $qns_review = $list[$i]['qns_review'];
                    break;
                }
            }
            return view('question', compact('user_quiz', 'qns', 'quizans', 'pos', 'qns_review'));
        } else {
            $quiz = Quiz::where('course_id', $course_id)->where('id', $quiz_id)->first();
            return redirect()->route('get_quiz', ['course_id' => $course_id, 'quiz_id' => $quiz_id]);
        }
    }

    public function submit_question(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');
        $user_id = $request->session()->get('user');
        $question_id = $request->input('question_id');
        $action = $request->input('action');
        $qnsans = $request->input('qns_ans');

        if ($request->input('qns_review') == 'on') {
            $qns_review = 1;
        } else {
            $qns_review = 0;
        }

        if ($qnsans == null) {
            $qnsans = [];
        } else {
            if (!is_array($qnsans))
                $qnsans = [$qnsans];
        }
        $next_qns_id = 0;
        $prev_qns_id = 0;
        $quizans = [];
        $pos = 0;

        $user_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $user_id)->where('status', 'Started')->first();
        if ($user_quiz != null) {
            if ($action == 'complete-quiz') {
                $user_quiz->end_time = new \DateTime("now");
            }

            $qns_ans_list = json_decode($user_quiz->question_answers, true);
            $list = $qns_ans_list['qns_ans'];

            $last_qns = "0";

            for ($i = 0; $i < count($list); $i++) {
                if ($list[$i]['qns_id'] == $question_id) {
                    // Store result to current.
                    $list[$i]['ans_text'] = $qnsans;
                    $list[$i]['qns_review'] = $qns_review;

                    if ($action == 'next') {
                        if ($i == count($list) - 1) {
                            // Already at last question
                            $next_qns_id = $list[(count($list) - 1)]['qns_id'];
                            $quizans = $list[(count($list) - 1)]['ans_text'];
                            $qns_review = $list[(count($list) - 1)]['qns_review'];
                            $pos = (count($list) - 1);
                            $last_qns = "1";
                        } else {
                            // Get next record value
                            $next_qns_id = $list[($i + 1)]['qns_id'];
                            $quizans = $list[($i + 1)]['ans_text'];
                            $qns_review = $list[($i + 1)]['qns_review'];
                            $pos = ($i + 1);
                        }

                        $user_quiz->current_question = $next_qns_id;
                    } else {
                        if ($i > 0) {
                            $prev_qns_id = $list[($i - 1)]['qns_id'];
                            $quizans = $list[($i - 1)]['ans_text'];
                            $qns_review = $list[($i - 1)]['qns_review'];
                            $pos = ($i - 1);
                        } else {
                            $prev_qns_id = $list[0]['qns_id'];
                            $quizans = $list[0]['ans_text'];
                            $qns_review = $list[0]['qns_review'];
                            $pos = 0;
                        }
                        $user_quiz->current_question = $prev_qns_id;
                    }
                    break;
                }
            }

            $pos++;
            $qns_ans_list['qns_ans'] = $list;
            $user_quiz->question_answers = $qns_ans_list;

            if ($action == 'complete-quiz') {
                $total_correct = 0;
                $arr_obj = [];
                $result = "{ \"results\": [";
                for ($j = 0; $j < count($list); $j++) {
                    $q = Question::find($list[$j]['qns_id']);
                    $correct_answer = json_decode($q->question_answers, true)['answer'];
                    $object = new \stdClass();
                    $object->question_id = $q->id;
                    $object->question_title = $q->question;
                    $object->question_type = $q->question_type;
                    $object->question_options = array_column($q->get_options_list(), 'name');

                    if ($q->question_type === 'Single Choice' || $q->question_type === 'True Or False') {
                        $object->correct_ans = [$correct_answer[0]['name']];
                    } else {
                        $object->correct_ans = array_column($correct_answer, 'name');
                    }

                    if (!empty($list[$j]['ans_text'])) {
                        $object->selected_ans = $list[$j]['ans_text'];

                        if ($q->question_type === 'Single Choice' || $q->question_type === 'True Or False') {
                            if ($list[$j]['ans_text'][0] == $object->correct_ans[0]) {
                                $total_correct++;
                                $object->mark = 'Correct';

                                $result .= "{\"name\": \"Correct\", \"qns_id\": " . $q->id . "} ,";
                            } else {
                                $object->mark = 'Wrong';
                                $result .= "{\"name\": \"Wrong\", \"qns_id\": " . $q->id . "} ,";
                            }
                        } else {
                            $check = array_diff($object->selected_ans, $object->correct_ans);
                            if (empty($check)) {
                                $total_correct++;
                                $object->mark = 'Correct';

                                $result .= "{\"name\": \"Correct\", \"qns_id\": " . $q->id . "} ,";
                            } else {
                                $object->mark = 'Wrong';
                                $result .= "{\"name\": \"Wrong\", \"qns_id\": " . $q->id . "} ,";
                            }
                        }
                    } else {
                        $object->selected_ans = [];
                        $object->mark = 'Wrong';
                        $result .= "{\"name\": \"Wrong\", \"qns_id\": " . $q->id . "} ,";
                    }
                    $arr_obj[] = $object;
                }
                $result = substr($result, 0, -1);
                $result .= "]}";

                $user_quiz->results = $result;
                $user_quiz->total_correct = $total_correct;
                $total_question = count($list);
                $user_quiz->score = ($total_correct / $total_question) * 100;
                $user_quiz->status = 'Completed';
                $user_quiz->grade = ($user_quiz->score >= $user_quiz->quiz->passing_grade) ? 'Passed' : 'Failed';
                $user_quiz->time_taken = $user_quiz->end_time->getTimestamp() -  strtotime($user_quiz->start_time);

                // Set the user time taken to the max duration .. it could be due to the form submission delay
                if ($user_quiz->time_taken >  $user_quiz->quiz->get_duration()) {
                    $user_quiz->time_taken = $user_quiz->quiz->get_duration();
                }
                $user_quiz->review_json = json_encode($arr_obj);
                $user_quiz = tap($user_quiz)->update()->fresh();

                // return redirect()->route('quiz_result', ['course_id' => $course_id, 'quiz_id' => $quiz_id])
                //         ->with( ['user_quiz' => $user_quiz, 'arr_obj' => $arr_obj, 'total_correct'=> $total_correct, 'total_question' => $total_question ] );
                return redirect()->route('quiz_result', ['course_id' => $course_id, 'quiz_id' => $quiz_id]);
            } else {
                $user_quiz = tap($user_quiz)->update()->fresh();
                $qns = Question::find($user_quiz->current_question);

                if ($qns == null) {
                    return view('question')->with('error', 'Question does\'t exist. Please contact administrator.');
                }
                return view('question', compact('user_quiz', 'qns', 'quizans', 'pos', 'qns_review', 'last_qns'));
            }
        } else {
            return view('register')->with('error', 'You have not started a quiz. Please contact administrator.');
        }
    }

    public function get_quiz_result(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');
        $user_id = $request->session()->get('user');
        $user_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $user_id)->where('status', 'Completed')->first();
        if ($user_quiz == null) {
            return view('quiz-review')->with('error', 'No quiz review available.');
        }

        $arr_obj = json_decode($user_quiz->review_json);
        $comments = Rating::where('quiz_id', $quiz_id)->where('student_id', $user_id)->get();
        $user_quiz->comments = $comments;
        return view('quiz-review', compact('user_quiz', 'arr_obj'));
    }

    public function sendResultEmail(Request $request)
    {
        $course_id = $request->route('course_id');
        $quiz_id = $request->route('quiz_id');
        $user_id = $request->session()->get('user');
        $user_quiz = UserQuiz::where('quiz_id', $quiz_id)->where('user_id', $user_id)->where('status', 'Completed')->first();
        if ($user_quiz == null) {
            return view('quiz-review')->with('error', 'No quiz review available.');
        }
        $comments = Rating::where('quiz_id', $quiz_id)->where('student_id', $user_id)->get();
        $user_quiz->comments = $comments;
        $result = EmailHelper::composeEmail($user_quiz);
        $arr_obj = json_decode($user_quiz->review_json);

        if ($result == 'success') {
            return view('quiz-review', compact('user_quiz', 'arr_obj'))->with('success', 'Result has been sent to student\'s registered email.');
        } else {
            return view('quiz-review', compact('user_quiz', 'arr_obj'))->with('success', 'Failed to send email, please contact administrator.');
        }
    }

    public function shuffle_assoc(&$list)
    {
        if (!is_array($list)) {
            return $list;
        }

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[] = $list[$key];
        }

        $list = $random;

        return $random;
    }
}
