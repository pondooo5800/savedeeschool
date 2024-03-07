@extends('layouts.master')

@section('title')
แก้ไข คำถาม | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons card-icon">question_answer</i> แก้ไข คำถาม</h4>
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
                @endif
                <form action="{{ route('question.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>คำถาม:</strong>
                                <textarea class="form-control" name="question"
                                    placeholder="question">{{ $question->question }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รายละเอียด:</strong>
                                <textarea class="form-control" name="description"
                                    placeholder="description">{{ $question->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>แบบทดสอบ :</strong>
                                <input type="text" value="{{ $question->quiz->title }}" class="form-control"
                                    disabled="true">
                                <input type="hidden" name="quiz_id" value="{{ $question->quiz_id }}" />
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div id="admin-editor-lp_question" class="answer_panel">
                                <div class="data_head clearfix">
                                    <h3 class="heading">
                                       คำถามและคำตอบ
                                    </h3>
                                    <div class="toolbar_actions">
                                        <select name="question_type" class="question_type" id="type_option">
                                            <option value="True Or False"
                                                {{ $question->question_type == 'True Or False' ? 'selected="selected"' : '' }}>
                                                True Or False</option>
                                            <option value="Multi Choice"
                                                {{ $question->question_type == 'Multi Choice' ? 'selected="selected"' : '' }}>
                                                Multi Choice</option>
                                            <option value="Single Choice"
                                                {{ $question->question_type == 'Single Choice' ? 'selected="selected"' : '' }}>
                                                Single Choice</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="data-content">
                                    <!-- True or False -->
                                    <table class="list-question-answers" id="qns_type1">
                                        <thead>
                                            <tr>
                                                <th class="order">#</th>
                                                <th class="answer-text">ข้อความคำตอบ <small class="hint"><em>ว้นว่างไว้หากคุณต้องการลบตัวเลือก</em></small></th>
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
                                                        value="True"
                                                        {{ ($qns_ans[0]['name'] == 'True') ? 'checked=checked' : ''}}>
                                                </td>
                                            </tr>
                                            <tr class="answer-option">
                                                <td class="order">2.</td>
                                                <td>
                                                    <input type="text" name="qns_opt_1_2" class="answer_text"
                                                        value="False" disabled>
                                                </td>
                                                <td class="answer-correct"><input type="radio" name="qns_ans_1"
                                                        value="False"
                                                        {{ ($qns_ans[0]['name'] == 'False') ? 'checked=checked' : ''}}>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Multi Choice -->
                                    <table class="list-question-answers" id="qns_type2">
                                        <thead>
                                            <tr>
                                                <th class="order">#</th>
                                                <th class="answer-text">ข้อความคำตอบ <small class="hint"><em>ว้นว่างไว้หากคุณต้องการลบตัวเลือก</em></small></th>
                                                <th class="answer-correct">ถูกต้อง?</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ui-sortable">
                                            @foreach ($qns_opts as $row)
                                            <tr class="answer-option">
                                                <td class="order">{{ $loop->index + 1 }}.</td>
                                                <td>
                                                    <input type}}="text" value="{{ $row['name'] }}"
                                                        name="qns_opt_2_{{ $loop->index + 1 }}" class="answer_text">
                                                </td>
                                                @php
                                                $an = false;
                                                @endphp
                                                @foreach ($qns_ans as $col)
                                                @if ($col['name'] == $row['name'])
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="{{ $loop->index + 1 }}" checked='checked'>
                                                </td>
                                                @php
                                                $an = true;
                                                break;
                                                @endphp
                                                @endif
                                                @endforeach

                                                @if ($an == false)
                                                <td class="answer-correct"><input type="checkbox" name="qns_ans_2[]"
                                                        value="{{ $loop->index + 1 }}">
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="list-question-answers" id="qns_type3">
                                        <thead>
                                            <tr>
                                                <th class="order">#</th>
                                                <th class="answer-text">ข้อความคำตอบ <small class="hint"><em>ว้นว่างไว้หากคุณต้องการลบตัวเลือก</em></small></th>
                                                                                                <th class="answer-correct">ถูกต้อง?</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ui-sortable">
                                            @foreach ($qns_opts as $row)
                                            <tr class="answer-option">
                                                <td class="order">{{ $loop->index + 1 }}</td>
                                                <td>
                                                    <input type="text" name="qns_opt_3_{{ $loop->index + 1 }}"
                                                        value="{{ $row['name'] }}" class="answer_text">
                                                </td>
                                                @php
                                                $an = false;
                                                @endphp
                                                @foreach ($qns_ans as $col)
                                                @if ($col['name'] == $row['name'])
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="{{ $loop->index + 1 }} " checked='checked'>
                                                </td>
                                                @php
                                                $an = true;
                                                break;
                                                @endphp
                                                @endif
                                                @endforeach

                                                @if ($an == false)
                                                <td class="answer-correct"><input type="radio" name="qns_ans_3"
                                                        value="{{ $loop->index + 1 }}">
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
</script>
@endsection