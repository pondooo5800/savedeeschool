@extends('layouts.master')

@section('title')
Dashboard | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> แดรชบอร์ด</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                                <div class="card-header card-header-darken card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">school</i>
                                    </div>
                                    <p class="card-category">หลักสูตรทั้งหมด</p>
                                    <h3 class="card-title">{{ $arr_obj->total_course }}
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">library_books</i>
                                </div>
                                <p class="card-category">แบบทดสอบทั้งหมด</p>
                                <h3 class="card-title">{{ $arr_obj->total_quiz }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">question_answer</i>
                                </div>
                                <p class="card-category">คำถามทั้งหมด</p>
                                <h3 class="card-title">{{ $arr_obj->total_qns }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-darken card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-rss"></i>
                                </div>
                                <p class="card-category">บทความทั้งหมด</p>
                                <h3 class="card-title">{{ $arr_obj->total_student}}</h3>
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
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        axisY: {
            gridThickness: 0,
            interval: 1,
            labelFontSize: 12
        },
        axisX: {
            labelFontSize: 12
        },
        data: [{
            type: "column",
            dataPoints: <?php echo $arr_obj->courseJson; ?>
        }]
    });
    chart.render();
});
</script>

@endsection