<!-- Spinner Start -->
<div id="spinner"
    class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<div class="container-fluid" style="background-color: #154885">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="{{ url('/') }}" class="navbar-brand">
                    <img class="img-fluid" style="max-width: 100%; height: 100px;" src="{{asset('assets/frontend/logo/logo.jpg')}}">
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" style="background-color:#ffc107 ">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="{{ url('about') }}" class="nav-item nav-link {{ (request()->is('about*')) ? 'active text-secondary' : '' }} ">รอบรู้เรื่องขับขี่</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ (request()->is('new-license*')) || (request()->is('renew-license*')) ? 'active text-secondary' : '' }}" data-bs-toggle="dropdown">การทำใบขับขี่</a>
                        <div class="dropdown-menu rounded">
                            <a href="{{ url('new-license') }}" class="dropdown-item">ทำใบขับขี่ใหม่</a>
                            <a href="{{ url('renew-license') }}" class="dropdown-item">ต่ออายุใบขับขี่</a>
                            {{-- <a href="{{ url('internationa-license')}}" class="dropdown-item">ใบขับขี่สากล</a> --}}
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ (request()->is('theory*')) || (request()->is('practical*')) ? 'active text-secondary' : '' }}" data-bs-toggle="dropdown">เตรียมสอบใบขับขี่</a>
                        <div class="dropdown-menu rounded">
                            <a href="{{ url('theory') }}" class="dropdown-item">ภาคทฤษฎี</a>
                            <a href="{{ url('practical')}}" class="dropdown-item">ภาคปฏิบัติ</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ (request()->is('all-video*')) || (request()->is('all-gallery*')) ? 'active text-secondary' : '' }} " data-bs-toggle="dropdown">อื่นๆ</a>
                        <div class="dropdown-menu rounded">
                            <a href="{{ url('all-gallery')}}" class="dropdown-item">Gallery</a>
                            <a href="{{ url('all-video') }}" class="dropdown-item">Video</a>
                        </div>
                    </div>
                    <a href="{{ url('register') }}" class="nav-item nav-link">ฝึกทำข้อสอบ</a>
                    <a href="{{url('contact')}}" class="nav-item nav-link {{ (request()->is('contact*')) ? 'active text-secondary' : '' }}">ติตต่อเรา</a>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shirink-0">
                <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                    <a href="tel:038511948" class="position-relative animated tada infinite">
                        <i class="fa fa-phone-alt text-warning fa-2x"></i>
                        <div class="position-absolute" style="top: -7px; left: 20px;">
                            <span><i class="fa fa-comment-dots text-warning"></i></span>
                        </div>
                    </a>
                </div>
                <div class="d-flex flex-column pe-4 border-primary border-end">
                    <span class="text-white">สอบถามเพิ่มเติม ?</span>
                    <a href="tel:038511948">
                        <span class="text-white">โทร: 038-511948-9</span>
                    </a>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
