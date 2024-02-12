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

                        {{-- <div class="form-group row">
                            <label for="student_number"
                                class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>
                            <div class="col-md-6">
                                <input id="student_number" type="text"
                                    class="form-control @error('student_number') is-invalid @enderror"
                                    name="student_number" value="{{ old('student_number') }}" autofocus>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_id" class="col-md-4 col-form-label text-md-right">{{ __('Exam') }}</label>
                            <div class="col-md-6">
                                <select id="quiz_search" name="quiz_id" class="form-control" value="" @error('quiz_id')
                                    is-invalid @enderror">
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="access_code"
                                class="col-md-4 col-form-label text-md-right">{{ __('Access Code') }}</label>

                            <div class="col-md-6">
                                <input id="access_code" type="password"
                                    class="form-control @error('access_code') is-invalid @enderror" name="access_code"
                                    autocomplete="current-password">
                            </div>
                        </div> --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-darken">
                                    เริ่มทำข้อสอบ
                                    {{-- {{ __('Login') }} --}}
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
$('#quiz_search').select2({
    placeholder: '-- เลือกหลักสูตร --',
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