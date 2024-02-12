@extends('layouts.frontend')
@section('styles')
<style>
    .custom-height {
        height: 400px;
        width: 100%;
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
                    <img src="{{ asset('slides/'.$row->image_name) }}" class="d-block w-100 img-fluid custom-height" alt="Slide {{ $index + 1 }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>

<div class="container-fluid services py-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">หลักสูตรที่เปิดสอน</h3>
        </div>
        <div class="row g-5 services-inner">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                                <img src="{{ asset('assets/img/course/Icon-10_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-11_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-1_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-2_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-3_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-4_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-5_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-6_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-7_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-8_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-9_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="services-item bg-light">
                    <div class="p-4 text-center services-content">
                        <div class="services-content-icon">
                            <img src="{{ asset('assets/img/course/Icon-10_0.jpg')}}" class="img-fluid" alt="First slide">
                            <h4 class="m-3 font-text">หลักสูตรรถจักรยานยนต์ 15 ชม.</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                                Aliquam dolor eget urna ultricies tincidunt.</p>
                            <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-fluid blog py-5 mb-3">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h3 class="text-primary" style="font-family: 'Kanit'">รอบรู้เรื่องขับขี่</h3>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <img src="https://safedrivedlt.com/wp-content/uploads/2023/11/%E0%B8%95%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%A3%E0%B8%96%E0%B8%9F%E0%B8%A3%E0%B8%B5-%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A21-30-%E0%B8%98.%E0%B8%84.-66-scaled-2006x1003.jpg"
                        class="img-fluid w-100 rounded-top" alt="">
                    <div class="blog-btn d-flex justify-content-between position-relative px-3"
                        style="margin-top: -75px;">
                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                            <a href="{{url('/about/1')}}" class="btn text-white">เพิ่มเติม</a>
                        </div>
                    </div>
                    <div class="blog-content text-center position-relative px-3" style="margin-top: 30px;">
                        <h5 class="">By Daniel Martin</h5>
                        <span class="text-secondary">24 March 2023</span>
                        <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam
                            dolor eget urna ultricies tincidunt libero sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".5s">
                <div class="blog-item position-relative bg-light rounded">
                    <img src="https://safedrivedlt.com/wp-content/uploads/2023/11/%E0%B8%A3%E0%B8%B9%E0%B9%89%E0%B8%97%E0%B8%B1%E0%B8%99%E0%B8%9B%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B8%A0%E0%B8%B1%E0%B8%A2-%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B9%83%E0%B8%88%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%A5%E0%B8%AD%E0%B8%A2%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%97%E0%B8%87-960x480.jpg"
                        class="img-fluid w-100 rounded-top" alt="">
                    <div class="blog-btn d-flex justify-content-between position-relative px-3"
                        style="margin-top: -75px;">
                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                            <a href="{{url('/about/1')}}" class="btn text-white ">เพิ่มเติม</a>
                        </div>
                    </div>
                    <div class="blog-content text-center position-relative px-3" style="margin-top: 30px;">
                        <h5 class="">By Daniel Martin</h5>
                        <span class="text-secondary">23 April 2023</span>
                        <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam
                            dolor eget urna ultricies tincidunt libero sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".7s">
                <div class="blog-item position-relative bg-light rounded">
                    <img src="https://safedrivedlt.com/wp-content/uploads/2023/11/%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%A3%E0%B8%96%E0%B8%88%E0%B8%B1%E0%B8%81%E0%B8%A3%E0%B8%A2%E0%B8%B2%E0%B8%99%E0%B8%A2%E0%B8%99%E0%B8%95%E0%B9%8C%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2-%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%A1%E0%B8%AD%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B9%84%E0%B8%8B%E0%B8%84%E0%B9%8C%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2-%E0%B9%84%E0%B8%A1%E0%B9%88%E0%B9%80%E0%B8%AA%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%87-1152x576.jpg"
                        class="img-fluid w-100 rounded-top" alt="">
                    <div class="blog-btn d-flex justify-content-between position-relative px-3"
                        style="margin-top: -75px;">
                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                            <a href="{{url('/about/1')}}" class="btn text-white ">เพิ่มเติม</a>
                        </div>
                    </div>
                    <div class="blog-content text-center position-relative px-3" style="margin-top: 30px;">
                        <h5 class="">By Daniel Martin</h5>
                        <span class="text-secondary">30 jan 2023</span>
                        <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam
                            dolor eget urna ultricies tincidunt libero sit amet</p>
                    </div>
                </div>
            </div>
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
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h3 class="text-primary" style="font-family: 'Kanit'">Video</h3>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".7s">
                    <div class="testimonial-item border p-4">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <iframe width="380" height="279" src="https://www.youtube.com/embed/XUmj1wleLxg?si=LYzygl85ut4FibFs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item border p-4">
                        <div class=" d-flex align-items-center">
                            <div class="">
                                <iframe width="380" height="279" src="https://www.youtube.com/embed/RkrDjn-wOyU?si=k_yVEuyzrx-jIscb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item border p-4">
                        <div class=" d-flex align-items-center">
                            <div class="">
                                <iframe width="380" height="279" src="https://www.youtube.com/embed/dP4Ge0KZ1UU?si=K8_RVJI6gvVlT56f" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item border p-4">
                        <div class=" d-flex align-items-center">
                            <div class="">
                                <iframe width="380" height="279" src="https://www.youtube.com/embed/hw_UnC5hqZw?si=uNJGPR8RF-dskCPl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center mx-auto wow fadeIn" data-wow-delay=".9s">
                    <a href="{{url('/video')}}">
                        <h5 class="text-primary" style="font-family: 'Kanit'">ดูทั้งหมด</h5>
                    </a>
                </div>
            </div>
        </div>
 --}}


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
