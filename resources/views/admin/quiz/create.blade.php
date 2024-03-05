@extends('layouts.master')

@section('title')
Add Quiz | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons card-icon">library_books</i> เพิ่ม แบบทดสอบ</h4>
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
                <form action="{{ route('quiz.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>หัวข้อ:</strong>
                                <input type="text" name="title" class="form-control" placeholder="หัวข้อ"
                                    value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รายละเอียด:</strong>
                                <textarea class="form-control" name="description"
                                    placeholder="รายละเอียด">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>หลักสูตร:</strong>
                                <select id="course_search" name="course_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>สถานะ:</strong>
                                <select id="status" name="status" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Draft" selected>Draft</option>
                                    <option value="Ended">Ended</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Available On:</strong> <small class="hint"><em>Leave blank if quiz is available
                                        all time</em></small>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input type="datetime-local" name="available_on" class="form-control"
                                            placeholder="Available On" value="{{old('available_on')}}">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>สุ่มคำถาม:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input checked {{ old('random_qns') == 'on'  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="random_qns" id="random_qns">
                                    <label class="custom-control-label" for="random_qns">นักเรียนแต่ละคนจะได้รับชุดคำถามที่แตกต่างกัน</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question List:</strong>
                                    <input type="text" name="qns_list" class="form-control"
                                        placeholder="If randomize question is unchecked, specify the question ids with seperate comma. e.g. 1-5,7,9-12">
                                </div>
                            </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>คำถามการแบ่งหน้า:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input checked {{old('show_pagination') == 'on'  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="show_pagination" id="show_pagination">
                                    <label class="custom-control-label" for="show_pagination">แสดงรายการคำถามขณะทำแบบทดสอบตามลำดับหมายเลข (1, 2, 3 ฯลฯ)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>คำถามทบทวน:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input checked {{ old('review_qns') == 'on'  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="review_qns" id="review_qns">
                                    <label class="custom-control-label" for="review_qns">อนุญาตให้ทบทวนคำถามหลังจากทำแบบทดสอบเสร็จแล้ว</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>แสดงคำตอบที่ถูกต้อง:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input checked {{ old('show_answer') == 'on'  ? 'checked=checked' : ''}} type="checkbox"
                                        class="custom-control-input" name="show_answer" id="show_answer">
                                    <label class="custom-control-label" for="show_answer">แสดงคำตอบที่ถูกต้องเมื่อทบทวนคำถาม</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>อัตราแบบทดสอบ:</strong>
                                <div class="custom-control custom-checkbox">
                                    <input checked {{ old('allow_rate') == 'on'  ? 'checked=checked' : ''}} type="checkbox"
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
                                        <input class="form-control" step="1" max="500" min="0" value="20" type="number"
                                            id="number_qns" name="number_qns" value="{{old('number_qns')}}"
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
                                        <input type="number" name="duration" class="form-control"
                                            placeholder="เวลา"
                                            value="{{old('duration')}}">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <select name="duration_lb" class="form-control">
                                            <option value="minute" selected="selected">นาที(s)</option>
                                            <option value="hour">ชั่วโมง(s)</option>
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
                                        <input class="form-control" step="1" max="100" min="0" value="80" type="number"
                                            size="30" id="passing_grade" name="passing_grade"
                                            value="{{old('passing_grade')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Re-take:</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input class="form-control" step="1" max="100" min="0" value="0" type="number"
                                            size="30" id="retake" name="retake" value="{{old('retake')}}"
                                            placeholder="Limit the number of attempts allowed. Set to 0 to disable re-taking.">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Access Code:</strong>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <input class="form-control" type="text" size="10" id="access_code"
                                            name="access_code" readonly value="{{old('access_code')}}">
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
    });
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

$('#get_accesscode').on('click', function() {
    $.ajax({
        url: "/get_access_code",
        success: function(result) {
            $("#access_code").val(result)
        }
    });
});
</script>
@endsection