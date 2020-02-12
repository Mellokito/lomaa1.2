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
                        <span class="m-nav__link-text">Evenement</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Modifier evenement</span>
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
                action="{{route('evenement.update',$evenement->slug)}}" method="POST" enctype="multipart/form-data">
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
                                        Modifier Evenement
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
                                                    <input class="form-control m-input" type="text" name="titre" value="{{ $evenement->titre }}" dir="rtl">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Contenu :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <textarea name="contenu" class="form-control" id="editor" dir="rtl">{{ $evenement->contenu }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Lieu :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input class="form-control m-input" type="text" name="lieu" value="{{ $evenement->lieu }}" dir="rtl">
                                                </div>
                                            </div>
                                        
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Intervenant :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input class="form-control m-input" type="text" name="intervenant" value="{{ $evenement->intervenant }}" dir="rtl">
                                                </div>
                                            </div>
                                        
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Catégorie :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <select class="form-control m-input m_selectpicker" name="categorie" data-live-search="true" title="">
                                                        <option value="{{$evenement->categorie_id}}">{{ $evenement->categorie->nom }}</option>
                                                        @foreach ($categories as $categorie)
                                                        <option value="{{$categorie->id}}">{{ $categorie->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-2 col-sm-12">* Date :</label>
                                                <div class="col-lg-3 col-md-9 col-sm-12">
                                                    <div class="input-group date">
                                                        <input name="date" type="text" class="form-control m-input" readonly placeholder=""
                                                            id="m_datepicker_2" value="{{ date('d-m-Y',strtotime($evenement->date)) }}" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-calendar-check-o"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-2 col-sm-12">* Heure :</label>
                                                <div class="col-lg-3 col-md-9 col-sm-12">
                                                    <div class="input-group timepicker">
                                                        <input class="form-control m-input" id="timepicker" readonly placeholder="00:00" type="text"
                                                            name="heure" value="{{ date('H:i',strtotime($evenement->date)) }}" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-clock-o"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">Adresse :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <textarea name="adresse" class="form-control"  dir="rtl">
                                                        {{ $evenement->adresse }}
                                                    </textarea>
                                                </div>
                                            </div>
    
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">Site :</label>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input class="form-control m-input" type="text" name="site"
                                                        value="{{ $evenement->site }}">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="m-form__section">
                                        @if($evenement->image == NULL)
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
            <div class="col-lg-12">
    
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
                                    @if($evenement->image != NULL)
                                    <div class="m-demo__preview"  style="margin-bottom:10px">
                                        <img src="{{asset('storage/uploads/images/'.$evenement->image)}}"
                                            style="max-width:350px" alt="">
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('evenement.supprimer_image', $evenement->slug)}}" class="btn btn-danger"
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
@section('ckeditor')
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor' );
</script>
@endsection
@section('timepicker')
<script>
    $('#timepicker').timepicker({ 
			minuteStep: 1, 
			defaultTime: '', 
			showSeconds: false, 
			showMeridian: false, 
			snapToStep: true 
		});
		$('#timepicker2').timepicker({ 
			minuteStep: 1, 
			defaultTime: '', 
			showSeconds: false, 
			showMeridian: false, 
			snapToStep: true 
		});
</script>
@endsection
<script>
    var li  = document.getElementById('evenement');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');
</script>
@endsection