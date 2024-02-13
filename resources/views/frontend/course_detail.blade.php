@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-5 text-primary mb-4 animated slideInDown">
            {{ $course->title}}
        </h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">{{ $course->title}}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <article class="blog-details">
                <div class="post-img mb-4 text-center">
                    <img src="{{ asset('courses/'.$course->imageName) }}" alt="" class="img-fluid"
                        style="height: 450px">
                </div>
                <h3 class="title">{{ $course->title}}</h3>
                <div class="content">
                    <p>
                        {!! $course->content !!}
                    </p>
                </div>
            </article>
        </div>
        <div class="col-lg-4">
           <iframe class="rounded my-4"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7754.676130176691!2d101.068005!3d13.637188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d3e742cc06325%3A0x4adb639a5154f051!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Liq4Lit4LiZ4LiC4Lix4Lia4Lij4LiWIOC5gOC4i-C4n-C4lOC4tSDguYTguJTguKPguJ_guYzguYDguKfguK3guKPguYw!5e0!3m2!1sth!2sus!4v1702999079784!5m2!1sth!2sus"
                style="border:0;height:450px;width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="p-5 rounded contact-form">
                                        <h5 class="text-primary">สมัครเรียน</h5>
                                        <div class="mb-4">
                                            <input type="text" class="form-control border-0 py-2" placeholder="ชื่อ-สกุล">
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" class="form-control border-0 py-2" placeholder="เบอร์โทร">
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" class="form-control border-0 py-2" placeholder="Line ID">
                                        </div>
                                        <div class="mb-4">
                                            <select class="form-select border-0 py-2" aria-label="Default select example" name="course_id">
                                                <option selected>หลักสูตร</option>
                                                @foreach($coursAll as $course)
                                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn bg-primary text-white" type="button">สมัครเรียน</button>
                                        </div>
                                    </div>
        </div>
    </div>
</div>
@endsection