@extends('layouts.master')

@section('title')
Question | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')

<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="question_delete_modal" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    คุณแน่ใจหรือว่าต้องการลบ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-darken">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="importmodal" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="import_qns_modal" action="{{ route('question.import') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <small><em>Please download the <a
                                            href="{{ asset('public/assets/sample_excel.xlsx') }}">import template</a>.
                                        Do not remove any columns.</em></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quiz:</strong>
                                <select id="quiz_search" name="quiz_id" class="form-control" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Upload File:</strong>
                                <input type="file" name="file" id="file" class="form-control" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-darken">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2 class="card-title"><i class="material-icons card-icon">question_answer</i> คำถามทั้งหมด</h2>
                </div>
                <div class="pull-right">
                    {{-- <a class="btn btn-darken" href="#" title="Import Question" id="import_btn"> <i class="material-icons"
                                >publish</i> Import
                        </a> --}}
                    {{-- <div class="pull-left">
                        <nav role="navigation">
                            <ul class="ul-dropdown">
                                <li class="firstli"><i class="material-icons">settings</i><a href="#">ACTION</a>
                                    <ul>
                                        <li><a href="#">Export CSV</a></li>
                                        <li><a href="#">Export Excel</a></li>
                                        <li><a href="#">Export PDF</a></li>
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Import Question</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                    <a class="btn btn-darken" href="{{ route('question.create') }}" title="Add New Question"> <i
                            class="material-icons">add</i> เพิ่มคำถาม
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table" id="questiontable">
                        <thead class="text-darken">
                            <th style="width:10%">ลำดับ</th>
                            <th style="width: 55%;">
                                คำถาม
                            </th>
                            <th style="width: 20%;">
                                แบบทดสอบ
                            </th>
                            <th style="width: 10%;">
                                ประเภทคำตอบ
                            </th>
                            <th class="text-right not-export-col" style="width: 10%;">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($questions as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ strip_tags($row->question) }}
                                </td>
                                <td>
                                    {{ ($row->quiz->title) ?  $row->quiz->title : '' }}
                                </td>
                                <td>
                                    {{ $row->question_type }}
                                </td>
                                <td class="text-right action_buttons">
                                    <a class="btn-icon btn-darken" href="{{ route('question.edit', $row->id) }}"
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a class="deletebtn btn-icon btn-darken"
                                        data-action="{{ route('question.destroy', $row->id) }}" href="#" title="Delete">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function() {
    // $('#import_btn').on('click', function() {
    //     $('#importmodal').modal('show');
    // });

    $("ul li ul li").click(function() {
        var i = $(this).index() + 1
        var table = $('#questiontable').DataTable();
        if (i == 1) {
            table.button('.buttons-csv').trigger();
        } else if (i == 2) {
            table.button('.buttons-excel').trigger();
        } else if (i == 3) {
            table.button('.buttons-pdf').trigger();
        } else if (i == 4) {
            table.button('.buttons-print').trigger();
        } else if (i == 5) {
            $('#importmodal').modal('show');
        }
    });

    $('#questiontable').DataTable({
        dom: "Blfrtip",
        buttons: [{
                text: 'csv',
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible:not(.not-export-col)'
                }
            },
            {
                text: 'excel',
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible:not(.not-export-col)'
                }
            },
            {
                text: 'pdf',
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible:not(.not-export-col)'
                },
                customize: function(doc) {
                    var colCount = new Array();
                    $('#questiontable').find('tbody tr:first-child td').each(function() {
                        if ($(this).attr('colspan')) {
                            for (var i = 1; i <= $(this).attr('colspan'); i++) {
                                colCount.push('*');
                            }
                        } else {
                            colCount.push('*');
                        }
                    });
                    colCount.pop();
                    doc.content[1].table.widths = colCount;
                }
            },
            {
                text: 'print',
                extend: 'print',
                exportOptions: {
                    columns: ':visible:not(.not-export-col)'
                }
            },

        ],
        columnDefs: [{
            orderable: false,
            targets: -1
        }]
    });

    $('#questiontable').on('click', '.deletebtn', function() {
        $action = $(this).attr("data-action");
        $('#question_delete_modal').attr('action', $action);
        $('#deletemodal').modal('show');
    });
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