@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        @if (isset($error))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">ปิด</i>
            </button>
            <strong>พบปัญหา!</strong> {{ $error }}<br><br>
        </div>
        @else
        <div class="col-md-12">
            <div class="card">
                @if (isset($success))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">ปิด</i>
                    </button>
                    <p>{{ $success }}</p>
                </div>
                @endif
                @if (isset($failed))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">ปิด</i>
                    </button>
                    <p>{{ $failed }}</p>
                </div>
                @endif
                <div class="card-header quiz-progress">

                    <div class="progress-items">
                        <div class="progress-item">
                            <span class="review-title">{{ $user_quiz->quiz->title }}</span>
                        </div>
                        <div class="progress-item text-right">
                            <a href="{{ route('send_result_email', ['course_id' => $user_quiz->quiz->course_id, 'quiz_id' => $user_quiz->quiz->id]) }}"
                                class="btn btn-darken">
                                ส่งผลคะแนนไปที่อีเมล
                            </a>
                        </div>
                    </div>
                    <br />
                    <div>
                        <table>
                            <tr>
                                <th> ชื่อ นามสกุล: </th>
                                <td> &nbsp;{{ $user_quiz->student->name }}</td>
                            </tr>
                            <tr>
                                <th> เลขประจำตัว: </th>
                                <td> &nbsp;{{ $user_quiz->student->student_number }}</td>
                            </tr>
                            <tr>
                                <th> อีเมล: </th>
                                <td> &nbsp;{{ $user_quiz->student->email }}</td>
                            </tr>
                            <tr>
                                <th> วันที่ทำข้อสอบ: </th>
                                <td> &nbsp;{{ date('d M Y ', strtotime($user_quiz->end_time)) }}</td>
                            </tr>
                        </table>
                    </div>
                    <hr />
                    <div class="progress-items">
                        <div class="progress-item">
                            <span class="progress-number correct-label">
                                {{ $user_quiz->total_correct }} / {{ $user_quiz->quiz->number_qns }}
                            </span>
                            <span class="progress-label"><i class="material-icons">assignment_turned_in</i>Marks
                                Obtained</span>
                        </div>
                        <div class="progress-item grade-label">
                            <span class="progress-number correct-label">
                                {{ $user_quiz->score }}%
                            </span>
                            <span class="progress-label"><i class="material-icons">analytics</i>Your Score</span>
                        </div>
                        <div class="progress-item quiz-countdown">
                            <span class="progress-number correct-label">
                                {{ $user_quiz->get_timetaken_html() }}
                            </span>
                            <span class="progress-label"><i class="material-icons">watch_later</i>Time Taken</span>
                        </div>
                        <div class="progress-item quiz-countdown">
                            <span class="progress-number correct-label">
                                {{ $user_quiz->grade }}
                            </span>
                            <span class="progress-label"><i class="material-icons">emoji_events</i>Result</span>
                        </div>
                    </div>
                </div>
                @if ($user_quiz->quiz->allow_rate == 1)
                @if ($user_quiz->comments->count() > 0)
                <div class="card-header">
                    Thank you for your rating!
                </div>
                @else
                @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @else
                {{-- <div class="card-header">
                    <form action="{{ route('quiz.rate') }}" method="post">
                        @csrf
                        <legend class="rating-legend">Please rate on the quiz:</legend>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"
                                title="Excellent!">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Great">4
                                stars</label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                                title="Average">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                                title="Not Good">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Bad">1
                                star</label>
                        </fieldset>
                        <div style="clear:both;"></div>
                        <textarea class="comment-box" id="comment" name="comment"> </textarea>
                        <br />
                        <input type='hidden' name='quiz_id' id='quiz_id' value="{{ $user_quiz->quiz->id }}" />
                        <input type='hidden' name='student_id' id='student_id' value="{{ $user_quiz->student->id }}" />
                        <input type="submit" name="submit" value="Publish Now" class="btn btn-darken">
                        </p>
                    </form>
                </div> --}}

                @endif
                @endif
                @endif
                <div class="card-body">
                    @if ($user_quiz->quiz->review_qns == 1)
                    <table class="review-table">
                        @foreach ($arr_obj as $item)
                        <tr>
                            <td class="first-col">
                                @if ($item->mark == 'Correct')
                                <i style="color:green;" class="material-icons">check_circle</i>
                                @else
                                <i style="color:red;" class="material-icons">cancel</i>
                                @endif
                            </td>
                            <td><strong>Question {{ $loop->index + 1 }}.</strong> <br />
                                <p class="p-qns-title">@php
                                    echo nl2br($item->question_title);
                                    @endphp </p>

                                @php

                                if ($user_quiz->quiz->show_answer == 1) {
                                foreach ($item->question_options as $op) {
                                echo '<div class="span-qns-option">';
                                    echo in_array($op, $item->selected_ans) ? '<strong>' . $op . '</strong>' : $op;
                                    if (in_array($op, $item->correct_ans)) {
                                    echo '<i class="correct_icon material-icons">check</i>';
                                    } elseif ($item->mark == 'Wrong' && (in_array($op, $item->selected_ans) &&
                                    !in_array($op, $item->correct_ans))) {
                                    echo '<i class="wrong_icon material-icons">close</i>';
                                    }
                                    echo '</div>';
                                }
                                }
                                @endphp

                            </td>
                        </tr>
                        @endforeach
                    </table>

                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).bind("contextmenu", function(e) {
    return false;
});

$(document).keydown(function(event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
        return false;
    }
});
</script>
@endsection