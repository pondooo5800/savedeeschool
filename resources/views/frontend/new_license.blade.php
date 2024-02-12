@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">ทำใบขับขี่ใหม่</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">ทำใบขับขี่ใหม่</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="container-fluid">
            <div class="container ">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img src="https://safedrivedlt.com/wp-content/uploads/2021/08/icon%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%A3%E0%B8%96.png"
                                class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="https://safedrivedlt.com/wp-content/uploads/2021/10/%E0%B8%9D%E0%B8%B6%E0%B8%81%E0%B8%97%E0%B8%B3%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%AA%E0%B8%AD%E0%B8%9A-1.png"
                                    class="img-fluid w-100 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <h1 class="mb-4">ทำใบขับขี่ใหม่ เลือกได้ 2 วิธี</h1>
                        <p>1. เรียนกับโรงเรียนสอนขับรถ</p>
                        <p>- ฝึกหัดขับรถ อบรมภาคทฤษฎี ทดสอบภาคทฤษฎี ทดสอบขับรถ</p>
                        <p>- นำใบรับรองไปทำใบขับขี่ที่สำนักงานขนส่งต่อไป</p>
                        <p>2. เรียนกับโรงเรียนสอนขับรถ</p>
                        <p>- ฝึกหัดขับรถ อบรมภาคทฤษฎี ทดสอบภาคทฤษฎี ทดสอบขับรถ</p>
                        <p>- นำใบรับรองไปทำใบขับขี่ที่สำนักงานขนส่งต่อไป</p>
                        <p>- เมื่อมั่นใจแล้ว นัดเข้าอบรมภาคทฤษฎี ทดสอบภาคทฤษฎี ทดสอบขับรถ ที่สำนักงานขนส่ง</p>

                    </div>

                </div>
                <br><br>
                <div class="container-fluid blog py-5 mb-5">
                    <div class="container">
                        <div class="row g-5 justify-content-center">
                            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <div class="blog-content text-center position-relative p-3">
                                        <h5 class="">ใบขับขี่รถยนต์</h5>
                                        <p class="py-2 text-start text-dark">คุณสมบัติผู้ขอใบขับขี่</p>
                                        <p class="text-start m-0">- อายุไม่ต่ำกว่า 18 ปีบริบูรณ์</p>
                                        <p class="text-start m-0">- ไม่เป็นผู้มีร่างกายพิการจนเป็นที่เห็นได้ว่าไม่สามารถขับรถได้</p>
                                        <p class="text-start m-0">- ไม่มีโรคประจำตัวที่ผู้ประกอบวิชาชีพเวชกรรมเห็นว่าอาจเป็นอันตรายขณะขับรถ</p>
                                        <p class="text-start m-0">- ไม่เป็นบุคคลวิกลจริตหรือจิตฟั่นเฟือน</p>
                                        <p class="text-start m-0">- ไม่เป็นผู้อยู่ระหว่างถูกยึดหรือเพิกถอนใบอนุญาตขับรถ</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">เอกสารประกอบคำขอ</p>
                                        <p class="text-start m-0">- บัตรประจำตัวประชาชนฉบับจริง</p>
                                        <p class="text-start m-0">- ใบรับรองแพทย์ อายุไม่เกิน 1 เดือน</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ค่าธรรมเนียม</p>
                                        <p class="text-start m-0">- ค่าคำขอ 5 บาท</p>
                                        <p class="text-start m-0">- รถยนต์ส่วนบุคคลชั่วคราว 200 บาท</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <div class="blog-content text-center position-relative p-3">
                                        <h5 class="">ใบขับขี่รถจักรยานยนต์</h5>
                                        <p class="py-2 text-start text-dark">คุณสมบัติผู้ขอใบขับขี่</p>
                                        <p class="text-start m-0">- รถจักรยานยนต์ที่มีขนาดความจุกระบอกสูบรวมกันไม่เกิน 110 ลูกบาศก์เซนติเมตร</p>
                                        <p class="text-start m-0">- อายุไม่ต่ำกว่า 15 ปีบริบูรณ์</p>
                                        <p class="text-start m-0">- ไม่เป็นผู้มีร่างกายพิการจนเป็นที่เห็นได้ว่าไม่สามารถขับรถได้</p>
                                        <p class="text-start m-0">- ไม่มีโรคประจำตัวที่ผู้ประกอบวิชาชีพเวชกรรมเห็นว่าอาจเป็นอันตรายขณะขับรถ</p>
                                        <p class="text-start m-0">- ไม่เป็นบุคคลวิกลจริตหรือจิตฟั่นเฟือน</p>
                                        <p class="text-start m-0">- ไม่เป็นผู้อยู่ระหว่างถูกยึดหรือเพิกถอนใบอนุญาตขับรถ</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">เอกสารประกอบคำขอ</p>
                                        <p class="text-start m-0">- บัตรประจำตัวประชาชนฉบับจริง</p>
                                        <p class="text-start m-0">- ใบรับรองแพทย์ อายุไม่เกิน 1 เดือน</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ค่าธรรมเนียม</p>
                                        <p class="text-start m-0">- ค่าคำขอ 5 บาท</p>
                                        <p class="text-start m-0">- รถยนต์ส่วนบุคคลชั่วคราว 100 บาท</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <div class="blog-content text-center position-relative p-3">
                                        <h5 class="">ใบขับขี่รถสาธารณะ</h5>
                                        <p class="py-2 text-start text-dark">คุณสมบัติผู้ขอใบขับขี่</p>
                                        <p class="text-start m-0">- ต้องได้รับใบอนุญาตขับรถยนต์ส่วนบุคคลชั่วคราว ใบอนุญาตขับรถยนต์สามล้อส่วนบุคคลชั่วคราว หรือใบอนุญาตขับรถจักรยานยนต์ส่วนบุคคลชั่วคราว  แล้วแต่กรณี ที่ได้รับมาแล้วไม่น้อยกว่า 1 ปี</p>
                                        <p class="text-start m-0">- ผู้ขอรับใบขับขี่รถสาธารณะ, ใบขับขี่รถยนต์สามล้อสาธารณะ มีสัญชาติไทย อายุไม่ต่ำกว่า 22 ปี</p>
                                        <p class="text-start m-0">- ผู้ขอรับใบขับขี่รถจักรยานยนต์สาธารณะ มีสัญชาติไทย อายุไม่ต่ำกว่า 20 ปี</p>
                                        <p class="text-start m-0">- ไม่อยู่ระหว่างถูกยึดหรือเพิกถอนใบขับขี่</p>
                                        <p class="text-start m-0">- ไม่เคยต้องคำพิพากษาถึงที่สุดให้ลงโทษ หรือถูกเจ้าพนักงานเปรียบเทียบปรับตั้งแต่สองครั้งขึ้นไป สำหรับความผิดเกี่ยวกับการขับรถ เว้นแต่จะพ้นโทษครั้งสุดท้ายไม่น้อยกว่า 6 เดือน</p>
                                        <p class="text-start m-0">- ไม่มีโรคติดต่อตามที่กำหนดในกฎกระทรวง</p>
                                        <p class="text-start m-0">- ไม่ติดสุรายาเมาหรือยาเสพติดให้โทษ</p>
                                        <p class="text-start m-0">- ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุด</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">เอกสารประกอบคำขอ</p>
                                        <p class="text-start m-0">- บัตรประจำตัวประชาชนฉบับจริง</p>
                                        <p class="text-start m-0">- ใบอนุญาตขับรถส่วนบุคคลมีอายุไม่น้อยกว่า 1 ปี</p>
                                        <p class="text-start m-0">- ใบรับรองแพทย์ อายุไม่เกิน 1 เดือน</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ค่าธรรมเนียม</p>
                                        <p class="text-start m-0">- ค่าคำขอ 5 บาท</p>
                                        <p class="text-start m-0">- รถยนต์สาธารณะ 3 ปี 300 บาท</p>
                                        <p class="text-start m-0">- รถยนต์สามล้อสาธารณะ  3 ปี 150 บาท</p>
                                        <p class="text-start m-0">- รถจักรยานยนต์สาธารณะ 3 ปี 150 บาท</p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<!-- Blog End -->

@endsection
