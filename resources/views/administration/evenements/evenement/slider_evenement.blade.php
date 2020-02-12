@if(Auth::user()->role == 'Administrateur')
            <div class="col-lg-6">
                <div class="m-portlet">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Slider
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
        
                            <!--begin::Section-->
                        <div class="m-section m-section--last">
                            @if(Empty($evenement->slider))
{{-- //////////////////////////Ajouter au slider//////////////////////// --}}
                            <div class="m-section__content">
                                <!--begin::Preview-->
                                    <form class="m-form m-form--label-align-left- m-form--state-" id="m_form"
                                        action="{{route('evenement.slider',$evenement->slug)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="m-form__section m-form__section--first">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">* Ordre :</label>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input class="form-control m-input" type="text" name="ordre">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                                <button type="submit"
                                                    class="btn btn-accent  m-btn m-btn--icon m-btn--wide m-btn--md">
                                                    <span>
                                                        <i class="la la-check"></i>
                                                        <span>Ajouter au slider</span>
                                                    </span>
                                                </button>
                                            </div>
                                    </form>
                            </div>
                            @else
{{-- //////////////////////////Supprimer du slider//////////////////////// --}}
                            <div class="m-section__content">
                                <!--begin::Preview-->
                                    <form class="m-form m-form--label-align-left- m-form--state-" id="m_form"
                                        action="{{route('evenement.supprimer_slider',$evenement->slug)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                                <button type="submit"
                                                    class="btn btn-danger  m-btn m-btn--icon m-btn--wide m-btn--md">
                                                    <span>
                                                        <span>Enlever du slider</span>
                                                    </span>
                                                </button>
                                            </div>
                                    </form>
                            </div>
                            @endif
                            </div>
        
                            <!--end::Section-->
                        </div>
                    </div>
    
                <!--end::Portlet-->
            </div>
            @endif