@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header login_title">
                    <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
                        <i class="material-icons">cast_for_education</i>
                        SAVEDEE
                    </a>
                    <span class="login_title_font">{{ __('Student Login') }}
                    </span>
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
                    <form method="POST" action="{{ route('startquiz') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">ชื่อ - นามสกุล <span style="color:red"> *</span></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์<span style="color:red"> *</span></label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" autofocus required onKeyUp="validateInput(this.value);">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_id"
                                class="col-md-4 col-form-label text-md-right">ชุดข้อสอบ<span style="color:red"> *</span></label>
                            <div class="col-md-6">
                                <select style="width: 100%" id="quiz_search" name="quiz_id" class="form-control" value="" @error('quiz_id') is-invalid @enderror">
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-darken">
                                    เริ่มทำข้อสอบ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    function validateInput(value) {
    if (isNaN(value)) {
        Swal.fire({
            icon: 'error',
            title: 'กรุณากรอกตัวเลขเบอร์โทรศัพท์',
            text: '',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });

        // Clear the input field
        document.getElementById('phone').value = '';
    }
}
</script>
<script>
$('#quiz_search').select2({
    placeholder: '-- เลือกข้อสอบ --',
    ajax: {
        url: '/quiz_search_active',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.title,
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
});
</script>

@endsection