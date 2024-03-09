@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">ทำใบขับขี่ใหม่</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">ทำใบขับขี่ใหม่</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="container py-4">
    <div class="row">
        <div class="col-lg-12">
            <article class="blog-details">
                <div class="post-img mb-3 text-center">
                    <img src="{{ asset('licenses/'.$licenses->imageName) }}" alt="" class="img-fluid">
                </div>
                <div class="content">
                   {!! $licenses->content !!}
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
