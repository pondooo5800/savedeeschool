@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<div class="container py-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-success text-center">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <article class="blog-details">
                <div class="post-img mb-4 text-center">
                    <img src="{{ asset('courses/'.$course->imageName) }}" alt="" class="img-fluid">
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
           <iframe class="rounded"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7754.676130176691!2d101.068005!3d13.637188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d3e742cc06325%3A0x4adb639a5154f051!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Liq4Lit4LiZ4LiC4Lix4Lia4Lij4LiWIOC5gOC4i-C4n-C4lOC4tSDguYTguJTguKPguJ_guYzguYDguKfguK3guKPguYw!5e0!3m2!1sth!2sus!4v1702999079784!5m2!1sth!2sus"
                style="border:0;height:450px;width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

              <form action="{{ url('send-line-notification') }}" method="POST" enctype="multipart/form-data" class="p-5 rounded contact-form">
                                @csrf
                                        <h5 class="text-primary">สมัครเรียน</h5>
                                        <div class="mb-4">
                                            <input type="text" required name="name" class="form-control border-0 py-2" placeholder="ชื่อ-สกุล">
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" required name="phone" class="form-control border-0 py-2" placeholder="เบอร์โทร">
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" name="line" class="form-control border-0 py-2" placeholder="Line ID">
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
                                            <button class="btn bg-primary text-white" type="submit">บันทึกและส่งข้อมูล</button>
                                        </div>
              </form>
        </div>
    </div>
</div>
@endsection