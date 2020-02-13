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
                        <span class="m-nav__link-text">Commentaire</span>
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
                            <div>Nom :  <strong>{{ $commentaire->nom }}</strong> </div>
                                <div class="ml-5">Email :  <strong>{{ $commentaire->email }}</strong> </div>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <div class="dropdown dropright">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if(!$commentaire->publish)
                                <a class="dropdown-item" href="{{route('commentaire.valider',$commentaire->id)}}" 
                                    onclick="return confirm('Confirmer cette action ?');">
                                    <i class="la la-edit"></i> &nbsp; {{ $commentaire->valide ? 'Annuler validation' : 'Valider'}}
                                </a>
                                @endif
                                @if(Auth::user()->role == 'Super Administrateur')
                                    @if($commentaire->valide)
                                    <a class="dropdown-item" href="{{route('commentaire.publier',$commentaire->id)}}" 
                                        onclick="return confirm('Confirmer cette action ?');">
                                        <i class="la la-edit"></i> &nbsp; {{ $commentaire->publish ? 'Annuler publication' : 'Publier'}}
                                    </a>
                                    @endif
                                @endif
                            <form action="{{ route('commentaire.destroy', $commentaire->id)}}" method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" onclick="return confirm('Confirmer cette action ?');" type="submit">
                                    <i class="la la-close"></i> &nbsp; Supprimer
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Form Body -->
                <div class="m-portlet__body">
                    
                    <div class="text-right">
                        <h5>Commentaire : </h5>
                        <p>{{ $commentaire->contenu}}</p>
                    </div>
                    
                </div>
            </div>
    </div>
</div>



<script>
    var li  = document.getElementById('article');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');
</script>


@endsection