@extends('layouts.app_site')
@section('content')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <!-- <h2 class="breadcrumb__title">news</h2> -->
                        <!-- <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="index.html">home</a></li>
                        <li>news</li>
                    </ul> -->
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="section-heading blog-heading text-center">

                                    <h2 class="section__title">{{ $categorie->nom }}</h2>

                                </div><!-- end section-heading -->
                            </div><!-- end col-lg-8 -->
                        </div><!-- end row -->
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->
    <!-- ================================
END BREADCRUMB AREA
================================= -->

    <!--================================
         START CAUSES AREA
=================================-->
    <section dir="rtl" class="causes-area upcoming-event-area upcoming-event-area2">
        <div class="container">
            <div class="row blog-content-wrap">
                @foreach($evenements as $evenement)
                <div class="col-lg-4">
                    <div class="blog-content">
                        <div class="blog-item blog-item1">
                            <div class="blog-img">
                                <img src="{{asset('storage/uploads/images/'.$evenement->image)}}" alt="">
                                {{-- <span class="blog__tag blog__tag1">
                                    <span class="date__num-text">6</span>
                                    <span class="date__mon-text">ماي</span>
                                </span> --}}
                            </div>
                            <div class="blog-inner-content">
                                <h3 class="blog__title text-right">
                                    <a href="{{ route('site.evenement_show',$evenement->slug) }}">
                                        {{ $evenement->titre }}
                                    </a>
                                </h3>
                                <ul class="blog__list text-right">
                                    <li class="blog__dot-active">
                                        {{ date('d-m-Y H:i',strtotime($evenement->date)) }} </li>
                                    <li>{{ $evenement->lieu }}</li>
                                </ul>
                            </div>
                        </div><!-- end blog-item -->
                    </div><!-- end blog-content -->
                </div><!-- end col-lg-4 -->
                @endforeach
            </div><!-- end row -->
            {{ $evenements->links() }}
        </div><!-- end container -->
    </section><!-- end causes-area -->
@endsection