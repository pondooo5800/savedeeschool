@extends('layouts.master')

@section('title')
แก้ไข หลักสูตร | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons card-icon">school</i> แก้ไข หลักสูตร</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('courseopen.index') }}"> กลับ</a>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <strong>พบปัญหา!</strong> เกิดปัญหาบางอย่างกับข้อมูลที่คุณป้อน<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('courseopen.update', $courseopen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ชื่อภาพ:</strong>
                                <input type="text" value="{{ $courseopen->title }}" name="title" class="form-control"
                                    placeholder="title">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รายละเอียด:</strong>
                                <textarea class="form-control" name="description"
                                    placeholder="รายละเอียด">{{old('description')}}{{ $courseopen->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ภาพปก:</strong>

                                <input type="file" name="image" accept="image/*" class="form-control">
                            </div>
                            <img src="{{ asset('courseopens/'.$courseopen->image_name) }}" class="img-fluid img-thumbnail" style="width: 400px;">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-darken">ตกลง</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>

</script>
@endsection