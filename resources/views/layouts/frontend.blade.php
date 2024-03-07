<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>โรงเรียนสอนขับรถเซฟดี ไดรฟ์เวอร์ - โรงเรียนสอนขับรถ พร้อมสอบใบขับขี่ อบรมใบขับขี่ รับรองโดยกรมการขนส่งทางบก</title>
    <meta name="description"
        content="เสริมสร้างความรู้ ทักษะการขับขี่ การใช้รถใช้ถนนอย่างปลอดภัยการทำใบขับขี่ครั้งแรก เริ่มจากตรงไหน มีขั้นตอนอย่างไรฝึกทำข้อสอบเสมือนจริง" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="เซฟดีโรงเรียนสอนขับรถ" name="keywords">

    <link rel="icon" type="image/x-icon" href="{{asset('assets/frontend/img/favicon.png')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700&family=Prompt:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <style>
        .font-text{
            font-family: "Kanit",sans-serif;
        }
    </style>
    <style>
    @media only screen and (max-width: 992px) {
        iframe {
            width: 100%;
            height: 100%;
            aspect-ratio: 16 / 9;
        }
    }
    </style>
    @yield('styles')
</head>

<body class="main">
        @include('frontend.component.header')
        @yield('content')

        @include('frontend.component.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @yield('scripts')

</body>

</html>
