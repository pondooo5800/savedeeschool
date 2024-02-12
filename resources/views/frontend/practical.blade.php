@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">ภาคปฏิบัติ</h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">ภาคปฏิบัติ</li>
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
                            <img src="https://safedrivedlt.com/wp-content/uploads/2021/09/%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B8%84%E0%B8%B4%E0%B8%A7%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%AD%E0%B8%B2%E0%B8%A2%E0%B8%B8%E0%B9%83%E0%B8%9A%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88-2.png"
                                class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="https://safedrivedlt.com/wp-content/uploads/2021/10/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%B3%E0%B9%83%E0%B8%9A%E0%B8%82%E0%B8%B1%E0%B8%9A%E0%B8%82%E0%B8%B5%E0%B9%88%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88-1.png"
                                    class="img-fluid w-100 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <h1 class="mb-4">การสอบภาคปฏิบัติ ทดสอบขับรถ</h1>
                        <h5 class="mb-4">สำหรับผู้ขอรับใบอนุญาตขับรถส่วนบุคคลชั่วคราว (ขอใหม่)</h5>
                        <p>หลังจากสอบอบรมภาคทฤษฏีขอใบอนุญาตขับรถส่วนบุคคลชั่วคราวผ่านแล้ว จะมาถึงขั้นตอนสุดท้ายคือ การสอบภาคปฏิบัติ ซึ่งขั้นตอนการสอบใบขับขี่รถยนต์/รถจักรยานยนต์ภาคปฏิบัติ จะต้องมาทำการสอบในวันถัดไป หรือเลือกวันสอบที่มีคิวว่าง ซึ่งแต่ละท่า มีเคล็ดลับ เทคนิคในการสอบให้ผ่านง่าย ๆ ดังนี้</p>
                    </div>

                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <h1 class="mb-4">ทดสอบขับรถยนต์ 3 ท่า
                            </h1>
                        <p>1. ท่าขับรถเดินหน้าและถอยหลังในทางตรง</p>
                        <p> - ให้ขับรถเดินหน้า-ถอยหลังออกโดยตลอดช่องเดินรถซึ่ง มีขนาดความกว้าง 2.50 เมตร ยาว 10 – 20 เมตร เป็นระยะคงที่ใช้กับรถทุกขนาด</p>
                        <p> - ล้อรถต้องไม่ทับแนวเส้นที่กำหนด ไม่ชนหรือเบียดหลัก  </p>
                        <p> - ให้ขับรถเดินหน้า-ถอยหลังได้เพียงครั้งเดียว  </p>
                        <p> - เครื่องยนต์ต้องไม่ดับในระหว่างทดสอบ  </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div>
                            <img class="p-3" width="250" height="280" src="https://safedrivedlt.com/wp-content/uploads/2021/10/Screenshot-2-707x1024.png" class="rounded" alt="Cinque Terre">
                            <img class="p-3" width="250" height="280" src="https://safedrivedlt.com/wp-content/uploads/2021/10/Screenshot-3-723x1024.png" class="rounded" alt="Cinque Terre">
                        </div>
                    </div>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <p>2. การขับรถเดินหน้าและหยุดรถเทียบทางเท้า</p>
                        <p> - ขับรถเดินหน้า ตั้งแต่เริ่มขับรถอย่างต่อเนื่องไปจนถึงจุดทดสอบที่กำหนดให้หยุดรถ โดยให้หยุดรถได้เพียงครั้งเดียว ณ จุดที่กำหนดให้หยุดเท่านั้น</p>
                        <p> - ด้านซ้ายของรถต้องขนานขอบทาง และห่างจากขอบทาง ไม่เกิน 25 เซนติเมตร</p>
                        <p> - กันชนหน้า หรือล้อหน้าสุด หรือขอบล้อสำหรับรถที่ไม่มีกันชน หน้าต้องไม่ล้ำจุดหยุดรถข้างทาง และต้องอยู่ห่างจากจุดหยุดรถนั้น ไม่เกิน 1 เมตร  </p>
                        <p> - ต้องไม่ขับรถปีนทางเท้า หรือขอบทาง
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div>
                            <img class="p-3" width="250" height="280" src="https://safedrivedlt.com/wp-content/uploads/2021/10/Screenshot-1-2.png" class="rounded" alt="Cinque Terre">
                        </div>
                    </div>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <p>3. การขับรถถอยหลังเข้าจอดและออกจากช่องว่างด้านซ้าย (ถอยเข้าซอง)</p>
                        <p> - ให้ขับรถถอยหลังเข้าจอดในช่องว่างด้านซ้าย ซึ่งประกอบด้วยหลัก เส้น หรือแนวเส้นที่กำหนด หากเป็นหลัก ต้องไม่น้อยกว่า 9 หลัก เป็นช่องกว้างเท่ากับความกว้างของรถรวมกระจกมองข้างบวกเพิ่มข้างละ 0.5 เมตร ความยาวของช่องจอดเท่ากับความยาวของตัวรถบวกเพิ่มอีก 2.5 เมตร</p>
                        <p> - ตั้งแต่เริ่มเข้าเกียร์ขับรถถอยหลังเข้าจอด จนกระทั่งขับออกจากช่องว่างด้านซ้ายต้องเข้าเกียร์ หรือเปลี่ยนเกียร์ไม่เกิน 7 ครั้ง</p>
                        <p> - ต้องไม่ชนหรือเบียดหลัก ล้ำเส้น หรือล้ำแนวเส้นที่กำหนด</p>
                        <p> - ตัวรถต้องขนานกับขอบทางหรือหลัก เส้น หรือแนวเส้นที่กำหนดด้านซ้าย โดยไม่เบียดหลักขอบทางหรือทับเส้น หรือทับแนวเส้นที่กำหนด
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div>
                            <img class="p-3" width="250" height="280" src="https://safedrivedlt.com/wp-content/uploads/2022/03/1647957587761.jpg" class="rounded" alt="Cinque Terre">
                            <img class="p-3" width="250" height="280" src="https://safedrivedlt.com/wp-content/uploads/2022/03/1647957601524.jpg" class="rounded" alt="Cinque Terre">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<!-- Blog End -->

@endsection
