@extends('layouts.master')

@section('title')
Course | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<!-- Unenroll Modal -->
<div class="modal fade" id="unenrollmodal" tabindex="-1" aria-labelledby="unenrollmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unenrollmodal">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="unenroll_modal" method="POST">
                @csrf
                <div class="modal-body">
                    Are you sure you want to unenroll the student?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-darken">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Student Modal -->
<div class="modal fade" id="addstudentmodal" tabindex="-1" aria-labelledby="addstudentmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addstudentmodal">Enroll Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_student_modal" method="POST" action="{{ route('course.enroll', $course->id) }}">
                @csrf
                <div class="modal-body">
                    <i>Enroll student to the course</i>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Search Student:</strong>
                                <select style="width:400px" id="studentsearchddl" name="studentList[]"
                                    multiple="multiple"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-darken">Submit</button>
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
                    <h4 class="card-title">{{ $course->title }}</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('course.index') }}"> กลับ</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Course Code:</strong>
                            <br />
                            {{ $course->course_code }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <br />
                            {{ strip_tags($course->description) }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Instructor:</strong>
                            <br />
                            {{ $course->instructor }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Course Fee:</strong>
                            <br />
                            @money($course->price)
                        </div>
                    </div>
                </div>
                <hr style="margin-bottom: 50px;" />
                <div>
                    <div class="pull-left">
                        <h3>Student Enrolled</h3>
                    </div>
                    <div class="pull-right">
                        <div class="pull-left">
                            <nav role="navigation">
                                <ul class="ul-dropdown">
                                    <li class="firstli"><i class="material-icons">settings</i><a href="#">ACTION</a>
                                        <ul>
                                            <li><a href="#">Export CSV</a></li>
                                            <li><a href="#">Export Excel</a></li>
                                            <li><a href="#">Export PDF</a></li>
                                            <li><a href="#">Print</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <a class="btn btn-darken" href="#" id="enrollbtn"> + Enroll Student</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="studentquiztable">
                        <thead class="text-darken">
                            <th style="width:5%">No.</th>
                            <th>
                                Student Number
                            </th>
                            <th>
                                Student Name
                            </th>
                            <th>
                                Enrolled On
                            </th>
                            <th class="text-right  not-export-col">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($course->students()->get() as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $row->student_number }}
                                </td>
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($row->pivot->created_at)) }}
                                </td>
                                <td class="text-right">
                                    <a class="unenrollbtn btn-icon btn-darken"
                                        data-action="{{ route('course.unenroll', ['id' => $row->id, 'cid' => $course->id]) }}"
                                        href="#" title="Unenroll">
                                        Unenroll
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
$('#enrollbtn').on('click', function() {
    $('#addstudentmodal').modal('show');
});

$('#studentquiztable').on('click', '.unenrollbtn', function() {
    $action = $(this).attr("data-action");
    $('#unenroll_modal').attr('action', $action);
    $('#unenrollmodal').modal('show');
});

$('#studentsearchddl').select2({
    placeholder: 'Keyword...',
    multiple: true,
    ajax: {
        type: 'GET',
        url: "{{url('/search')}}",
        dataType: 'json',
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.name + ' (' + item.student_number + ')',
                        id: item.id
                    }
                })
            };
        }
    }
});

$('#studentquiztable').DataTable({
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
                $('#studentquiztable').find('tbody tr:first-child td').each(function() {
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

$("ul li ul li").click(function() {
    var i = $(this).index() + 1
    var table = $('#studentquiztable').DataTable();
    if (i == 1) {
        table.button('.buttons-csv').trigger();
    } else if (i == 2) {
        table.button('.buttons-excel').trigger();
    } else if (i == 3) {
        table.button('.buttons-pdf').trigger();
    } else if (i == 4) {
        table.button('.buttons-print').trigger();
    } else {
        alert("From else part");
    }
});
</script>
@endsection