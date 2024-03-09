@extends('layouts.master')

@section('title')
Add Question | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons card-icon">question_answer</i> เพิ่มคำถามใหม่</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('question.index') }}"> กลับ</a>
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
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @elseif( isset($success))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <p>{{ $success }}</p>
                </div>
                @endif
                <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>คำถาม:</strong>
                                <textarea class="form-control" name="question"
                                    placeholder="คำถาม">{{old('question')}}</textarea>
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
                                <strong>อัปโหลดรูปภาพ (ไม่บังคับ):</strong>
                                <input type="file" name="qns_image" id="qns_image" class="form-control" />
                            </div>
                        </div>
                        @if (isset($quiz_id))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>หลักสูตร:</strong>
                                <input type="text" value="{{ $quiz_title }}" class="form-control" disabled="true">
                                <input type="hidden" name="quiz_id" value="{{ $quiz_id }}" />
                            </div>
                        </div>
                        @else
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>หลักสูตร:</strong>
                                <select id="quiz_search" name="quiz_id" class="form-control" value="{{old('quiz_id')}}">
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div id="admin-editor-lp_question" class="answer_panel">
                                <div class="data_head clearfix">
                                    <h3 class="heading">
                                        ประเภทคำถามคำตอบ
                                    </h3>
                                    <div class="toolbar_actions">
                                        <select name="question_type" class="question_type" id="type_option">
                                            {{-- <option value="True Or False" selected="selected">จริงหรือเท็จ</option>
                                            <option value="Multi Choice">หลายทางเลือก</option> --}}
                                            <option value="Single Choice">ทางเลือกเดียว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="data-content">
                                    <!-- True or False -->
                                    <table class="list-question-answers" id="qns_type1">
                                        <thead>
                                            <tr>
                                                <th class="order">#</th>
                                                <th class="answer-text">คำตอบ <small class="hint"><em>เว้นว่างไว้หากคุณต้องการลบตัวเลือก</em></small></th>
                                                <th class="answer-correct">ถูกต้อง?</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ui-sortable">
                                            <tr class="answer-option">
                                                <td class="order">1.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_1_1" class="answer_text"
                                                        value="True" disabled>
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_1"
                                                        value="True">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">2.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_1_2" class="answer_text"
                                                        value="False" disabled>
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_1"
                                                        value="False">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Multi Choice -->
                                    <table class="list-question-answers" id="qns_type2">
                                        <thead>
                                            <tr>
                                                <th class="order">#</th>
                                                <th class="answer-text">คำตอบ <small class="hint"><em>เว้นว่างไว้หากคุณต้องการลบตัวเลือก</em></small></th>
                                                <th class="answer-correct">ถูกต้อง?</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ui-sortable">
                                            <tr class="answer-option">
                                                <td class="order">1.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_2_1" value="{{old('qns_opt_2_1')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="1">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">2.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_2_2" value="{{old('qns_opt_2_2')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="2">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">3.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_2_3" value="{{old('qns_opt_2_3')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="3">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">4.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_2_4" value="{{old('qns_opt_2_4')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="4">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">5.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_2_5" value="{{old('qns_opt_2_5')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="5">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">6.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_2_6" value="{{old('qns_opt_2_6')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="6">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="list-question-answers" id="qns_type3">
                                        <thead>
                                            <tr>
                                                <th class="order">#</th>
                                                <th class="answer-text">คำตอบ <small class="hint"><em>เว้นว่างไว้หากคุณต้องการลบตัวเลือก</em></small></th>
                                                <th class="answer-correct">ถูกต้อง?</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ui-sortable">
                                            <tr class="answer-option">
                                                <td class="order">1.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_1" value="{{old('qns_opt_3_1')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="1">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">2.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_2" value="{{old('qns_opt_3_2')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="2">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">3.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_3" value="{{old('qns_opt_3_3')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="3">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">4.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_4" value="{{old('qns_opt_3_4')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="4">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">5.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_5" value="{{old('qns_opt_3_5')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="5">
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">6.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_6" value="{{old('qns_opt_3_6')}}"
                                                        class="answer_text">
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="6">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" name="action" class="btn btn-darken" value="s">ตกลง</button>
                            <button type="submit" name="action" class="btn btn-darken" value="sc">ตกลงและสร้าง</button>
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
$('[id^=qns_type]').hide();

if ($("#type_option").val() == 'True Or False') {
    $('#qns_type1').show();
} else if ($("#type_option").val() == 'Multi Choice') {
    $('#qns_type2').show();
} else {
    $('#qns_type3').show();
}

$('#type_option').on('change', function() {
    $('[id^=qns_type]').hide();
    if ($(this).val() == 'True Or False') {
        $('#qns_type1').show();
    } else if ($(this).val() == 'Multi Choice') {
        $('#qns_type2').show();
    } else {
        $('#qns_type3').show();
    }
});

$('#quiz_search').select2({
    placeholder: '-- เลือกหลักสูตร --',
    ajax: {
        url: '/quiz_search',
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
</script>
@endsection