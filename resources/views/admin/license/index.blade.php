@extends('layouts.master')

@section('title')
ตั้งค่า ทำใบขับขี่ | {{ config('settings.name', 'Laravel') }}
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
            <form id="license_delete_modal" method="POST">
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
                    <h2 class="card-title"><i class="material-icons">settings</i> การทำใบขับขี่และเตรียมทำข้อสอบ</h2>
                </div>
                {{-- <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('license.create') }}" title="เพิ่ม ทำใบขับขี่"> <i
                            class="material-icons">add</i> เพิ่ม ทำใบขับขี่
                    </a>
                </div> --}}
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
                    <table class="table" id="coursetable">
                        <thead class="text-darken">
                            <th style="width:10%">ลำดับ</th>
                            <th>
                                ชื่อบทความ
                            </th>
                            <th>
                                ภาพปก
                            </th>
                            <th class="text-right not-export-col" style="width: 10%;">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($licenses ?? '' as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $row->title }}
                                </td>
                                <td>
                                    <div class="qns-img text-center">
                                        <img src="{{ asset('licenses/'.$row->imageName) }}" style="width: 200px;">
                                    </div>
                                </td>
                                <td class="text-right ">
                                    <a class="btn-icon btn-darken" href="{{ route('license.edit', $row->id) }}"
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    {{-- <a class="deletebtn btn-icon btn-darken"
                                        data-action="{{ route('license.destroy', $row->id) }}" href="#" title="Delete">
                                        <i class="material-icons">delete</i>
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
    $('#coursetable').DataTable({
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
                    $('#coursetable').find('tbody tr:first-child td').each(function() {
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

    $('#coursetable').on('click', '.deletebtn', function() {
        $action = $(this).attr("data-action");
        $('#license_delete_modal').attr('action', $action);
        $('#deletemodal').modal('show');
    });

    $("ul li ul li").click(function() {
        var i = $(this).index() + 1
        var table = $('#coursetable').DataTable();
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