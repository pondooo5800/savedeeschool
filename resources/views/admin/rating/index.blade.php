@extends('layouts.master')

@section('title')
Rating | {{ config('settings.name', 'Laravel') }}
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
            <form id="rating_delete_modal" method="POST">
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
                    <h2 class="card-title"><i class="material-icons card-icon">star_half</i> All Ratings</h2>
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
                    <table class="table" id="ratingtable">
                        <thead class="text-darken">
                            <th style="width:4%">No.</th>
                            <th>
                                Quiz
                            </th>
                            <th>
                                Comment
                            </th>
                            <th>
                                Rating
                            </th>
                            <th class="text-right not-export-col" style="width: 7%;">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($ratings as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $row->quiz->title }}
                                </td>
                                <td>
                                    {{ $row->comment }}
                                </td>
                                <td>
                                    @php $rating = $row->rating; @endphp
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
                                </td>
                                <td class="text-right">

                                    <a class="btn-icon btn-darken" href="{{ route('rating.show', $row->id) }}"
                                        title="show">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>

                                    {{-- <a class="btn-icon btn-darken" href="{{ route('course.edit', $row->id) }}"
                                    title="Edit">
                                    <i class="material-icons">edit</i>
                                    </a> --}}
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
    $('#ratingtable').DataTable({
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
                    $('#ratingtable').find('tbody tr:first-child td').each(function() {
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
        var table = $('#ratingtable').DataTable();
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