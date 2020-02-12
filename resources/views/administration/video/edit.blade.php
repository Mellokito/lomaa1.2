@extends('layouts.app_administration')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Tableau de bord</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Vidéo</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Modifier vidéo</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
    @include('shared.errors_succes')
    <div class="row">
        <div class="col-lg-12">
            <form class="m-form m-form--label-align-left- m-form--state-" id="m_form"
                action="{{route('video.update',$video->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile"
                    id="main_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-progress">

                            <!-- here can place a progress bar-->
                        </div>
                        <div class="m-portlet__head-wrapper">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Modifier Vidéo
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <div class="btn-group">
                                    <button type="submit"
                                        class="btn btn-accent  m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="la la-check"></i>
                                            <span>Enregistrer</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin: Form Body -->
                        <div class="m-portlet__body">
                            <div class="row">
                                <div class="col-xl-12">
                                        <div class="m-form__section m-form__section--first">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Titre :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input class="form-control m-input" type="text" name="titre" value="{{ $video->titre }}" dir="rtl">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Description :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <textarea name="description" class="form-control" id="editor" dir="rtl">{{ $video->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Code youtube :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input class="form-control m-input" type="text" name="code_youtube" value="{{ $video->code_youtube }}" dir="rtl">
                                                </div>
                                            </div>
                                        
                                        </div>
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="m-form__section">
                                        @if($video->image == NULL)
                                        <div class="form-group m-form__group">
                                            <label for="exampleInputEmail1">Image *</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="image">
                                                <label class="custom-file-label" for="customFile">Séléctionner une
                                                    image</label>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Portlet-->
        </div>
    </div>
    
    <div class="row" style="margin-top:20px">
            <div class="col-lg-6">
    
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Image
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
    
                        <!--begin::Section-->
                        <div class="m-section m-section--last">
                            <div class="m-section__content">
    
                                <!--begin::Preview-->
                                    @if($video->image != NULL)
                                    <div class="m-demo__preview"  style="margin-bottom:10px">
                                        <img src="{{asset('storage/uploads/images/'.$video->image)}}"
                                            style="max-width:350px" alt="">
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('video.supprimer_image', $video->slug)}}" class="btn btn-danger"
                                            onclick="return confirm('Confirmer cette action ?');">Supprimer
                                        </a>
                                    </div>
                                    @else
                                    Aucune image
                                    @endif
                            </div>
                        </div>
    
                        <!--end::Section-->
                    </div>
                </div>
            </div>
        </div>
</div>

<script>
    var media  = document.getElementById('media');
    media.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');
    
    var li  = document.getElementById('video');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');
</script>
@endsection