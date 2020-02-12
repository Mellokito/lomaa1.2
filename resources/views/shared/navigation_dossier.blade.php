<script>
        @php
            $id_user = Auth::user()->id;
            $user_acces_dossiers = App\User_acces_dossier::select('user_acces_dossiers.*','dossiers.*','dossiers.id as dossier_id')
                ->where('id_user', $id_user)
                ->join('dossiers', 'dossiers.id', '=', 'user_acces_dossiers.id_dossier')
                ->orderby('dossiers.numero_ordre_dossier')
                ->get();
    
                $chemin_dossier = Array();
        @endphp
        @foreach($user_acces_dossiers as $user_acces_dossier)
            @php
            for($i=0 ; $i < count($breadcrumbs) ; $i++){
                if($user_acces_dossier->dossier_id == $breadcrumbs[$i]){
                    for($j=0;$j < count($breadcrumbs)-$i ;$j++){
                        
                        $chemin_dossier[$j] = $breadcrumbs[$i+$j]; 
                    }
                }
            }
            @endphp
        @endforeach

       
        /* /////////////////////////// navigation 1 ////////////////////////*/
        <?php 
    if(isset($chemin_dossier[0])) {
        $niveau_1 = $chemin_dossier[0];
    ?>
    var niveau_1  = document.getElementById(<?= '100'.$niveau_1 ?>);
    niveau_1.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded m-menu__item--active');
    <?php  } ?>
    
    <?php 
    if(isset($chemin_dossier[1])) {
        $niveau_2 = $chemin_dossier[1];
    ?>
    var niveau_2  = document.getElementById(<?= '100'.$niveau_2 ?>);
    niveau_2.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded m-menu__item--active');
    <?php  } ?>

    <?php
    if(isset($chemin_dossier[2])) {
        $niveau_3 = $chemin_dossier[2];
    ?>
    var niveau_3  = document.getElementById(<?= '100'.$niveau_3 ?>);
    niveau_3.setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded m-menu__item--active');
    <?php  } ?>
    
        
        
    </script> 