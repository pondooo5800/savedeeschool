@extends('layouts.frontend')
@section('styles')
<style>
    .custom-height {
        height: 450px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
<div class="container my-3">
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slides as $index => $row)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('slides/'.$row->image_name) }}" class="d-block w-100 img-fluid custom-height"
                    alt="Slide {{ $index + 1 }}">
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-fluid services py-3">
    <div class="container">
        <div class="text-center mx-auto pb-3 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">หลักสูตรที่เปิดสอน</h3>
        </div>
        <div class="row g-5 services-inner">
            @forelse ($courses as $index => $course)
           <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".2s">
            <div class="services-item bg-light">
                <div class="p-4 text-center services-content">
                    <div class="services-content-icon">
                        <img src="{{ asset('courses/'.$course->imageName) }}" class="img-fluid img-responsive" alt="First slide"
                            width="352" height="268">
                        <h4 class="m-3 font-text">{{$course->title}}</h4>
                        <p class="mb-4 text-start">{{ \Illuminate\Support\Str::limit($course->description, 150) }}</p>
                        <a href="{{ route('courses.detail', $course->id) }}"
                            class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
            @empty
            <h5 class="text-danger text-center" style="font-family: 'Kanit'">ไม่พบข้อมูล</h5>
            @endforelse
        </div>
    </div>
</div>

<div class="container-fluid blog py-3">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">รอบรู้เรื่องขับขี่</h3>
        </div>
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
        <br>
        <div class="text-center mx-auto wow fadeIn" data-wow-delay=".9s">
            <a href="{{url('/about')}}">
                <h5 class="text-primary" style="font-family: 'Kanit'">ดูทั้งหมด</h5>
            </a>
        </div>

    </div>
</div>
<div class="container-fluid testimonial py-0 mb-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay=".2s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">Video</h3>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".6s">
            @forelse ($videos as $index => $video)
            <div class="testimonial-item border p-4">
                <div class="d-flex align-items-center">
                    <div class="">
                        <iframe width="380" height="279"
                            src="{{ $video->link}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            @empty
            <h5 class="text-danger text-center" style="font-family: 'Kanit'">ไม่พบข้อมูล</h5>
            @endforelse
        </div>
        <br>
        <div class="text-center mx-auto wow fadeIn" data-wow-delay=".6s">
            <a href="{{url('all-video')}}">
                <h5 class="text-primary" style="font-family: 'Kanit'">ดูทั้งหมด</h5>
            </a>
        </div>
    </div>
</div>



@section('scripts')
<script>
    $(document).ready(function () {
        setInterval(function () {
            $('.carousel').carousel('next');
        }, 5000);
    });
</script>
@endsection
@endsection