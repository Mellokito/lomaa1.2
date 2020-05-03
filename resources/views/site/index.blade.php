@extends('layouts.app_site')
@section('content')
<!--================================
         START SLIDER AREA
=================================-->
<section class="slider-area slider-area2 text-center">
        <div class="homepage-slide1">
            @foreach ($slider as $item)
            <div class="single-slide-item" style="background-image: url({{asset('storage/uploads/images/'.$item->sliderable->image)}});">
                <div class="slide-item-table">
                    <div class="slide-item-tablecell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="slider-heading">
                                        <h2 class="slider__title">
                                            {{ $item->sliderable->titre }}
                                        </h2>
                                        @if($item->sliderable_type == 'App\Article')
                                            <a href="{{ route('site.article_show',$item->sliderable->slug) }}" class="theme-btn">تصفح المقال</a>
                                        @elseif($item->sliderable_type == 'App\Evenement')
                                            <a href="{{ route('site.evenement_show',$item->sliderable->slug) }}" class="theme-btn">تصفح النشاط</a>
                                        @endif
                                    </div>
                                </div>
                                <!--end col-lg-8 -->
                            </div><!-- end row -->
                        </div><!-- container -->
                    </div><!-- slide-item-tablecell -->
                </div><!-- slide-item-table -->
            </div><!-- end single-slide-item -->
            @endforeach
        </div><!-- end homepage-slides -->
    </section><!-- end slider-area -->
    <!--================================
        END SLIDER AREA
=================================-->


    <!--================================
         START MAKE WORLD AREA
=================================-->
    <section dir="rtl" class="make-world-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-heading text-center">
                        <h2 class="section__title">مؤسسة لمع لدراسة العقائد والأديان</h2>

                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
            <div class="row world-static-wrap">
                <div class="col-lg-4">
                    <div class="world-item">
                        <div class="world-img-box">
                            <img src="{{ asset('site_assets/images/img4.jpg')}}" alt="">
                        </div>
                        <div class="world-img-bg world-img-bg1"></div>
                    </div><!-- end world-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-3">
                    <div class="world-item">
                        <div class="world-img-box">
                            <img src="{{ asset('site_assets/images/img5.jpg')}}" alt="">
                        </div>
                        <div class="world-img-bg world-img-bg2"></div>
                    </div><!-- end world-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-5">
                    <div class="world-item">
                        <div class="world-img-box">
                            <img src="{{ asset('site_assets/images/img6.jpg')}}" alt="">
                        </div>
                        <div class="world-img-bg world-img-bg3"></div>
                    </div><!-- end world-item -->
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
            <div class="row world-static-wrap2">

                
                <div class="col-lg-5">
                    <div class="world-content">
                        <h3 class="world__title text-right">
                            لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج <strong>أليايت,سيت </strong>
                        </h3>
                    </div>
                </div><!-- end col-lg-5 -->
                <div class="col-lg-7">
                    <div class="world-content">
                        <p class="world__desc text-right">
                            وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص
                            بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع
                            انترنت ...
                        </p>
                    </div>
                </div><!-- end col-lg-7 -->
            </div>
        </div><!-- end container -->
    </section><!-- end give-area -->
    <!--================================
        END MAKE WORLD  AREA
=================================-->


    <div class="section-divider"></div>

    <!--================================
         START MIXER AREA
=================================-->
    <section class="mixer-area helping-area cat-area text-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-heading">

                        <h2 class="section__title">تصفح عبر وحداتنا</h2>

                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="helping-item">
                        <div class="row">
                            <div class="col">
                                <div class="helping-cat-item">
                                    <div class="helping-box helping-box1">
                                        <img src="{{ asset('site_assets/images/analyze.png')}}" alt="">
                                    </div>
                                <h4><a href="{{ route('site.article_categorie',$categorie[1]->slug) }}"> {{ $categorie[1]->nom }} </a></h4>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="helping-cat-item">
                                    <div class="helping-box helping-box2">
                                        <img src="{{ asset('site_assets/images/psych.png')}}" alt="">
                                    </div>
                                    <h4><a href="{{ route('site.article_categorie',$categorie[2]->slug) }}"> {{ $categorie[2]->nom }} </a></h4>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="helping-cat-item">
                                    <div class="helping-box helping-box3">
                                        <img src="{{ asset('site_assets/images/family.png')}}" alt="">
                                    </div>
                                    <h4><a href="{{ route('site.article_categorie',$categorie[3]->slug) }}"> {{ $categorie[3]->nom }} </a></h4>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="helping-cat-item">
                                    <div class="helping-box helping-box4">
                                        <img src="{{ asset('site_assets/images/droit.png')}}" alt="">
                                    </div>
                                    <h4><a href="{{ route('site.article_categorie',$categorie[4]->slug) }}"> {{ $categorie[4]->nom }} </a></h4>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="helping-cat-item">
                                    <div class="helping-box helping-box5">
                                        <!-- <i class="icon-pet"></i> -->
                                        <img src="{{ asset('site_assets/images/001.png')}}" alt="">
                                    </div>
                                    <h4><a href="{{ route('site.article_categorie',$categorie[5]->slug) }}"> {{ $categorie[5]->nom }} </a></h4>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end helping-item -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end mixer-area -->
    <!--================================
        END MIXER AREA
