@extends('layouts.app') 
@section('content')
@include('shared.errors_succes')
         <form class="m-form m-form--fit m-form--label-align-right" action="{{route('compte.update')}}" method="POST"> 
                @csrf 
                @method('PUT')
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Ancien mot de passe *</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="m-typeahead">
                                <input class="form-control m-input" type="password" name="old_password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Nouveau mot de passe *</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="m-typeahead">
                                <input class="form-control m-input" type="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Confirmer nouveau mot de passe *</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="m-typeahead">
                                <input class="form-control m-input" type="password" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
@endsection