@extends('layouts.master')

@section('title')
Student | {{ config('settings.name', 'Laravel') }}
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
            <form id="studentquiz_delete_modal" method="POST">
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
                    Are you sure you want to unenroll the course?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-darken">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Course Modal -->
<div class="modal fade" id="addcoursemodal" tabindex="-1" aria-labelledby="addcoursemodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addcoursemodal">Enroll Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_course_modal" method="POST" action="{{ route('student.enroll', $student->id) }}">
                @csrf
                <div class="modal-body">
                    <i>Course Enrollment</i>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Search Course:</strong>
                                <select style="width:400px" id="coursesearchddl" name="courseList[]"
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
                    <h2 class="card-title"><i class="material-icons card-icon">local_library</i> Students </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('student.index') }}"> กลับ</a>
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
                <div>
                    <table width="100%">
                        <tr>
                            <th width="15%"> Student Name: </th>
                            <td> &nbsp;{{ $student->name }}</td>
                            <th width="15%"> Student Number: </th>
                            <td> &nbsp;{{ $student->student_number }}</td>
                        </tr>
                        <tr>
                            <th width="15%"> Gender: </th>
                            <td> &nbsp;{{ $student->gender }}</td>
                            <th width="15%"> Email: </th>
                            <td> &nbsp;{{ $student->email }}</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th width="15%"> DOB: </th>
                            <td> &nbsp;{{ $student->dob }}</td>
                            <th width="15%"> Contact: </th>
                            <td> &nbsp;{{ $student->contact }}</td>
                        </tr>
                    </table>
                </div>
                <hr style="margin-bottom: 50px;" />
                <div>
                    <div class="pull-left">
                        <h3>Course Enrolled</h3>
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
                        <a class="btn btn-darken" href="#" id="enrollbtn"> + Enroll Course</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="studentcoursetable">
                        <thead class="text-darken">
                            <th style="width:5%">No.</th>
                            <th>
                                Course Code
                            </th>
                            <th>
                                Course Name
                            </th>
                            <th>
                                Enrolled On
                            </th>
                            <th class="text-right not-export-col">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($student->courses()->get() as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $row->course_code }}
                                </td>
                                <td>
                                    {{ $row->title }}
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($row->pivot->created_at)) }}
                                </td>
                                <td class="text-right">
                                    <a class="unenrollbtn btn-icon btn-darken"
                                        data-action="{{ route('student.unenroll', ['id' => $row->id, 'sid' => $student->id]) }}"
                                        href="#" title="Unenroll">
                                        Unenroll
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <hr style="margin-bottom: 50px;" />
                <h3>Student Assessment Results</h3>
                <div class="table-responsive">
                    <table class="table" id="studentquiztable">
                        <thead class="text-darken">
                            <th style="width:5%">No.</th>
                            <th>
                                Quiz
                            </th>
                            <th>
                                Taken On
                            </th>
                            <th>
                                Score
                            </th>
                            <th>
                                Grade
                            </th>
                            <th class="text-right">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($student_result as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $row->quiz->title }}
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($row->start_time)) }}
                                </td>
                                <td>
                                    {{ $row->score }}
                                </td>
                                <td>
                                    <span class="badge badge-{{ ($row->grade =='Passed') ? 'success' : 'danger'}}">{{ $row->grade }}</span>
                                </td>
                                <td class="text-right">
                                    <a class="btn-icon btn-darken" href="{{ route('result.show', $row->id) }}"
                                        title="Review">
                                        <i class="material-icons">rule</i>
                                    </a>

                                    <a class="deletebtn btn-icon btn-darken"
                                        data-action="{{ route('result.destroy', $row->id) }}" href="#" title="Delete">
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
    $('#studentquiztable').DataTable({
        columnDefs: [{
            orderable: false,
            targets: -1
        }]
    });

    $('#studentquiztable').on('click', '.deletebtn', function() {
        $action = $(this).attr("data-action");
        $('#studentquiz_delete_modal').attr('action', $action);
        $('#deletemodal').modal('show');
    })

    $('#enrollbtn').on('click', function() {
        $('#addcoursemodal').modal('show');
    });

    $('#studentcoursetable').on('click', '.unenrollbtn', function() {
        $action = $(this).attr("data-action");
        $('#unenroll_modal').attr('action', $action);
        $('#unenrollmodal').modal('show');
    });

    $('#coursesearchddl').select2({
        placeholder: 'Keyword...',
        multiple: true,
        ajax: {
            type: 'GET',
            url: "{{url('/course_search')}}",
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.title + ' (' + item.course_code + ')',
                            id: item.id
                        }
                    })
                };
            }
        }
    });

    $('#studentcoursetable').DataTable({
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
                    $('#studentcoursetable').find('tbody tr:first-child td').each(function() {
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
            targets: [0, -1]
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
});
</script>
@endsection