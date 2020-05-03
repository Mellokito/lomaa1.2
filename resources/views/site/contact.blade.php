@extends('layouts.app_site')
@section('content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <!-- <h2 class="breadcrumb__title">contact</h2>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="index.html">home</a></li>
                        <li>contact</li>
                    </ul> -->
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="section-heading blog-heading text-center">

                                <h2 class="section__title">راسلنـا</h2>

                            </div><!-- end section-heading -->
                        </div><!-- end col-lg-8 -->
                    </div><!-- end row -->
                </div>
                <!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
END BREADCRUMB AREA
================================= -->

<!-- ================================
   START CONTACT AREA
================================= -->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-shared">
                    <!--Contact Form-->
                <form method="POST" action="{{ route('site.mail') }}">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control text-right" type="text" name="name"
                            placeholder="الأسم كامل" value="{{ old('name') }}">
                            </div><!-- end col-md-12 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control text-right" type="email" name="email"
                            placeholder="البريد الالكتروني" value="{{ old('email') }}">
                            </div><!-- end col-md-12 -->

                            <div class="col-lg-12 form-group">
                                <input class="form-control text-right" type="number" name="phone"
                            placeholder="رقم الهاتف" value="{{ old('phone') }}">
                            </div><!-- end col-md-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <textarea class="textarea text-right" name="message"
                            placeholder="الرسالة">{{ old('message') }}</textarea>
                            </div><!-- end col-md-12 -->

                            <div class="col-lg-3 col-sm-6 ml-auto">
                                <button class="theme-btn submit__btn" type="submit">أرسل</button>
                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end contact-form-action -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="section-heading">

                    <h2 class="section__title text-right">اتصال بنا</h2>
                    <p class="section__meta text-right">أكتب رسالتك</p>
                    <p class="section__desc text-right">
                        يُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن
                        الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن
                        كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف
                    </p>
                    <ul class="section__list text-right">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div><!-- end sec-heading -->
            </div><!-- end col-lg-6 -->

        </div><!-- end row -->
        <div class="row contact-detail-action">
            <div class="col-lg-4">
                <div class="contact-item contact-item3">
                    <h3 class="contact__title text-right">لتواصل</h3>
                    <p class="contact__desc text-right">
                        contact@lomaa.ma <br>
                        0666 888 000
                    </p>
                </div>
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="contact-item contact-item2">
                    <h3 class="contact__title text-right">العنوان</h3>
                    <p class="contact__desc text-right">
                        660 شارع علال ابن عبد الله, الرباط
                    </p>
                </div>
            </div><!-- end col-lg-4 -->

            <div class="col-lg-4">
                <div class="contact-item contact-item1">
                    <h3 class="contact__title text-right">من نحن</h3>
                    <p class="contact__desc text-right">
                        كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة
                    </p>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
   START CONTACT AREA
================================= -->

<!-- ================================
START MAP AREA
================================= -->
<section class="map-area">
    <div id="map"></div><!-- end map -->
</section><!-- end map-area -->
<!-- ================================
END MAP AREA
================================= -->

@endsection