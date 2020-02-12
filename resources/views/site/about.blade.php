@extends('layouts.app_site')
@section('content')

<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ml-auto">
                    <div class="breadcrumb-content">

                        <!-- <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index2.html">الرئيسية</a></li>
                            <li class="active__list-item">من نحن</li>
                            <li>about</li>
                        </ul> -->
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="section-heading blog-heading text-center">

                                    <h2 class="section__title">من نـحن</h2>

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

    <!--================================
         START ABOUT AREA
=================================-->
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-large-img">
                        <img src="{{ asset('site_assets/images/about-img.jpg')}} " alt="">
                    </div><!-- end about-large-img-->
                </div><!-- end col-lg-12 -->
                <div class="col-lg-5">
                    <div class="about-semi-img">
                        <img src="{{ asset('site_assets/images/about-img2.png')}} " alt="">
                    </div>
                </div><!-- end col-lg-5 -->
                <div class="col-lg-7">
                    <div class="about-heading">
                        <div class="section-heading">

                            <h2 class="section__title text-right">مؤسسة لمع لدراسة العقائد والأديان</h2>

                            <p class="section__desc text-right">
                                لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى)
                                ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ
                                القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص،
                                لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا
                                النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل
                                كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع
                                من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج
                                مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.


                            </p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end about-area -->
    <!--================================
        END ABOUT AREA
=================================-->

<section class="cta-area cta-area2 text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="cta-item">
                        <h3 class="cta__title">تواصل معنا</h3>
                        <p class="cta__desc">شاركنا رؤيك</p>
                        <a href="contact.html" class="theme-btn">أرسل رسالة</a>
                    </div><!-- end cta-item -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end cta-area -->
@endsection