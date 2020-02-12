@extends('layouts.app')
@section('content')
@include('shared.errors_succes')
<form class="m-form m-form--fit m-form--label-align-right" action="{{route('commentaire.update',$commentaire->id)}}"
    method="POST">
    @csrf
    @method('PUT')
    <div class="m-portlet__body">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">Contenu *</label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="m-typeahead">
                        <input class="form-control m-input" type="text" name="contenu" value="{{ $commentaire->contenu }}">
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">Valider oui/non</label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="m-typeahead">
                        <input class="form-control m-input" type="checkbox" name="valide" {{ $commentaire->valide ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="row">
            <div class="col-lg-1">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            <div class="col-lg-1">
                <form action="{{ route('commentaire.destroy', $commentaire->id)}}" method="POST" id="formDelete">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Confirmer cette action ?');" type="submit">
                        <i class="la la-close"></i> &nbsp; Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</form>
@endsection