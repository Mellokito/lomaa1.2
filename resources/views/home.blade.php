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
                                            <i class="flaticon-user m--font-brand"></i>
                                        </span>
                                        <span class="m-widget17__subtitle">
                                            Categories
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            160 categories
                                        </span>
                                    </div>
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-paper-plane m--font-info"></i>
                                        </span>
                                        <span class="m-widget17__subtitle">
                                            Articles
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            72 articles
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget17__items m-widget17__items-col2">
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-pie-chart m--font-success"></i>
                                        </span>
                                        <span class="m-widget17__subtitle">
                                            Medias
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            350 images et videos
                                        </span>
                                    </div>
                                    <div class="m-widget17__item">
                                        <span class="m-widget17__icon">
                                            <i class="flaticon-truck m--font-danger"></i>
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__subtitle">
                                            Editions
                                        </span>
                                        <span style="font-size: 1.85rem;" class="m-widget17__desc">
                                            280 editions
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
