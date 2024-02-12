@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">ต่ออายุใบขับขี่</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">ต่ออายุใบขับขี่</li>
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
                            <img src="https://safedrivedlt.com/wp-content/uploads/2021/09/%E0%B8%AD%E0%B8%9A%E0%B8%A3%E0%B8%A1%E0%B9%83%E0%B8%9A%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B9%84%E0%B8%A5%E0%B8%99%E0%B9%8C-1.png"
                                class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="https://safedrivedlt.com/wp-content/uploads/2021/09/%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B8%84%E0%B8%B4%E0%B8%A7%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%AD%E0%B8%B2%E0%B8%A2%E0%B8%B8%E0%B9%83%E0%B8%9A%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88-2.png"
                                    class="img-fluid w-100 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <p>1. อบรมต่ออายุ ผ่าน DLT e-Learning ได้ตลอดเวลา</p>
                        <p>- ลงทะเบียน กรอกข้อมูล เลือกประเภทใบอนุญาตขับขี่</p>
                        <p>- ชมวิดีโออบรมความรู้ ทำแบบทดสอบ รับผลการอบรม บันทึกภาพเก็บไว้</p>
                        <p>- จองคิวผ่านแอป DLT smart queue นำเอกสารประกอบคำขอ ผลการอบรม เข้ารับใบขับขี่ตามวัน-เวลาที่จองคิว</p>
                         <a href="https://www.dlt-elearning.com/" target="_blank" rel="noopener noreferrer"><p>- https://www.dlt-elearning.com/</p></a>
                        <p>2. อบรมแล้ว จองคิวผ่านแอป เพื่อต่ออายุใบขับขี่</p>
                        <p>- เพื่อความสะดวกในการดำเนินการ จองคิวได้ที่ DLT Smart Queue</p>
                        <a href="https://apple.co/2GIHARd" target="_blank" rel="noopener noreferrer"><p>- iOS : https://apple.co/2GIHARd</p></a>
                        <a href="http://bit.ly/2IkLpyO" target="_blank" rel="noopener noreferrer"><p>- Android : http://bit.ly/2IkLpyO</p></a>
                        <a href="https://gecc.dlt.go.th" target="_blank" rel="noopener noreferrer"><p>- Website : https://gecc.dlt.go.th</p></a>

                    </div>

                </div>
                <br><br>
                <div class="container-fluid blog py-5">
                    <div class="container">
                        <div class="row g-5 justify-content-center">
                            <div class="col-lg-6 col-xl-6 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                                        <img width="150" height="150" src="https://safedrivedlt.com/wp-content/uploads/2021/10/icon%E0%B9%83%E0%B8%9A%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B8%A3%E0%B8%96%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5-%E0%B8%8A%E0%B8%B1%E0%B9%88%E0%B8%A7%E0%B8%84%E0%B8%A3%E0%B8%B2%E0%B8%A7.png" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                                        <h5 class="">ต่ออายุใบขับขี่ชั่วคราว 2 ปี เป็นใบขับขี่รถส่วนบุคคล 5 ปี</h5>
                                        <p class="py-2 text-start text-dark">เอกสารประกอบคำขอ</p>
                                        <p class="text-start m-0">- บัตรประจำตัวประชาชนฉบับจริง</p>
                                        <p class="text-start m-0">- ใบอนุญาตขับรถส่วนบุคคลชั่วคราวฉบับเดิม</p>
                                        <p class="text-start m-0">- ใบรับรองแพทย์ อายุไม่เกิน 1 เดือน</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ค่าธรรมเนียม</p>
                                        <p class="text-start m-0">- ค่าคำขอ 5 บาท</p>
                                        <p class="text-start m-0">- รถยนต์ส่วนบุคคล (5 ปี) 500 บาท</p>
                                        <p class="text-start m-0">- รถยนต์สามล้อส่วนบุคคล  (5 ปี) 250 บาท</p>
                                        <p class="text-start m-0">- รถจักรยานยนต์ส่วนบุคคล (5 ปี) 250 บาท</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ขั้นตอน</p>
                                        <p class="py-2 text-start text-dark">1. ยื่นคำขอ ตรวจสอบหลักฐานที่สำนักงานขนส่ง ตามวัน-เวลาที่จองคิว</p>
                                        <p class="text-start m-0">- แสดงตน/ยื่นคำขอ ตรวจสอบหลักฐานและ คุณสมบัติเบื้องต้น / จัดทำคำขอ/ ผู้ขอลงนามคำขอ</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">2. ทดสอบสมรรถภาพร่างกาย</p>
                                        <p class="text-start m-0">- ทดสอบสายตาทางลึก-ทางกว้าง ตาบอดสี</p>
                                        <p class="text-start m-0">- ทดสอบปฏิกิริยาทางเท้า</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">3. รับใบอนุญาตขับรถส่วนบุคคล อายุ 5 ปี</p>
                                        <p class="text-start m-0">- ชำระเงิน/ออกใบเสร็จรับเงิน/พิมพ์ใบอนุญาตขับรถ/จ่ายใบอนุญาตขับรถ</p>

                                    </div>
                                    <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6 wow fadeIn" data-wow-delay=".3s">
                                <div class="blog-item position-relative bg-light rounded">
                                    <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                                        <img width="150" height="150" src="https://safedrivedlt.com/wp-content/uploads/2021/10/icon-%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%AD%E0%B8%B2%E0%B8%A2%E0%B8%B8%E0%B9%83%E0%B8%9A%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88-%E0%B8%A3%E0%B8%96%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5-5-%E0%B8%9B%E0%B8%B5.png" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                                        <h5 class="">ต่ออายุใบขับขี่รถส่วนบุคคล ทุกๆ 5 ปี</h5>
                                        <p class="py-2 text-start text-dark">เอกสารประกอบคำขอ</p>
                                        <p class="text-start m-0">- บัตรประจำตัวประชาชนฉบับจริง</p>
                                        <p class="text-start m-0">- ใบอนุญาตขับรถฉบับเดิม (ก่อนสิ้นอายุไม่เกิน 6 เดือน หรือ สิ้นอายุไม่เกิน 1 ปี)</p>
                                        <p class="text-start m-0">- ใบรับรองแพทย์ อายุไม่เกิน 1 เดือน</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ค่าธรรมเนียม</p>
                                        <p class="text-start m-0">- ค่าคำขอ 5 บาท</p>
                                        <p class="text-start m-0">- รถยนต์ส่วนบุคคล (5 ปี) 500 บาท</p>
                                        <p class="text-start m-0">- รถยนต์สามล้อส่วนบุคคล  (5 ปี) 250 บาท</p>
                                        <p class="text-start m-0">- รถจักรยานยนต์ส่วนบุคคล (5 ปี) 250 บาท</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">ขั้นตอน</p>
                                        <p class="py-2 text-start text-dark">1. ยื่นคำขอ ตรวจสอบหลักฐานที่สำนักงานขนส่ง ตามวัน-เวลาที่จองคิว</p>
                                        <p class="text-start m-0">- แสดงตน/ยื่นคำขอ ตรวจสอบหลักฐานและ คุณสมบัติเบื้องต้น / จัดทำคำขอ/ ผู้ขอลงนามคำขอ</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">2. ทดสอบสมรรถภาพร่างกาย</p>
                                        <p class="text-start m-0">- ทดสอบสายตาทางลึก-ทางกว้าง ตาบอดสี</p>
                                        <p class="text-start m-0">- ทดสอบปฏิกิริยาทางเท้า</p>
                                        <br>
                                        <p class="py-2 text-start text-dark">3. รับใบอนุญาตขับรถส่วนบุคคล อายุ 5 ปี</p>
                                        <p class="text-start m-0">- ชำระเงิน/ออกใบเสร็จรับเงิน/พิมพ์ใบอนุญาตขับรถ/จ่ายใบอนุญาตขับรถ</p>

                                    </div>
                                    <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container-fluid blog py-5 mb-5">
                    <div class="container">
                        <div class="row g-5 justify-content-center">
                            <div class="col-lg-12 col-xl-12 wow fadeIn" data-wow-delay=".3s">
                                <div style="background-color: #F7EFE5" class="blog-item position-relative rounded">
                                    <div class="blog-content text-center position-relative p-5" style="margin-top: -25px;">
                                        <p class="py-2 text-start text-danger">ขาดต่ออายุใบขับขี่เกิน 1 ปี</p>
                                        <p class="text-start m-0">- ยื่นคำขอ ตรวจสอบหลักฐาน</p>
                                        <p class="text-start m-0">- ทดสอบสมรรถภาพร่างกาย</p>
                                        <p class="text-start m-0">- ทดสอบสายตาบอดสี</p>
                                        <p class="text-start m-0">- ทดสอบสายตาทางลึก – ทางกว้าง</p>
                                        <p class="text-start m-0">- ทดสอบปฏิกิริยาทางเท้า</p>
                                        <p class="text-start m-0">- เข้ารับการอบรม 2 ชั่วโมง</p>
                                        <p class="text-start m-0">- ทดสอบข้อเขียน 50 ข้อ ให้ผ่านเกณฑ์ 90 % </p>
                                        <p class="text-start m-0">- รับใบอนุญาตขับรถ อายุ 5 ปี </p>
                                        <br>
                                        <p class="py-2 text-start text-danger">ขาดต่ออายุใบขับขี่เกิน 3 ปี</p>
                                        <p class="text-start m-0">- มีการทดสอบขับรถ โดยจะต้องผ่านเกณฑ์ที่กำหนด</p>
                                        <p class="text-start m-0">- สอบผ่าน – บันทึกผลและดำเนินการขั้นต่อไป</p>
                                        <p class="text-start m-0">- สอบไม่ผ่าน – บันทึกผลและออกใบนัดทดสอบครั้งต่อไป นำใบนัดไปจองคิวทดสอบขับรถใหม่</p>
                                    </div>
                                    <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
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
