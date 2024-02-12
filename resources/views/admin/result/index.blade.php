@extends('layouts.master')

@section('title')
Exam Result | {{ config('settings.name', 'Laravel') }}
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
            <form id="result_delete_modal" method="POST">
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
                    <h2 class="card-title"><i class="material-icons card-icon">emoji_events</i> Exam Result</h2>
                </div>
                <div class="pull-right">

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
                    <table class="table" id="resulttable">
                        <thead class="text-darken">
                            <th style="width:4%">No.</th>
                            <th>
                                Student
                            </th>
                            <th>
                                Quiz
                            </th>
                            <th>
                                Taken On
                            </th>
                            <th>
                                Time Taken
                            </th>
                            <th>
                                Score
                            </th>
                            <th>
                                Result
                            </th>
                            <th class="text-right" style="width: 7%;">

                            </th>
                        </thead>
                        <tbody>
                            @foreach ($results as $row)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ ($row->student) ? $row->student->name : $row->user_id }}
                                </td>
                                <td>
                                    {{ $row->quiz->title }}
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($row->start_time)) }}
                                </td>
                                <td>
                                    {{ $row->get_timetaken_html() }}
                                </td>
                                <td>
                                    {{ $row->score }}
                                </td>
                                <td>
                                    <span
                                        class="badge badge-{{ ($row->grade =='Passed') ? 'success' : 'danger'}}">{{ $row->grade }}</span>
                                </td>
                                <td class="text-right action_buttons">

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
    $('#resulttable').DataTable({
        columnDefs: [{
            orderable: false,
            targets: -1
        }]
    });

    $('#resulttable').on('click', '.deletebtn', function() {
        $action = $(this).attr("data-action");
        $('#result_delete_modal').attr('action', $action);
        $('#deletemodal').modal('show');
    })
});
</script>
@endsection