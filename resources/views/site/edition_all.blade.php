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
    
                                    <h2 class="section__title">جميع الاصدارات</h2>
    
                                </div><!-- end section-heading -->
                            </div><!-- end col-lg-8 -->
                        </div><!-- end row -->
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end hero-area -->

<section dir="rtl" class="causes-area upcoming-event-area mb-5">
        <div class="container">
            <div class="row blog-content-wrap">
                @foreach($editions as $edition)
                <div class="col-lg-3 text-center">
                        <div class="package-item">
                            <div class="package-top">
                                <div class="package__img">
                                    <img src="{{asset('storage/uploads/images/'.$edition->image)}}" alt="" style="width:200px">
                                    <h5>{{ $edition->titre }}</h5>
                                </div>
                            </div>
                            <div class="package-bottom text-right mt-5">
                            
                                <p class="package__desc">
                                    {!! substr($edition->description,0,250) !!}
                                </p>
                                <a href="{{ route('site.edition_show',$edition->slug) }}" class="theme-btn mt-5">المزيد</a>
                            </div>
                        </div><!-- end package-item -->
                    </div><!-- end col-lg-6 -->
                @endforeach
            </div><!-- end row -->
            {{ $editions->links() }}
        </div><!-- end container -->
    </section><!-- end causes-area -->
@endsection