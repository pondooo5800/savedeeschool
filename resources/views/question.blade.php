@extends('layouts.app')
@section('content')
<style>
    .radio-card {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: 0.2s;
    }

    .radio-card:hover {
        background-color: #f5f5f5;
    }

    .radio-card.selected {
        background-color: #cceaff;
    }

    .radio-input {
        display: none;
    }

    .card-header {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 10px;
    }

    .btn {
        margin-left: auto;
    }
    .img-mobile{
        width: 550px;
        height: 350px;
    }
    @media only screen and (max-width: 992px) {
    .img-mobile{
        width: 100%;
        height: auto !important;;
        }

    }
</style>
<div class="container">
    <div class="row justify-content-center ">
        @if (isset($error))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <strong>พบปัญหา!</strong> {{ $error }}<br><br>
        </div>
        @else
        <div class="col-md-12">
            <span style="color: #fff;font-size:large" class="item-name"><strong>{{ (Session::get('name')) }}</strong> </span>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header quiz-progress">
                    <div class="progress-items">
                        <div class="progress-item quiz-current-question">
                            <strong><span class="progress-number">
                                {{ $pos }} / {{ $qns->quiz->number_qns }} </span></strong>
                            <span class="progress-label" style="font-size: large">
                                คำถาม </span>
                        </div>
                        <div class="progress-item quiz-countdown">
                            <strong><span id="timer" class="progress-number"></span></strong>
                            <span class="progress-label"style="font-size: large">
                                เวลาที่เหลืออยู่ </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form name="question-next" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                @if($qns->image_name)
                                <div class="qns-img text-center">
                                    <img class="img-mobile" src="{{ asset('uploads/'.$qns->image_name) }}">
                                </div>
                                @endif
                                <br />
                                <div class="question-text" style="font-size: larger;">
                                    @php
                                    echo nl2br($qns->question);
                                    @endphp
                                    <button type="button" class="btn btn-primary btn-sm" onclick="responsiveVoice.speak($('#text').val(),$('#voiceselection').val());"><span><i class="fa fa-volume-up"></i></span></button>
                                </div>
                <hr>
                                <table class="question-answers" style="font-size: larger;">
                                    <tbody>
                                        @php
                                        if ($qns->question_type == 'True Or False') {
                                        echo '<tr class="answer-option">';
                                            if (count($quizans) > 0) {
                                            if ($quizans[0] == 'True') {
                                            echo '<td class="answer-correct"><input type="radio" name="qns_ans"
                                                    value="True" checked="checked"></td>';
                                            } else {
                                            echo '<td class="answer-correct"><input type="radio" name="qns_ans"
                                                    value="True"></td>';
                                            }

                                            echo '<td>True</td>';
                                            echo '</tr>';
                                        echo '<tr class="answer-option">';
                                            if ($quizans[0] == 'False') {
                                            echo '<td class="answer-correct"><input type="radio" name="qns_ans"
                                                    value="False" checked="checked"></td>';
                                            } else {
                                            echo '<td class="answer-correct"><input type="radio" name="qns_ans"
                                                    value="False"></td>';
                                            }
                                            echo '<td>False</td>';
                                            echo '</tr>';
                                        } else {
                                        echo '<td class="answer-correct"><input type="radio" name="qns_ans"
                                                value="True">
                                        </td>';
                                        echo '<td>True</td>';
                                        echo '</tr>';
                                        echo '<tr class="answer-option">';
                                            echo '<td class="answer-correct"><input type="radio" name="qns_ans"
                                                    value="False"></td>';
                                            echo '<td>False</td>';
                                            echo '</tr>';
                                        }
                                        } elseif ($qns->question_type == 'Multi Choice') {
                                        if (count($quizans) > 0) {
                                        foreach ($qns->get_options_list() as $q) {
                                        echo '<tr class="answer-option">';
                                            echo '<td class="answer-correct"><input type="checkbox" name="qns_ans[]"
                                                    value="' .
                                                                    $q->name .
                                                                    '" ' .
                                                                    (in_array($q->name, $quizans)
                                                                        ? ' checked="checked"'
                                                                        : '') .
                                                                    '></td>';
                                            echo '<td>' . $q->name . '</td>';
                                            echo '</tr>';
                                        }
                                        } else {
                                        foreach ($qns->get_options_list() as $q) {
                                        echo '<tr class="answer-option">';
                                            echo '<td class="answer-correct"><input type="checkbox" name="qns_ans[]"
                                                    value="' .
                                                                    $q->name .
                                                                    '"></td>';
                                            echo '<td>' . $q->name . '</td>';
                                            echo '</tr>';
                                        }
                                        }
                                        } elseif ($qns->question_type == 'Single Choice') {
                                        if (count($quizans) > 0) {
                                        foreach ($qns->get_options_list() as $key => $q) {
                                          echo '<label for="radio-card-' . $key . '"
                                            class="radio-card d-flex justify-content-between ' . ($quizans[0] == $q->name ? 'selected' : '') . '">';
                                            echo '<input type="hidden" id="text-answer_' . $key . '" value="' . $q->name . '">';
                                            echo '<input type="radio" name="qns_ans" value="' . $q->name . '" ' . ($quizans[0] == $q->name ? '
                                                checked="checked"' : '') . ' id="radio-card-' . $key . '" class="radio-input">';
                                            echo '<div class="card-content-wrapper">
                                                <div class="card-body">
                                                    <h5 style="color:#000">' . $q->name . '</h5>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="responsiveVoice.speak($(\'#text-answer_' . $key . '\').val(), $(\'#voiceselection\').val());">
                                                <span><i class="fa fa-volume-up"></i></span>
                                            </button>';
                                            echo '</label>';
                                        // echo '<tr class="answer-option">';
                                        //     echo '<input type="hidden" id="text-answer_'.$key.'" value="' . $q->name . '">';
                                        //     echo '<td class="answer-correct"><input type="radio" name="qns_ans" value="' .
                                        //                             $q->name .
                                        //                             '" ' .
                                        //                             ($quizans[0] == $q->name ? ' checked="checked"' : '') .'></td>';
                                        //    echo '<td><span class="px-2">' . $q->name . '</span><button type="button" class="btn btn-primary btn-sm"
                                        //             onclick="responsiveVoice.speak($(\'#text-answer_'.$key.'\').val(), $(\'#voiceselection\').val());">';
                                        //             echo '<span><i class="fa fa-volume-up"></i></span></button>';
                                        //         echo '</td>';
                                        //     echo '</tr>';
                                        }
                                        } else {
                                        foreach ($qns->get_options_list()  as $key => $q) {
                                             echo '<label for="radio-card-'.$key.'" class="radio-card d-flex justify-content-between">';
                                                 echo '<input type="hidden" id="text-answer_'.$key.'" value="' . $q->name . '">';
                                                 echo '<input type="radio" name="qns_ans" value="' . $q->name . '" id="radio-card-'.$key.'" class="radio-input" />';
                                                 echo ' <div class="card-content-wrapper">
                                                     <div class="card-body">
                                                         <h5 style="color:#000">' . $q->name . '</h5>
                                                         </div>
                                                     </div>
                                                 <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="responsiveVoice.speak($(\'#text-answer_'.$key.'\').val(), $(\'#voiceselection\').val());">';
                                                     echo '<span><i class="fa fa-volume-up"></i></span></button>';
                                                 echo' </label>';
                                            // echo '<tr class="answer-option">';
                                            //     echo '<td class="answer-correct">';
                                            //         echo '<input type="hidden" id="text-answer_'.$key.'" value="' . $q->name . '">';
                                            //         echo '<input type="radio" name="qns_ans" value="' . $q->name . '">';
                                            //         echo '</td>';
                                            //     echo '<td><span class="px-2">' . $q->name . '</span><button type="button" class="btn btn-primary btn-sm"
                                            //             onclick="responsiveVoice.speak($(\'#text-answer_'.$key.'\').val(), $(\'#voiceselection\').val());">';
                                            //             echo '<span><i class="fa fa-volume-up"></i></span></button>';
                                            //         echo '</td>';
                                            //     echo '</tr>';
                                            }
                                        }
                                        }
                                        @endphp
                                    </tbody>
                                </table>
                                <br />
                            </div>
                            @if($qns->quiz->show_pagination === 1)
                            <div class="col-md-4">
                                @foreach ($user_quiz->getQuestionList() as $item)
                                <a href="{!! route('question_link_number', ['course_id' => $qns->quiz->course_id, 'quiz_id' => $qns->quiz_id, 'qns_id' => $item['qns_id']]) !!}"
                                    class="btn {{ ($item['qns_review'] == 1) ? 'btn-warning' : (!empty($item['ans_text']) ? 'btn-success' : '') }}">{{
                                    $loop->index + 1 }}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <input type="hidden" id="text" value="{{$qns->question}}">
                                <select style="display: none" id="voiceselection"></select>
                                <input type="hidden" name="question_type" value="{{ $qns->question_type }}">
                                <input type="hidden" name="question_id" value="{{ $qns->id }}">
                                <input type="hidden" name="quiz_id" value="{{ $qns->quiz_id }}">
                                <input type="hidden" name="course_id" value="{{ $qns->quiz->course_id }}">

                                <button type="submit" class="btn btn-primary" name="action"
                                    value="prev">ก่อนหน้า</button>
                                <button type="submit" class="btn btn-primary" name="action" value="next">ถัดไป</button>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" {{ $qns_review==1
                                            ? 'checked=checked' : '' }} name="qns_review">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                               กลับมาตรวจสอบ
                            </div>

                            <div class="col-md-6 col-sm-12 text-md-right">
                                <button type="submit" id="complete-quiz" class="btn btn-primary" name="action"
                                    value="complete-quiz">สิ้นสุดการทำข้อสอบ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    const radioCards = document.querySelectorAll('.radio-card');

