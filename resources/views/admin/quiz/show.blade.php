@extends('layouts.master')

@section('title')
Quiz Report | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h2 class="card-title"> {{ $quiz->title }} </h2>
                    <br />
                    <p>
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        {{ $quiz->course->title }} | <i class="fa fa-file-text" aria-hidden="true"></i>
                        {{ $quiz->questions->count() }} questions | <i class="fa fa-clock-o" aria-hidden="true"></i>
                        {{ $quiz->duration }} {{ $quiz->duration_lb }}
                    </p>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('quiz.index') }}"> กลับ</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Total Passed</p>
                                <h3 class="card-title">{{ $arr_obj->total_passed }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Total Failed</p>
                                <h3 class="card-title">{{ $arr_obj->total_failed }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-level-up" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Highest Mark</p>
                                <h3 class="card-title">{{ $arr_obj->highest }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-level-down" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Lowest Mark</p>
                                <h3 class="card-title">{{ $arr_obj->lowest }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-darken">
                                <h4 class="card-title card-title-darken">Recent Attempt</h4>
                                <p class="card-category">5 most recent attempt.</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Student</th>
                                        <th>Grade</th>
                                        <th>Score</th>
                                        <th>Date Taken</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_quiz->slice(0, 5) as $row)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $row->student ? $row->student->name : $row->user_id }}
                                            </td>
                                            <td>
                                                {{ $row->grade }}
                                            </td>
                                            <td>
                                                {{ $row->score }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($row->end_time)) }}
                                            </td>
                                            <td class="text-right action_buttons">
                                                <a class="btn-icon btn-darken"
                                                    href="{{ route('result.show', $row->id) }}" title="Review">
                                                    <i class="material-icons">rule</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-darken">
                                <h4 class="card-title card-title-darken">Recent Rating</h4>
                                <p class="card-category">5 most recent rating.</p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Comment</th>
                                        <th>Rate</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($quiz->ratings->slice(0, 5) as $row)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $row->comment }}
                                                <br />
                                                <small><em> {{ $row->student->name }} </em></small>
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-darken">
                                <h4 class="card-title card-title-darken">Score</h4>
                                <p class="card-category">Number of student by scoring group.</p>
                            </div>
                            <div class="card-body table-responsive">
                                <div id="pieChartContainer" style="height: 450px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-darken">
                                <h4 class="card-title card-title-darken">Rating</h4>
                                <p class="card-category">Number of review by rating</p>
                            </div>
                            <div class="card-body table-responsive">
                                <div id="chartContainer" style="height: 450px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function() {
    $('#quizresulttable').DataTable({
        columnDefs: [{
            orderable: false,
            targets: -1
        }]
    });

    CanvasJS.addColorSet("rateShades",
        [
            "#dc3545",
            "#dc3545",
            "#ffc107",
            "#28a745",
            "#28a745"
        ]);

    var rate = <?php echo $value; ?>;
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        colorSet: "rateShades",
        axisY: {
            gridThickness: 0,
            interval: 1
        },
        data: [{
            type: "column",
            dataPoints: [{
                    y: rate[0],
                    label: "Bad"
                },
                {
                    y: rate[1],
                    label: "Not Good"
                },
                {
                    y: rate[2],
                    label: "Average"
                },
                {
                    y: rate[3],
                    label: "Great"
                },
                {
                    y: rate[4],
                    label: "Excellent"
                }
            ]
        }]
    });
    chart.render();

    var output = <?php echo $output; ?>;
    var piechart = new CanvasJS.Chart("pieChartContainer", {
        animationEnabled: true,
        data: [{
            type: "pie",
            startAngle: 240,
            indexLabel: "Score {label} : {y}",
            dataPoints: [{
                    y: output[0],
                    label: "0 - 19",
                    color: "#ff3924"
                },
                {
                    y: output[1],
                    label: "20 - 39",
                    color: "#ff9600"
                },
                {
                    y: output[2],
                    label: "40 - 59",
                    color: "#ffe500"
                },
                {
                    y: output[3],
                    label: "60 - 79",
                    color: "#cdf03a"
                },
                {
                    y: output[4],
                    label: "80 - 100",
                    color: "#2ce574"
                }
            ]
        }]
    });
    piechart.render();
});
</script>
@endsection