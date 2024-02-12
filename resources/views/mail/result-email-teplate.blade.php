<!DOCTYPE html>
<html>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header quiz-progress">
                    <div class="progress-items">
                        <div class="progress-item">
                            <h3>{{ $data->quiz->title }}</h3>
                        </div>
                    </div>
                    <br />
                    <div>
                        <table>
                            <tr>
                                <th> Student Name: </th>
                                <td> &nbsp;{{ $data->student->name }}</td>
                            </tr>
                            <tr>
                                <th> Student Number: </th>
                                <td> &nbsp;{{ $data->student->student_number }}</td>
                            </tr>
                            <tr>
                                <th> Email: </th>
                                <td> &nbsp;{{ $data->student->email }}</td>
                            </tr>
                            <tr>
                                <th> Completed On: </th>
                                <td> &nbsp;{{ date('d M Y H:i A', strtotime($data->end_time)) }}
                                </td>
                            </tr>
                            <tr>
                                <th> Mark Obtained: </th>
                                <td> &nbsp;{{ $data->total_correct }} / {{ $data->quiz->number_qns }}
                                </td>
                            </tr>
                            <tr>
                                <th> Score: </th>
                                <td> &nbsp;{{ $data->score }}%
                                </td>
                            </tr>
                            <tr>
                                <th> Time Taken: </th>
                                <td> &nbsp;{{ $data->get_timetaken_html() }}
                                </td>
                            </tr>
                            <tr>
                                <th> Grade: </th>
                                <td> &nbsp;{{ $data->grade }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr />

                    <p>Sincerely, </p>
                    <p>OEMS Support </p>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
