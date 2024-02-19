@extends('layouts.master')

@section('title')
ตั้งค่า Video | {{ config('settings.name', 'Laravel') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4 class="card-title"><i class="material-icons">settings</i> Video</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-darken" href="{{ route('blog.index') }}"> กลับ</a>
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
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Link Youtube : <span class="text-danger"> * </span></strong>
                                <input type="text" name="link" class="form-control" placeholder="Link Youtube"
                                    value="{{old('link')}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>รายละเอียด (เบื้องต้น) : <span class="text-danger"> * </span></strong>
                                                        <textarea class="form-control" name="description" placeholder="รายละเอียด (เบื้องต้น)">{{old('description')}}</textarea>
                                                    </div>
                                                </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ภาพปก : <span class="text-danger"> * </span></strong>
                                <input type="file" name="image" accept="image/*" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รายละเอียด : <span class="text-danger"> * </span></strong>
                                <textarea id="summernote" class="form-control" name="content"
                                    placeholder="รายละเอียด">{{old('description')}}</textarea>
                            </div>
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