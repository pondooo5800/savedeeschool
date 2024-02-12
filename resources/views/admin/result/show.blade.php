@extends('layouts.master')

@section('title')
Exam Result | {{ config('settings.name', 'Laravel') }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="#" id="exporttopdf">Export to PDF</a>
                </div>
            </div>
            <div id="printarea">
                <div class="card-header quiz-progress">
                    <div class="progress-items">
                        <div class="progress-item">
                            <span class="review-title">{{ $userquiz->quiz->title }}</span>
                        </div>
                        <!-- <div class="progress-item text-right">
                        </div> -->
                    </div>
                    <br />
                    <div>
                        <table>
                            <tr>
                                <th> Student Name: </th>
                                <td> &nbsp;{{ $userquiz->student->name }}</td>
                            </tr>
                            <tr>
                                <th> Student Number: </th>
                                <td> &nbsp;{{ $userquiz->student->student_number }}</td>
                            </tr>
                            <tr>
                                <th> Email: </th>
                                <td> &nbsp;{{ $userquiz->student->email }}</td>
                            </tr>
                            <tr>
                                <th> Completed On: </th>
                                <td> &nbsp;{{ date('d M Y H:i A', strtotime($userquiz->end_time)) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr />
                    <div class="progress-items">
                        <div class="progress-item">
                            <span class="progress-number correct-label">
                                {{ $total_correct }} / {{ $total_question }}
                            </span>
                            <span class="progress-label"><i class="material-icons">assignment_turned_in</i>Marks
                                Obtained</span>
                        </div>
                        <div class="progress-item grade-label">
                            <span class="progress-number correct-label">
                                {{ $userquiz->score }}%
                            </span>
                            <span class="progress-label"><i class="material-icons">analytics</i>Student
                                Score</span>
                        </div>
                        <div class="progress-item quiz-countdown">
                            <span class="progress-number correct-label">
                                {{ $userquiz->get_timetaken_html() }}
                            </span>
                            <span class="progress-label"><i class="material-icons">watch_later</i>Time
                                Taken</span>
                        </div>
                        <div class="progress-item quiz-countdown">
                            <span class="progress-number correct-label">
                                {{ $userquiz->grade }}
                            </span>
                            <span class="progress-label"><i class="material-icons">emoji_events</i>Result</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                @endphp

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$("#exporttopdf").click(function() {
    var d = new Date().toISOString().slice(0, 19).replace(/-/g, "");
    filename = 'report_' + d + '.pdf';
    var pdf_content = document.getElementById("printarea");
    var options = {
        margin: 1,
        filename: filename,
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            unit: 'cm',
            format: 'a4',
            orientation: 'portrait'
        }
    };
    html2pdf(pdf_content, options);
});
</script>
@endsection