<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مؤسسة لمع لدراسة العقائد والأديان</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('site_assets/images/favicon.png')}} ">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('site_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/fontello.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/lightbox.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/custom.css')}}">
</head>

<body>
    

    <!-- ================================
            START HEADER AREA
================================= -->
    <header class="header-area header-area2">
        <div class="header-top-action">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="top-action-content">
                            <div class="info-box info-box-1 d-flex align-items-center">
                                <ul class="d-flex align-items-center">
                                    <li><a href="#"><i class="fa fa-envelope"></i>contact@lomaa.ma</a></li>
                                    <li><a href="#"><i class="fa fa-phone-square"></i>666 888 0000</a></li>
                                </ul>
                            </div><!-- end info-box -->
                        </div><!-- top-action-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-7">
                        <div class="top-action-content info-action-content">
                            <div class="info-box info-box-2 d-flex align-items-center justify-content-end">
                                <ul class="top-action-list d-flex align-items-center">
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div><!-- end info-box box-2 -->
                        </div><!-- top-action-content -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end header-top-action -->
        <div dir="rtl" class="header-top header-menu-action">
            <div class="container">
                <div class="row ostion-top-wrap">
                    <div class="col-lg-3 col-sm-3 site-branding">
                        <div class="logo-action d-flex align-items-center">
                            <div class="ostion-logo ml-auto">
                                <a href="{{ route('site.index') }}">
                                    <img style="height: 120px;" src="{{ asset('site_assets/images/logo2.png')}} " alt="Lomaa" title="Lomaa">
                                </a>
                            </div><!-- .ostion-logo -->
                        </div><!-- end logo-action -->
                    </div><!-- site-branding -->
                    <div class="col-lg-9 col-sm-9 ostion-menu">
                        <div class="ostion-menu-innner">
                            <div class="ostion-menu-content">
                                <div class="navigation-top">
                                    <nav class="main-navigation ar-font">
                                            @php 
                                                $categorie_evenements = App\Categorie_evenement::where('valide',true)->where('publish',true)->get();

                                                $categorie_articles = App\Categorie::where('id','!=',17)->where('id','!=',18)->where('valide',true)->where('publish',true)->get()
                                            @endphp
                                        <ul>
                                        <li class="active"><a href="{{ route('site.index') }}">الرئيسية</a></li>
                                        <li class="active"><a href="{{ route('site.about') }}">من نحن</a></li>
                                        <li><a href="#">وحدات لمع</a>
                                            <ul class="dropdown-menu-item dropdown-menu-right text-right">
                                                @foreach($categorie_articles as $categorie)
                                                <li><a href="{{ route('site.article_categorie',$categorie->slug) }}">{{ $categorie->nom }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('site.article_categorie','k1oTEJwdVpxSUFGZ1wvN') }}">حلق علمية</a></li>
                                        <li class="active"><a href="{{ route('site.article_categorie','nd1NG9tWEhaWCtZREhjZ') }}">مفاهيم</a></li>
                                        <li><a href="{{ route('site.article_categorie','mJ1RmRJNWFOUjVKcUorV') }}">حوارات</a></li>
                                        <li><a href="{{ route('site.article_categorie','nJGV3RISHVlYXUzVkxyO') }}">أعلام</a></li>
                                        @if($categorie_evenements->count() > 0)
                                        <li>
                                            <a href="#">أنشطة</a>
                                            <ul class="dropdown-menu-item dropdown-menu-right text-right">
                                                @foreach($categorie_evenements as $categorie_evenement)
                                                <li><a
                                                        href="{{ route('site.evenement_categorie',$categorie_evenement->slug) }}">{{ $categorie_evenement->nom }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                        <li><a href="{{ route('site.edition_all') }}">إصدارات</a></li>
                                        
                                            
                                            
                                            

                                        
                                        
                                        </ul>
                                    </nav><!-- end main-navigation -->
                                </div><!-- end navigation-top -->
                            </div><!-- end ostion-menu-content -->
                            <div  class="mobile-menu-toggle mr-auto">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div><!-- end ostion-menu-innner -->
                    </div><!-- ostion-menu -->
                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end header-top -->
        <div class="side-nav-container text-right">
            <div class="humburger-menu text-right">
                <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
            </div><!-- end humburger-menu -->
            <div class="side-menu-wrap text-right">
                <ul class="side-menu-ul">
                    <li class="sidenav__item"><a href="{{ route('site.index') }}">الرئيسية</a></li>
                    <li class="sidenav__item"><a href="{{ route('site.about') }}">من نحن</a></li>
                    
                    {{-- <li class="sidenav__item"><a href="index.html">home</a>
                        <span class="menu-plus-icon"></span>
                        <ul class="side-sub-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index2.html">Home 2</a></li>
                        </ul>
                    </li> --}}
                    <li class="sidenav__item"><a href="#">وحدات لمع</a>
                        <span class="menu-plus-icon"></span>
                        <ul class="side-sub-menu">
                            @foreach($categorie_articles as $categorie)
                            <li><a href="{{ route('site.article_categorie',$categorie->slug) }}">{{ $categorie->nom }}</a></li>
                            @endforeach
                        </ul>
                        {{-- <ul class="side-sub-menu">
                            <li><a href="causes.html">causes</a></li>
                            <li><a href="causes-detail.html">causes detail</a></li>
                            <li><a href="donate.html">donate now</a></li>
                        </ul> --}}
                    </li>
                    <li class="sidenav__item"><a href="{{ route('site.article_categorie','mJ1RmRJNWFOUjVKcUorV') }}">حوارات</a></li>

                    <li class="sidenav__item"><a href="{{ route('site.article_categorie','k1oTEJwdVpxSUFGZ1wvN') }}">حلق علمية</a></li>
                    @if($categorie_evenements->count() > 0)
                    <li class="sidenav__item">
                        <a href="#">أنشطة</a>
                        <span class="menu-plus-icon"></span>
                        <ul class="side-sub-menu">
                            @foreach($categorie_evenements as $categorie_evenement)
                            <li><a
                                    href="{{ route('site.evenement_categorie',$categorie_evenement->slug) }}">{{ $categorie_evenement->nom }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    <li class="sidenav__item"><a href="{{ route('site.edition_all') }}">إصدارات</a></li>
                    
                </ul>
                {{-- <ul class="side-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                </ul> --}}

            </div><!-- end side-menu-wrap -->
        </div><!-- end side-nav-container -->
    </header>
    <!-- ================================
         END HEADER AREA
================================= -->

   @yield('content')

    <!-- ================================
       START FOOTER AREA
================================= -->
    <section class="footer-area">
        <div class="newsletter-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center">
                        <div class="section-heading footer-heading">

                            <h2 class="section__title text__white">خدمة البريد</h2>

                        </div><!-- end section-heading -->
                        <div class="newsletter-form">
                            <div class="form-shared">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="البريد الاكتروني">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button class="theme-btn submit__btn" type="submit">تسجيل</button>
                                        </div>
                                    </div><!-- end row -->
                                </form>
                            </div><!-- end form-shared -->
                        </div><!-- end newsletter-form -->
                    </div><!-- end col-lg-8 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end newsletter-area -->
        <div class="footer-top">
            <div class="container">
                <div class="row footer-widget-wrap">
                    <div class="col footer-item footer-item4">

                        <ul class="contact__info text-right">
                            <li>660 شارع علال ابن عبد الله, الرباط</li>
                            <li><a href="mailto:contact@lomaa.ma">contact@lomaa.ma</a></li>
                            <li><a href="tel:6668880000">666 888 0000</a></li>
                        </ul>
                        <div class="footer__social">
                            <ul>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- end footer-item -->

                    <div class="col footer-item footer-item2">
                        <a href="{{ route('site.about') }}"><h3 class="widget__title  text-right">من نحن</h3></a>
                        <ul class="foot__links text-right">
                            <li><a href="{{ route('site.article_categorie','mJ1RmRJNWFOUjVKcUorV') }}">حوارات</a></li>
                            <li><a href="{{ route('site.article_categorie','k1oTEJwdVpxSUFGZ1wvN') }}">حلق علمية</a></li>
                            <li><a href="{{ route('site.edition_all') }}">إصدارات</a></li>

                        </ul>
                    </div><!-- end footer-item -->
                    @php 
                    $categorie_evenements = App\Categorie_evenement::where('valide',true)->where('publish',true)->get();

                    $categorie_articles = App\Categorie::where('id','!=',17)->where('id','!=',18)->where('valide',true)->where('publish',true)->get()
                    @endphp
                   
                    <div class="col footer-item footer-item3">
                        <h3 class="widget__title text-right">وحدات لمع</h3>
                        <ul class="foot__links text-right">
                            @foreach($categorie_articles as $categorie_article)
                            <li><a href="{{ route('site.article_categorie',$categorie_article->slug) }}">{{ $categorie_article->nom }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- end footer-item -->
                    <div class="col footer-item footer-item3">
                        <h3 class="widget__title text-right">أنشطة</h3>
                        <ul class="foot__links text-right">
                            @foreach($categorie_evenements as $categorie_evenement)
                            <li><a href="{{ route('site.evenement_categorie',$categorie_evenement->slug) }}">{{ $categorie_evenement->nom }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- end footer-item -->
                    <div class="col footer-item footer-item1">
                        <img style="height: 150px;
                        padding-left: 20px;" src="{{ asset('site_assets/images/logo2.png')}} " alt="" srcset="">
                    </div><!-- end footer-item -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer-top -->
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-desc">
                            <p>© Copyright 2020 <a href="#">www.lomaa.ma</a></p>
                        </div>
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer-copyright -->
    </section><!-- end footer-area -->
    <!-- ================================
       START FOOTER AREA
================================= -->

    <!-- start back-to-top -->
    <div id="back-to-top">
        <i class="fa fa-angle-up" title="Go top"></i>
    </div>
    <!-- end back-to-top -->

    <!-- Template JS Files -->
    <script src="{{ asset('site_assets/js/jquery.min.js')}} "></script>
    <script src="{{ asset('site_assets/js/bootstrap.min.js')}} "></script>
    <script src="{{ asset('site_assets/js/owl.carousel.min.js')}} "></script>
    <script src="{{ asset('site_assets/js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{ asset('site_assets/js/jquery.waypoints.js')}} "></script>
    <script src="{{ asset('site_assets/js/jquery.counterup.min.js')}} "></script>
    <script src="{{ asset('site_assets/js/jquery.barfiller.js')}} "></script>
    <script src="{{ asset('site_assets/js/lightbox.js')}} "></script>
    <script src="{{ asset('site_assets/js/smooth-scrolling.js')}} "></script>
    <script src="{{ asset('site_assets/js/wow.js')}} "></script>
    <script src="{{ asset('site_assets/js/main.js')}} "></script>
</body>

</html>