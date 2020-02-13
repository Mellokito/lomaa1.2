@extends('layouts.app_administration')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Liste des Commentaires</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>


                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Commentaires</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Liste des commentaires</span>
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
                    <h3 class="m-portlet__head-text">
                        {{ $article->titre }}
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    
                    <li class="m-portlet__nav-item"></li>

                </ul>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="list_items">
                <thead>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Commentaire</th>
                    <th>Validé</th>
                    <th>Publié</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($commentaires as $commentaire)
                    <tr>
                        <td>
                            {{ $commentaire->nom }}
                        </td>
                        <td>
                            {{ $commentaire->email }}
                        </td>
                        <td>
                            {{ $commentaire->contenu }}
                        </td>
                        <td>
                            <span class="m-badge m-badge--{{ $commentaire->valide ? 'success' : 'danger'}} m-badge--wide">{{ $commentaire->valide ? 'oui' : 'non' }}</span>
                        </td>
                        <td>
                            <span class="m-badge m-badge--{{ $commentaire->publish ? 'success' : 'danger'}} m-badge--wide">{{ $commentaire->publish ? 'oui' : 'non' }}</span>
                        </td>
                        <td>
                            {{ $commentaire->created_at }}
                        </td>
                        <td style="text-align:center;">
                            <span class="dropdown">
                                <a href="#" class="btn m-btn btn-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">
                                        <a class="dropdown-item" href="{{route('commentaire.show',$commentaire->id)}}" >
                                            <i class="la la-eye"></i> &nbsp; Voir le commentaire
                                        </a>
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
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- END EXAMPLE TABLE PORTLET-->
</div>

@section('datatable')
<script>
		$("#list_items").dataTable({
			"order": [
				[5, "desc"]
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
    var li  = document.getElementById('article');
    li.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open');

    var active  = document.getElementById('index_article');
    active.setAttribute('class', 'm-menu__item m-menu__item--active');
</script>
@endsection