@extends('layouts.app_site')
@section('content')
<section dir="rtl" class="causes-detail-area news-detail-area">
        <div class="container">
            <div class="row blog-content-wrap">

                
                <div class="col-lg-8">
                    <div class="blog-content">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{asset('storage/uploads/images/'.$article->image)}}" alt="">
                            <span class="blog__date text-right">{{ date('d-m-Y',strtotime($article->date)) }}</span>
                            </div>
                            <div class="blog-inner-content ">
                                <div class="inner-causes-box ml-auto">
                                    <h3 class="blog__title text-right ">
                                        {{ $article->titre }}
                                    </h3>
                                    <div class="row mt-3 text-right">
                                        <div class="col-lg-12 col-sm-12 ml-auto ">
                                            <ul class="blog__list float-right">
                                                <li class="blog__dot-active ml-3">{{ $article->auteur }}</li>
                                                <li>
                                                    <a href="#comments">تعليقات {{$article->commentaire->count()}}</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="blog-inner-content-2 text-justify">
                                    {!! $article->contenu !!}


                                <div class="news-tags">

                                    <div class="news-tag-item-right">
                                        <p class="text-right mb-2" style="font-weight: bold;
                                        font-size: 20px;"> شارك المقال</p>
                                        <ul class="news-share">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="comments" class="single-comment text-right">

                                    <div  class="comment__boxed">
                                        <h3 class="single__comment-title">التعليقات</h3>
                                        <ul class="comments-list">
                                            <li>
                                                @foreach($commentaires as $commentaire)
                                                <div class="comment">
                                                    <div class="comment-body ml-auto">
                                                        <div class="meta-data">
                                                            <h4 class="comment__author">

                                                                <span class="comment__date mr-3">{{ date('d-m-Y H:i',strtotime($commentaire->created_at)) }}</span>
                                                                {{ $commentaire->nom }}
                                                            </h4>
                                                        </div>
                                                        <div class="comment-content">

                                                            <p class="comment__text">
                                                                {!! $commentaire->contenu !!}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div><!-- end comment -->
                                                @endforeach
                                            </li>
                                        </ul>
                                        {{ $commentaires->links() }}
                                    </div><!-- end comment__boxed -->
                                    <div class="comment__form form-shared">
                                        <h3 class="single__comment-title">أترك تعليق</h3>
                                        <form action="{{ route('site.ajouter_commentaire',$article->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input name="nom" type="text" class="form-control text-right"
                                                            placeholder="الاسم الكامل">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input name="email" type="email" class="form-control text-right"
                                                            placeholder="البريد الاكتروني">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea name="contenu" class="textarea text-right" name="message"
                                                            placeholder=" ... تعليقك"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="theme-btn submit__btn">أضف</button>
                                                </div>
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end comment__form -->
                                </div><!-- end single__comments -->
                            </div><!-- end blog-inner-content-2 -->
                        </div><!-- end blog-item -->
                    </div><!-- end blog-content -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar-shared">
                        <div class="side-widget text-right ">
                            <h2 class="widget__title">أخر المقالات</h2>
                            @foreach($articles as $value)
                            <div class="author-box recent-donate-item">
                
                                <div class="author__detail ml-auto">
                                    <h4 class="author__title author__title2">
                                        <a href="{{ route('site.article_show',$value->slug) }}">
                                            {{ $value->titre }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="author__avatar">
                                    <img src="{{asset('storage/uploads/images/'.$value->image)}}" alt="" style="width:80px">
                                </div>
                            </div><!-- end author-box -->
                            @endforeach
                        </div><!-- end side-widget -->
                    </div><!-- end sidebar-shared -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end causes-area -->
@endsection