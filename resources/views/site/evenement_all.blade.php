@extends('layouts.app_site')
@section('content')

<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="section-heading blog-heading text-center">
    
                                    <h2 class="section__title">جميع المواعيد</h2>
    
                                </div><!-- end section-heading -->
                            </div><!-- end col-lg-8 -->
                        </div><!-- end row -->
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->

<section dir="rtl" class="causes-area upcoming-event-area">
        <div class="container">
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
                                <li class="blog__dot-active">{{ date('d-m-Y H:i',strtotime($event->date_debut)) }} to {{ date('d-m-Y H:i',strtotime($event->date_fin)) }}</li>
                                    <li>{{ $event->lieu }}</li>
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