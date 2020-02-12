@extends('layouts.app_site')
@section('content')
<section class="event-detail-area " style="margin-top:70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-content">
                        <div class="blog-item">
                            <div class="blog-img text-center">
                                <img src="{{asset('storage/uploads/images/'.$edition->image)}}" alt="" style="width:250px">
                                {{-- <span class="blog__tag">
                                    <span class="date__num-text">9</span>
                                    <span class="date__mon-text">mar</span>
                                </span> --}}
                            </div>
                        </div><!-- end blog-item -->
                    </div><!-- end blog-content -->
                </div><!-- end col-lg-12 -->

                <div class="col-lg-4">
                    <div class="event-detail-sidebar">
                        <div class="event-detail-item">
                            <h3 class="event__title">معلومات عن الاصدار</h3>
                            <ul class="event__list text-right">
                                <li>
                                    {{ date('d-m-Y',strtotime($edition->date_publication)) }}
                                    <span>: تاريخ الاصدار</span>
                                </li>
                                <li>
                                    {{ $edition->auteur }}
                                    <span>: الكاتب</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end col-lg-4 -->
                <div class="col-lg-8">
                    <div class="event-detail-content">
                        <div class="event-detail-item text-right">
                            <h3 class="event__title text-right">{{ $edition->titre   }}</h3>
                            {!! $edition->description !!}

                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end causes-area -->
@endsection