@extends('layouts.master')

@section('title')
Edit Quiz | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons card-icon">library_books</i> แก้ไข แบบทดสอบ</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('quiz.index') }}"> กลับ</a>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <strong>พบปัญหา!</strong> เกิดปัญหาบางอย่างกับข้อมูลที่คุณป้อน<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('quiz.update',  $quiz->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>หัวข้อ:</strong>
                                <input value="{{ $quiz->title }}" type="text" name="title" class="form-control"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รายละเอียด:</strong>
                                <textarea class="form-control" name="description"
                                    placeholder="รายละเอียด">{{ $quiz->description }} </textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>หลักสูตร:</strong>
                                <select id="course_search" name="course_id" class="form-control">
                                    @foreach ($courses as $row)
                                    <option value="{{ $row->id }}"
                                        {{$quiz->course_id == $row->id  ? 'selected="selected"' : ''}}>{{ $row->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>สถานะ:</strong>
                                <select id="status" name="status" class="form-control">
                                    <option value="Active" {{ $quiz->status == 'Active' ? 'selected="selected"' : '' }}>
                                        Active</option>
                                    <option value="Draft" {{ $quiz->status == 'Draft' ? 'selected="selected"' : '' }}>
                                        Draft</option>
                                    <option value="Ended" {{ $quiz->status == 'Ended' ? 'selected="selected"' : '' }}>
                                        Ended</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Available On:</strong> <small class="hint"><em>Leave blank if quiz is available
                                        all time</em></small>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input
                                            value="{{ ($quiz->available_on) ? date('Y-m-d\TH:i', strtotime($quiz->available_on)) : null }}"
                                            type="datetime-local" name="available_on" class="form-control"
                                            placeholder="Available On">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>สุ่มคำถาม :</strong>
                                <div class="custom-control custom-checkbox">
                                    <input {{ $quiz->random_qns == 1  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="random_qns" id="random_qns">
                                    <label class="custom-control-label" for="random_qns">นักเรียนแต่ละคนจะได้รับชุดคำถามที่แตกต่างกัน</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>คำถามการแบ่งหน้า:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input {{ $quiz->show_pagination == 1  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="show_pagination" id="show_pagination">
                                    <label class="custom-control-label" for="show_pagination">แสดงรายการคำถามขณะทำแบบทดสอบตามลำดับหมายเลข (1, 2, 3 ฯลฯ)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>คำถามทบทวน:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input {{$quiz->review_qns == 1  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="review_qns" id="review_qns">
                                    <label class="custom-control-label" for="review_qns">อนุญาตให้ทบทวนคำถามหลังจากทำแบบทดสอบเสร็จแล้ว</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>แสดงคำตอบที่ถูกต้อง:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input {{ $quiz->show_answer == 1  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="show_answer" id="show_answer">
                                    <label class="custom-control-label" for="show_answer">แสดงคำตอบที่ถูกต้องเมื่อทบทวนคำถาม</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>อัตราแบบทดสอบ:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input {{ $quiz->allow_rate == 1 ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="allow_rate" id="allow_rate">
                                    <label class="custom-control-label" for="allow_rate">อนุญาตให้นักเรียนเห็นคะแนนแบบทดสอบหลังจากเสร็จสิ้นแบบทดสอบ</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>จำนวนคำถาม:</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input value="{{ $quiz->number_qns }}" class="form-control" step="1" max="500"
                                            min="0" type="number" id="number_qns" name="number_qns"
                                            placeholder="แบบทดสอบมีกี่คำถาม">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>เวลา:</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input type="number" value="{{ $quiz->duration }}" name="duration"
                                            class="form-control" placeholder="Duration of the quiz. Set 0 to disable.">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <select name="duration_lb" class="form-control">
                                            <option value="minute"
                                                {{$quiz->duration_lb == 'minute'  ? 'selected="selected"' : ''}}>
                                                Minute(s)</option>
                                            <option value="hour"
                                                {{$quiz->duration_lb == 'hour'  ? 'selected="selected"' : ''}}>Hour(s)
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>เกณฑ์ผ่าน (%):</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input value="{{ $quiz->passing_grade }}" class="form-control" step="1"
                                            max="100" min="0" type="number" id="passing_grade" name="passing_grade">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Re-take:</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input value="{{ $quiz->retake }}" class="form-control" step="1" max="100"
                                            min="0" type="number" id="retake" name="retake"
                                            placeholder=" How many times the user can re-take this quiz. Set to 0 to disable re-taking.">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Access Code:</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input value="{{ $quiz->access_code }}" class="form-control" type="text"
                                            size="10" id="access_code" name="access_code" readonly>
                                        <small><em>Student is required to enter the access code before accessing the
                                                quiz.</em></small>
                                        <button type="button" id="get_accesscode"
                                            class="btn btn-darken">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-darken">ตกลง</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function() {

    $('#status').select2();
    $('#course_search').select2({
        placeholder: '-- เลือกหลักสูตร --',
        ajax: {
            url: '/course_search',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
});

$('#get_accesscode').on('click', function() {
    $.ajax({
        url: "/oems/get_access_code",
        success: function(result) {
            $("#access_code").val(result)
        }
    });
});
</script>
@endsection