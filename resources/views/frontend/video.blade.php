@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<!-- Page Header Start -->
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
<!-- Page Header End -->
<!-- Blog Start -->
<div class="container-fluid blog py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">Video</h3>
        </div>
        <div class="row g-5 justify-content-center mb-5">
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <iframe width="400" height="300" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
