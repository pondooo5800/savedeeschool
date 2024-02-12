@extends('layouts.master')

@section('title')
    Course | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <h4 class="card-title"><i class="material-icons card-icon">star_half</i> View Rating</h4>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-darken" href="{{ route('rating.index') }}"> กลับ</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Submitted By:</strong>
                                <br />
                                {{ $rating->student->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Submitted On:</strong>
                                <br />
                                {{ date('d M Y H:i A', strtotime($rating->created_at)) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quiz:</strong>
                                <br />
                                {{  $rating->quiz->title }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Rating:</strong>
                                <br />
                                @php $r = $rating->rating; @endphp
                                @foreach (range(1, 5) as $i)
                                    <span class="fa-stack" style="width:1em">
                                        @if ($r > 0)
                                            @if ($r > 0.5)
                                                <i class="fa fa-star rated" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-star-half-o rated" aria-hidden="true"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        @php $r--; @endphp
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Comment:</strong>
                                <br />
                                {{ $rating->comment }}
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

    </script>
@endsection
