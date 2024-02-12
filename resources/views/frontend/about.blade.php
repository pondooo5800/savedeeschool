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
        <!-- Page Header End -->
                <!-- Blog Start -->
                <div class="container-fluid blog py-5 my-5">
                    <div class="container py-5">
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
                                            <a href="" class="btn text-white ">เพิ่มเติม</a>
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
                                            <a href="" class="btn text-white ">เพิ่มเติม</a>
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
                        <div class="row g-5 justify-content-center">
                            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <img src="https://safedrivedlt.com/wp-content/uploads/2023/11/%E0%B8%95%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%A3%E0%B8%96%E0%B8%9F%E0%B8%A3%E0%B8%B5-%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A21-30-%E0%B8%98.%E0%B8%84.-66-scaled-2006x1003.jpg"
                                        class="img-fluid w-100 rounded-top" alt="">
                                    <div class="blog-btn d-flex justify-content-between position-relative px-3"
                                        style="margin-top: -75px;">
                                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                            <a href="" class="btn text-white">เพิ่มเติม</a>
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
                                            <a href="" class="btn text-white ">เพิ่มเติม</a>
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
                                            <a href="" class="btn text-white ">เพิ่มเติม</a>
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
                        <div class="row g-5 justify-content-center">
                            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <img src="https://safedrivedlt.com/wp-content/uploads/2023/11/%E0%B8%95%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%A3%E0%B8%96%E0%B8%9F%E0%B8%A3%E0%B8%B5-%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A21-30-%E0%B8%98.%E0%B8%84.-66-scaled-2006x1003.jpg"
                                        class="img-fluid w-100 rounded-top" alt="">
                                    <div class="blog-btn d-flex justify-content-between position-relative px-3"
                                        style="margin-top: -75px;">
                                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                            <a href="" class="btn text-white">เพิ่มเติม</a>
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
                                            <a href="" class="btn text-white ">เพิ่มเติม</a>
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
                                            <a href="" class="btn text-white ">เพิ่มเติม</a>
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

                    </div>
                </div>
                <!-- Blog End -->

@endsection
