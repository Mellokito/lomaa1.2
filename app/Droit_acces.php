<?php

namespace App;
class Droit_acces
{
    public function liste_categorie($user_id){
        $categorie = Categorie::select('categories.*','categorie_droit_acces.*')
                            ->join('categorie_droit_acces','categorie_droit_acces.categorie_id','categories.id')
                            ->where('categorie_droit_acces.user_id',$user_id)
                            ->get();
        return $categorie;
    }

    public function ajouter_article($user_id,$categorie_id){
        $count = 0;
        $categorie = Categorie::select('categories.*','categorie_droit_acces.*')
                    ->join('categorie_droit_acces','categorie_droit_acces.categorie_id','categories.id')
                    ->where('categorie_droit_acces.user_id',$user_id)
                    ->where('categorie_droit_acces.categorie_id',$categorie_id)
                    ->get();

        if($categorie->count() >=1){
            $count =1;
        }

        if ($count == 0) {    
            return false;         
        } else {
            return true;
        }
    }

    public function liste_categorie_evenement($user_id){
        $categorie = Categorie_evenement::select('categorie_evenements.*','categorie_evenement_droit_acces.*')
                            ->join('categorie_evenement_droit_acces','categorie_evenement_droit_acces.categorie_id','categorie_evenements.id')
                            ->where('categorie_evenement_droit_acces.user_id',$user_id)
                            ->get();
        return $categorie;
    }

    public function ajouter_evenement($user_id,$categorie_id){
        $count = 0;
        $categorie = Categorie_evenement::select('categorie_evenements.*','categorie_evenement_droit_acces.*')
                    ->join('categorie_evenement_droit_acces','categorie_evenement_droit_acces.categorie_id','categorie_evenements.id')
                    ->where('categorie_evenement_droit_acces.user_id',$user_id)
                    ->where('categorie_evenement_droit_acces.categorie_id',$categorie_id)
                    ->get();

        if($categorie->count() >=1){
            $count =1;
        }

        if ($count == 0) {    
            return false;         
        } else {
            return true;
        }
    }
}
