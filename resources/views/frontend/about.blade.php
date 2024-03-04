@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">รอบรู้เรื่องขับขี่</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">รอบรู้เรื่องขับขี่</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-fluid blog py-3">
    <div class="container py-4">
        <div class="row g-5 justify-content-center">
            @forelse ($blogs as $index => $blog)
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <img src="{{ asset('blogs/'.$blog->imageName) }}" class="img-fluid w-100 rounded-top" alt="">
                    <div class="blog-btn d-flex justify-content-between position-relative px-3"
                        style="margin-top: -75px;">
                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                            <a href="{{ route('blogs.detail', $blog->id) }}" class="btn text-white">เพิ่มเติม</a>
                        </div>
                    </div>
                    <div class="blog-content text-center position-relative px-3" style="margin-top: 30px;">
                        <p class="py-2">{{ \Illuminate\Support\Str::limit($blog->description, 150) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <h5 class="text-danger text-center" style="font-family: 'Kanit'">ไม่พบข้อมูล</h5>
            @endforelse
        </div>
    </div>
</div>
@endsection