radioCards.forEach(radioCard => {
  radioCard.addEventListener('click', () => {
    // ยกเลิกการเลือก radio card อื่นๆ
    const otherRadioCards = document.querySelectorAll('.radio-card.selected');
    otherRadioCards.forEach(otherRadioCard => {
      otherRadioCard.classList.remove('selected');
    });

    // เลือก radio card นี้
    radioCard.classList.add('selected');
  });
});
</script>

@endsection

@section('scripts')
@if(session('error'))
<script>
           Swal.fire({
            title: 'พบข้อผิดพลาด!',
            text: 'โปรดทำข้อสอบให้ครบทุกข้อ',
            icon: 'error',
            confirmButtonText: 'ตกลง'
            });
</script>
@endif
<script>
    var voicelist = responsiveVoice.getVoices();
        var vselect = $("#voiceselection");
        var vthaimale = 'Thai Male';
        $.each(voicelist, function() {
                vselect.append($("<option />").val(vthaimale).text(this.name));
        });
</script>
<script>
    $(document).bind("contextmenu", function(e) {
    return false;
});

var distance = "<?php echo $user_quiz->get_time_remaining(); ?>";
timer();
var x = setInterval(timer, 1000);

var last_qns = "<?php echo $last_qns ?? '' ?>";

if (last_qns == '1') {
    Swal.fire({
    title: "แจ้งเตือน",
    text: "นี่เป็นคำถามสุดท้าย หากคุณต้องการที่จะจบการสอบ? โปรดกดปุ่มสิ้นสุดการทำข้อสอบ",
    icon: "question"
    });
}

$(document).keydown(function(event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
        return false;
    }
});

function timer() {
    distance--;
    var hours = Math.floor(distance / 3600);
    var minutes = Math.floor((distance / 60) % 60);
    var seconds = Math.floor(distance % 60);

    // Output the result in an element with id="demo"
    document.getElementById("timer").innerHTML = ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + (
        '0' + seconds).slice(-2)

    if (distance == 60) {
        Swal.fire({
            title: "แจ้งเตือน",
            text: "แบบทดสอบจบลงใน 1 นาที",
            icon: "question"
            });
    }
    // If the count down is over, write some text
    if (distance <= 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "EXPIRED";
        document.getElementById("complete-quiz").click();
    }
}
</script>
@endsection