@extends('layouts.app_administration')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Liste des Slides</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>


                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Slider</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Liste des slides</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- END: Subheader -->
<div class="m-content">
        @include('shared.errors_succes')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <!-- <h3 class="m-portlet__head-text">
                                    Liste des clients
                                </h3> -->
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="#" data-toggle="modal" data-target="#slider_article" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus-circle"></i>
                                <span>Ajouter article</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item">
                        <a href="#" data-toggle="modal" data-target="#slider_evenement" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus-circle"></i>
                                <span>Ajouter événement</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="list_items">
                <thead>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Ordre</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/uploads/images/'.$slider->sliderable->image) }}" alt="" style="width:100px">
                        </td>
                        <td>
                            {{ $slider->sliderable->titre }}
                        </td>
                        <td>
                            {{ substr($slider->sliderable_type,4) }}
                        </td>
                        <td>
                            {{ $slider->ordre }}
                        </td>
                        <td>
                            {{ $slider->created_at }}
                        </td>
                        <td style="text-align:center;">
                            <span class="dropdown">
                                <a href="#" class="btn m-btn btn-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">
                                
                                    <form action="{{ route('slider.destroy', $slider->id)}}" method="POST" id="formDelete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" onclick="return confirm('Confirmer cette action ?');" type="submit">
                                            <i class="la la-close"></i> &nbsp; Supprimer
                                        </button>
                                    </form>
                                </div>
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
 {{-- //////////////////modal article /////////////////--}}
    <!--begin::Modal-->
    <div class="modal fade" id="slider_article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Liste des articles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{ route('slider.article') }}">
                @csrf
                        <div class="form-group m-form__group row">
                            <label class="col-xl-2 col-lg-2 col-form-label">* Articles :</label>
                            <div class="col-xl-10 col-lg-10">
                                <select class="form-control m-input m_selectpicker" name="slug"
                                    data-live-search="true" title="">
                                    <option value=""></option>
                                    @foreach ($articles as $article)
                                        <option value="{{$article->slug}}">{{ $article->titre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                        <label class="col-xl-2 col-lg-2 col-form-label">* Ordre :</label>
                        <div class="col-xl-4 col-lg-10">
                            <input type="text" class="form-control" name="ordre" id="ordre">
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- ////////////////// fin modal article /////////////////--}}


    {{-- //////////////////modal evenement /////////////////--}}
    <!--begin::Modal-->
    <div class="modal fade" id="slider_evenement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Liste des événements</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{ route('slider.evenement') }}">
                @csrf
                        <div class="form-group m-form__group row">
                            <label class="col-xl-2 col-lg-2 col-form-label">* Evénements :</label>
                            <div class="col-xl-10 col-lg-10">
                                <select class="form-control m-input m_selectpicker" name="slug"
                                    data-live-search="true" title="">
                                    <option value=""></option>
                                    @foreach ($evenements as $evenement)
                                        <option value="{{$evenement->slug}}">{{ $evenement->titre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                        <label class="col-xl-2 col-lg-2 col-form-label">* Ordre :</label>
                        <div class="col-xl-4 col-lg-10">
                            <input type="text" class="form-control" name="ordre" id="ordre">
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- ////////////////// fin modal evenement /////////////////--}}
    <!-- END EXAMPLE TABLE PORTLET-->
</div>

@section('datatable')
<script>
		$("#list_items").dataTable({
			"order": [
				[3, "asc"]
			],
			"language": {
					"sProcessing": "Traitement en cours ...",
					"sLengthMenu": "Afficher _MENU_ lignes",
					"sZeroRecords": "Aucun résultat trouvé",
					"sEmptyTable": "Aucune donnée disponible",
					"sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
					"sInfoEmpty": "Aucune ligne affichée",
					"sInfoFiltered": "(Filtrer un maximum de_MAX_)",
					"sInfoPostFix": "",
					"sSearch": "Chercher:",
					"sUrl": "",
					"sInfoThousands": ",",
					"sLoadingRecords": "Chargement...",
					"oPaginate": {
						"sFirst": "<<", "sLast": ">>", "sNext": ">", "sPrevious": "<"
					},
					"oAria": {
						"sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
					}
					}
			});

			$.fn.datepicker.dates['fr'] = {
			days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
			daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
			daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
			months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"],
			monthsShort: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jui", "Aou", "Sep", "Oct", "Nov", "Dec"],
			today: "Aujourd'hui",
			clear: "Vider",
			format: "dd-mm-yyyy",
			titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
			weekStart: 0
		};


	</script>
@endsection

<script>
    var li  = document.getElementById('slider');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('index_slider');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>
@endsection