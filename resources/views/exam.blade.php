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
                <div class="card-header quiz-header ">
                    <h3>{{ $quiz->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="card-top">
                        <h3>รายละเอียด</h3>
                        <p> @php
                            echo nl2br($quiz->description);
                            @endphp
                        </p>
                    </div>
                    <hr />
                    <ul class="quiz-intro">
                        <li>
                            <label>เวลา</label>
                            <span>{{ $quiz->get_duration_html() }} นาที</span>
                        </li>
                        <li>
                            <label>เกณฑ์ผ่าน</label>
                            <span>{{ intval($quiz->passing_grade) }}%</span>
                        </li>
                        <li>
                            <label>คำถาม</label>
                            <span>{{ $quiz->number_qns }} ข้อ</span>
                        </li>
                    </ul>
                    <div class="quiz-buttons text-center">
                        <form
                            action="{{ route('start_quiz', ['course_id' => $quiz->course_id, 'quiz_id' => $quiz->id]) }}"
                            name="start-quiz" class="start-quiz" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" />
                            <input type="hidden" name="course_id" value="{{ $quiz->course_id }}" />
                            <button type="submit" class="btn btn-darken btn-lg"
                                {{ isset($invalid) ? 'disabled' : '' }}>
                                <spen style="font-size: 16px;font-weight: bold;">เริ่มทำข้อสอบ</spen>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
$('input[type=submit]').click(function() {
    $(this).attr('disabled', 'disabled');
    $(this).parents('form').submit();
});
</script>
@endsection