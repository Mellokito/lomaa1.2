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
                        <span class="m-nav__link-text">Evénement</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
    @include('shared.errors_succes')
    <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-progress">

                    <!-- here can place a progress bar-->
                </div>
                <div class="m-portlet__head-wrapper">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        @if(Auth::user()->role == 'Administrateur')
                        <div class="dropdown dropright">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('evenement.valider',$evenement->slug)}}" 
                                    onclick="return confirm('Confirmer cette action ?');">
                                    <i class="la la-edit"></i> &nbsp; {{ $evenement->valide ? 'Annuler validation' : 'Valider'}}
                                </a>
                                @if($evenement->valide)
                                <a class="dropdown-item" href="{{route('evenement.publier',$evenement->slug)}}" 
                                    onclick="return confirm('Confirmer cette action ?');">
                                    <i class="la la-edit"></i> &nbsp; {{ $evenement->publish ? 'Annuler publication' : 'Publier'}}
                                </a>
                                @endif
                            <a class="dropdown-item" href="{{route('evenement.edit',$evenement->slug)}}">
                                <i class="la la-edit"></i> &nbsp; Modifier
                            </a>
                            <form action="{{ route('evenement.destroy', $evenement->slug)}}" method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" onclick="return confirm('Confirmer cette action ?');" type="submit">
                                    <i class="la la-close"></i> &nbsp; Supprimer
                                </button>
                            </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Form Body -->
                <div class="m-portlet__body" dir="rtl">
                    <div class="text-center">
                        <img style="width:600px" src="{{ asset('storage/uploads/images/'.$evenement->image) }}" alt="">
                    </div>
                    <div class="text-right mt-5" dir="rtl">
                        <h2>{{ $evenement->titre }}</h2>
                        <span>{{ $evenement->auteur }}</span>
                        <p style="width:70%">{!! $evenement->contenu !!}</p>
                    </div>
                    
                </div>
            </div>
    </div>
</div>



<script>
    var li  = document.getElementById('evenement');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');
</script>


@endsection