=================================-->


    <!--================================
         START CAUSES AREA
=================================-->
    <section dir="rtl" class="causes-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-heading blog-heading text-center">
                        <div class="section-icon">
                            <!-- <img src="{{ asset('site_assets/images/section-icon.png')}}" alt="section-icon"> -->
                        </div>
                        <h2 class="section__title">آخر المقالات</h2>

                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
            <div class="row blog-content-wrap">
                @foreach($articles as $article)
                <div class="col-lg-4">
                    <div class="blog-content">
                        <div class="blog-item blog-item1">
                            <div class="blog-img">
                                <img src="{{asset('storage/uploads/images/'.$article->image)}}" alt="">
                            </div>

                            <div class="blog-inner-content">
                                <h3 class="blog__title text-right">
                                    <a href="{{ route('site.article_show',$article->slug) }}">
                                        {{ $article->titre }}
                                    </a>
                                </h3>
                                <!-- <p class="blog__desc mb-lg-5 text-right">
                                    {!! substr(strip_tags($article->contenu),0,50) !!}
                                </p> -->

                                <a href="{{ route('site.article_show',$article->slug) }}" class="theme-btn">أقرا المقال</a>
                            </div>
                        </div><!-- end blog-item -->
                    </div><!-- end blog-content -->
                </div><!-- end col-lg-4 -->
                @endforeach
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="">
                        <a href="{{ route('site.article_all') }}" class="theme-btn2 "> جميع المقالات </a>
                    </div>

                </div>

            </div>
        </div><!-- end container -->
    </section><!-- end causes-area -->
    <!--================================
        END CAUSES AREA
=================================-->
    <div class="section-divider"></div>


    <!--================================
         START MIXER AREA
=================================-->
    <section dir="rtl" class="mixer-area mixer-area3 mixer-area4">
        <div class="container">
            @isset($video)
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <div class="section-icon">
                            <!-- <img src="{{ asset('storage/uploads/images/'.$video->image)}}" alt="section-icon"> -->
                        </div>
                        <h2 class="section__title text__white text-right">{{ $video->titre }}</h2>
                        <p class="section__desc text__white text-right">
                            {{ $video->description }}
                        </p>
                
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="mixer-video-content">
                        <img src="{{ asset('storage/uploads/images/'.$video->image)}}" alt="">
                        <a class="mfp-iframe video-play-btn" href="https://www.youtube.com/watch?v={{$video->code_youtube}}"
                            title="Play Video"><i class="fa fa-play"></i></a>
                    </div><!-- end mixer-video-content -->
                </div><!-- end col-lg-6 -->
                
            </div><!-- end row -->
            @endisset
        </div><!-- end container -->
    </section><!-- end mixer-area -->
    <!--================================
        END MIXER AREA
=================================-->

    <!-- ================================
       START CLIENTLOGO AREA
================================= -->
    <section class="clientlogo-area">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto">
                    <div class="section-heading blog-heading text-center">

                        <h2 class="section__title">مواقع صديقة</h2>

                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="client-logo">
                        <div class="client-logo-item">
                            <img src="{{ asset('site_assets/images/client-logo.png')}}" alt="brand image">
                        </div><!-- end client-logo-item -->
                        <div class="client-logo-item">
                            <img src="{{ asset('site_assets/images/client-logo.png')}}" alt="brand image">
                        </div><!-- end client-logo-item -->
                        <div class="client-logo-item">
                            <img src="{{ asset('site_assets/images/client-logo.png')}}" alt="brand image">
                        </div><!-- end client-logo-item -->
                        <div class="client-logo-item">
                            <img src="{{ asset('site_assets/images/client-logo.png')}}" alt="brand image">
                        </div><!-- end client-logo-item -->
                        <div class="client-logo-item">
                            <img src="{{ asset('site_assets/images/client-logo.png')}}" alt="brand image">
                        </div><!-- end client-logo-item -->
                        <div class="client-logo-item">
                            <img src="{{ asset('site_assets/images/client-logo.png')}}" alt="brand image">
                        </div><!-- end client-logo-item -->
                    </div><!-- end client-logo -->
                </div><!-- end col-md-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end clientlogo-area -->
    <!-- ================================
       START CLIENTLOGO AREA
================================= -->




    <!--================================
       START GALLERY AREA
