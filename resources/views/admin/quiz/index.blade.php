@extends('layouts.master')

@section('title')
Quizzes | {{ config('settings.name', 'Laravel') }}
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
            <form id="quiz_delete_modal" method="POST">
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2 class="card-title"><i class="material-icons card-icon">library_books</i> แบบทดสอบทั้งหมด</h2>
                </div>
                <div class="pull-right">
                    {{-- <div class="pull-left">
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
                    </div> --}}
                    <a class="btn btn-darken" href="{{ route('quiz.create') }}" title="Add New Quiz"> <i
                            class="material-icons">add</i>เพิ่ม แบบทดสอบ
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
                    <table class="table" id="quiztable">
                        <thead class="text-darken">
                            <th style="width:10%">ลำดับ</th>
                            <th>
                                หัวข้อ
                            </th>
                            <th>
                                หลักสูตร
                            </th>
                            <th>
                                เวลา
                            </th>

                            <th>
                                สถานะ
                            </th>
                            <th class="text-right not-export-col">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($quiz as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $row->title }}
                                </td>
                                <td>
                                    {{ $row->course->title }}
                                </td>
                                <td>
                                    {{ $row->get_duration_html() }}
                                </td>
                                {{-- <td>
                                    {{ $row->available_on == '' ? 'All Time' : date('Y-m-d H:i', strtotime($row->available_on)) }}
                                </td> --}}
                                {{-- <td>
                                    @php $rating = $row->getAverageRatings(); @endphp
                                    @foreach (range(1, 5) as $i)
                                    <span class="fa-stack" style="width:1em">
                                        @if ($rating > 0)
                                        @if ($rating > 0.5)
                                        <i class="fa fa-star rated" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-star-half-o rated" aria-hidden="true"></i>
                                        @endif
                                        @else
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @php $rating--; @endphp
                                    </span>
                                    @endforeach
                                </td> --}}
                                <td>
                                    <span
                                        class="badge badge-{{ $row->status == 'Active' ? 'success' : ($row->status == 'Draft' ? 'info' : 'warning') }}">{{ $row->status }}</span>
                                </td>
                                <td class="text-right action_buttons">

                                    <a class="btn-icon btn-darken" href="question/create/{{ $row->id }}"
                                        title="Add Question">
                                        <i class="material-icons">question_answer</i>
                                    </a>

                                    {{-- <a class="btn-icon btn-darken" href="{{ route('quiz.show', $row->id) }}"
                                        title="View Quiz Report">
                                        <i class="material-icons">insert_chart</i>
                                    </a> --}}

                                    <a class="btn-icon btn-darken" href="{{ route('quiz.edit', $row->id) }}"
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a class="deletebtn btn-icon btn-darken"
                                        data-action="{{ route('quiz.destroy', $row->id) }}" href="#" title="Delete">
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
    $('#quiztable').DataTable({
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
                    $('#quiztable').find('tbody tr:first-child td').each(function() {
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

    $('#quiztable').on('click', '.deletebtn', function() {
        $action = $(this).attr("data-action");
        $('#quiz_delete_modal').attr('action', $action);
        $('#deletemodal').modal('show');
    });

    $("ul li ul li").click(function() {
        var i = $(this).index() + 1
        var table = $('#quiztable').DataTable();
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