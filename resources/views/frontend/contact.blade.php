@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">ติดต่อเรา</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">ติดต่อเรา</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Contact Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1 class="mb-3">สมัครเรียนได้ที่</h1>
            <p class="mb-2"><a target="_blank" href="https://page.line.me/yoz5198g?openQrModal=true">โรงเรียนสอนขับรถ
                    เซฟดี ไดรฟ์เวอร์ </a></p>
            <p class="mb-2"><a target="_blank" href="https://page.line.me/yoz5198g?openQrModal=true">Savedee Driver
                    School </a></p>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
        </div>
        <div class="contact-detail position-relative p-5">
            <div class="row g-5 mb-5 justify-content-center">
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                            style="width: 64px; height: 64px;">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-primary">สำนักงานใหญ่</h6>
                            166/7 ถ.มหาจักรพรรดิ ต.หน้าเมือง อ.เมือง จ.ฉะเชิงเทรา 24000 (ก่อนถึงสถานีรถไฟ ฉะเชิงเทรา)
                            <br><br>
                            <h6 class="text-primary">สนามฝึกหัดขับรถ</h6>
                            166/7 ถ.มหาจักรพรรดิ ต.หน้าเมือง อ.เมือง จ.ฉะเชิงเทรา 24000 (ก่อนถึงสถานีรถไฟ ฉะเชิงเทรา)
                            <br><br>
                            <h6 class="text-primary">เลขที่ประจำตัวผู้เสียภาษี</h6>
                            0-2455-59001-69-2
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                            style="width: 64px; height: 64px;">
                            <i class="fa fa-phone text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">เบอร์ติดต่อ</h4>
                            <a class="h5" href="tel:0385119489" target="_blank">038-511948-9</a>
                            <br>
                            <a class="h5" href="tel:0335907013" target="_blank">033-590701-3</a>
                            <br>
                            <a class="h5" href="tel:0879772187" target="_blank">087-9772187</a>
                            <br>
                            <a class="h5" href="tel:0830748548" target="_blank">083-0748548</a>
                            <br>
                            <a class="h5" href="tel:0889307289" target="_blank">088-9307289</a>
                            <br>
                            <a class="h5" href="tel:0918708915" target="_blank">091-8708915</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                            style="width: 64px; height: 64px;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Email Us</h4>
                            <a class="h5" href="mailto:savedee.driver@hotmail.com"
                                target="_blank">savedee.driver@hotmail.com</a>
                        </div>
                    </div>
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                            style="width: 64px; height: 64px;">
                            <i class="fab fa-facebook text-white"></i>
                        </div>
                        <div class="ms-3">
                            <a class="h5" href="https://www.facebook.com/savedeeschool/" target="_blank">Savedee
                                School</a>
                            <br>
                            <a class="h5" href="https://www.facebook.com/Savedeecafe/" target="_blank">Savedee Cafe</a>
                            <br>
                            <a class="h5" href="https://www.facebook.com/savedeebrokers/" target="_blank">Savedee
                                Brokers</a>
                        </div>
                    </div>
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                            style="width: 64px; height: 64px;">
                            <i class="fab fa-line text-white"></i>
                        </div>
                        <div class="ms-3 justify-content-center align-self-center">
                            <a class="h5 " href="https://page.line.me/yoz5198g?openQrModal=true"
                                target="_blank">@Savedee</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="p-5 h-100 rounded contact-map">
                        <iframe class="rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7754.676130176691!2d101.068005!3d13.637188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d3e742cc06325%3A0x4adb639a5154f051!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Liq4Lit4LiZ4LiC4Lix4Lia4Lij4LiWIOC5gOC4i-C4n-C4lOC4tSDguYTguJTguKPguJ_guYzguYDguKfguK3guKPguYw!5e0!3m2!1sth!2sus!4v1702999079784!5m2!1sth!2sus"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
<form action="{{ url('send-line-notification') }}" method="POST" enctype="multipart/form-data"
                class="p-5 rounded contact-form">
                @csrf
                <h5 class="text-primary">สมัครเรียน</h5>
                <div class="mb-4">
                    <input type="text" required name="name" class="form-control border-0 py-2" placeholder="ชื่อ-สกุล">
                </div>
                <div class="mb-4">
                    <input type="text" required name="phone" class="form-control border-0 py-2" placeholder="เบอร์โทร">
                </div>
                <div class="mb-4">
                    <input type="text" required name="line" class="form-control border-0 py-2" placeholder="Line ID">
                </div>
                <div class="mb-4">
                    <select required class="form-select border-0 py-2" aria-label="Default select example" name="course">
                        <option disabled selected value="">เลือกหลักสูตร</option>
                        @foreach($coursAll as $course)
                        <option value="{{ $course->title }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button class="btn bg-primary text-white" type="submit">สมัครเรียน</button>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


@endsection