=================================-->
    <section class="gallery-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-heading">

                        <h2 class="section__title text__white">مرئيات و معلومات مصورة</h2>

                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8-->
            </div><!-- end row -->
            <div class="row gallery-wrap">
                <div class="col-lg-12">
                    <div class="gallery-carousel">
                        @foreach($images as $image)
                        <div  class="gallery-item">
                            <img src="{{ asset('storage/uploads/images/'.$image->image)}}" alt="">
                            <a href="{{ asset('storage/uploads/images/'.$image->image)}}" data-lightbox="roadtrip"
                                data-title="{{ $image->nom }}"> <span class="gallery-icon"></span></a>
                        </div><!-- end gallery-item -->
                        @endforeach

                    </div><!-- end gallery-carousel -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- container -->
    </section><!-- end gallery-area -->
    <!--================================
          END GALLERY AREA
=================================-->

    <!-- ================================
    START PACKAGE AREA
================================= -->
    <section dir="rtl" class="package-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                
                        <h2 class="section__title text-right">إصدارات</h2>
                
                        <div class="package-content">
                            <!-- <div class="package__img">
                                                <img src="{{ asset('site_assets/images/package-small-img.jpg')}}" alt="">
                                                <img src="{{ asset('site_assets/images/package-small-img2.jpg')}}" alt="">
                                            </div> -->
                            <p class="package__desc">يُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال
                                المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف
                                بشكل عشوائي أخذتها من نص
                            </p>
                
                            <a href="{{ route('site.edition_all') }}" class="theme-btn2 mt-5">جميع الاصدارات</a>
                        </div>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-7">
                    <div class="row package-price-wrap">
                        @foreach($editions as $edition)
                        <div class="col-lg-6">
                            <div class="package-item">
                                <div class="package-top">

                                    <div class="package__img">
                                        <img src="{{asset('storage/uploads/images/'.$edition->image)}}" alt="" style="width:200px">
                                            <a href="{{ route('site.edition_show',$edition->slug) }}" >
                                            <h3 class="blog__title text-right">{{ $edition->titre }}</h3>
                                            </a>
                                    </div>
                                </div>
                                <div class="package-bottom text-right">
                                
                                    <p class="package__desc">
                                        {!! substr($edition->description,0,250) !!}
                                    </p>
                                    <a href="{{ route('site.edition_show',$edition->slug) }}" class="theme-btn mt-5">المزيد</a>
                                </div>
                            </div><!-- end package-item -->
                        </div><!-- end col-lg-6 -->
                        @endforeach
                    </div><!-- end row -->
                </div><!-- end col-lg-7 -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end package-area -->
    <!-- ================================
    END PACKAGE AREA
================================= -->

    <!--================================
         START CAUSES AREA
=================================-->
    <section dir="rtl" class="causes-area upcoming-event-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-heading blog-heading text-center">

                        <h2 class="section__title">أنشطة</h2>

                    </div><!-- end section-heading -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
            <div class="row blog-content-wrap">
                @foreach($evenements as $event)
                <div class="col-lg-4">
                    <div class="blog-content">
                        <div class="blog-item blog-item1">
                            <div class="blog-img">
                                <img src="{{asset('storage/uploads/images/'.$event->image)}}" alt="">
                                {{-- <span class="blog__tag blog__tag1">
                                    <span class="date__num-text">6</span>
                                    <span class="date__mon-text">ماي</span>
                                </span> --}}
                            </div>
                            <div class="blog-inner-content">
                                <h3 class="blog__title text-right">
                                    <a href="{{route('site.evenement_show',$event->slug)}}">
                                        {{ $event->titre}}
                                    </a>
                                </h3>
                                <ul class="blog__list text-right">
                                    <li class="blog__dot-active">{{ date('d-m-Y H:i',strtotime($event->date)) }}</li>
                                    <li>{{ $event->lieu }}</li>
                                </ul>
                            </div>
                        </div><!-- end blog-item -->
                    </div><!-- end blog-content -->
                </div><!-- end col-lg-4 -->
                @endforeach
            </div><!-- end row -->
            <div class="row mb-5">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="">
                        <a href="{{ route('site.evenement_all') }}" class="theme-btn2 "> جميع المواعيد </a>
                    </div>

                </div>

            </div>
        </div><!-- end container -->
    </section><!-- end causes-area -->
    <!--================================
        END CAUSES AREA
=================================-->



    <!-- ================================
    START CTA AREA
================================= -->
    <section class="cta-area cta-area2 text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="cta-item">
                        <h3 class="cta__title">تواصل معنا</h3>
                        <p class="cta__desc">شاركنا رأيك</p>
                        <a href="{{ route('site.contact') }}" class="theme-btn">أرسل رسالة</a>
                    </div><!-- end cta-item -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end cta-area -->
    <!-- ================================
    END CTA AREA
================================= -->

@endsection