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

                                <h2 class="section__title">{{ $categorie->nom }}</h2>

                            </div><!-- end section-heading -->
                        </div><!-- end col-lg-8 -->
                    </div><!-- end row -->
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->


    <section dir="rtl" class="causes-area mb-5">
        <div class="container">
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
            {{ $articles->links() }}
        </div><!-- end container -->
    </section>
@endsection