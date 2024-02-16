@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">Video</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Video</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-fluid blog py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">Video</h3>
        </div>
        <div class="row g-5 justify-content-center mb-5">
            @forelse ($videos as $index => $video)
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="{{ $video->link}}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            @empty
            <h5 class="text-danger text-center" style="font-family: 'Kanit'">ไม่พบข้อมูล</h5>
            @endforelse
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
