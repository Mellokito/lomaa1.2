@extends('layouts.app_administration')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Tableau de bord</h3>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">

        <!--Begin::Section-->
        <div class="row">

            <div class="col-xl-12">

                <!--begin:: Widgets/Activity-->
                <div
                    class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text m--font-light">
                                    Activités
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div
                                class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                <div class="m-widget17__chart">
                                    <!-- <canvas id="m_chart_activities"></canvas> -->
                                </div>
                            </div>
                            <div class="m-widget17__stats">
                                <div class="m-widget17__items m-widget17__items-col1">
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-map m--font-brand"></i>
                                        </span>
                                        <span class="m-widget17__subtitle">
                                            Categories
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            @php
                                                $categorie_articles = App\Categorie::all();
                                                $categorie_evenements = App\Categorie_evenement::all();

                                                $total_categories = $categorie_articles->count() + $categorie_evenements->count();
                                            @endphp
                                            {{ $total_categories }} categories
                                        </span>
                                    </div>
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-file-2 m--font-info"></i>
                                        </span>
                                        <span class="m-widget17__subtitle">
                                            Articles
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            @php
                                                $articles = App\Article::all();

                                                $total_articles = $articles->count();
                                            @endphp
                                            {{ $total_articles }} articles
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget17__items m-widget17__items-col2">
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-photo-camera  m--font-success"></i>
                                        </span>
                                        <span class="m-widget17__subtitle">
                                            Medias
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            @php
                                                $image = App\Image::all();
                                                $video = App\Video::all();

                                                $total_media = $image->count() + $video->count();
                                            @endphp
                                            {{ $total_media }} images et videos
                                        </span>
                                    </div>
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-book m--font-danger"></i>
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__subtitle">
                                            Editions
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            @php
                                                $edition = App\Edition::all();

                                                $total_edition = $edition->count();
                                            @endphp
                                            {{ $total_edition }} editions
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Activity-->
            </div>
        </div>

        <!--End::Section-->

    </div>
@endsection
