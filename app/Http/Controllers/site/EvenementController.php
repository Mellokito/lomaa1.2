<?php

namespace App\Http\Controllers\site;

use App\Evenement;
use App\Categorie_evenement;
use App\Http\Controllers\Controller;

class EvenementController extends Controller
{
    public function evenement_all(){
        
        $data['evenements'] = Evenement::orderBy('created_at','DESC')
                                ->where('valide',true)
                                ->where('publish',true)
                                ->paginate(6);

        return view('site.evenement_all',$data);
    }
    
    public function evenement_categorie($slug){
        $categorie = Categorie_evenement::where('slug',$slug)
                        ->where('valide',true)
                        ->where('publish',true)
                        ->first();
        if(!$categorie){
            return redirect('404');
        }

        $data['categorie'] = $categorie;
        $data['evenements'] = Evenement::where('categorie_id',$categorie->id)
                                ->where('valide',true)
                                ->where('publish',true)
                                ->paginate(6);

        return view('site.evenement_categorie',$data);
    }

    public function evenement_show($slug){
        $evenement = Evenement::where('slug',$slug)
                                ->where('valide',true)
                                ->where('publish',true)
                                ->first();
        if(!$evenement){
            return redirect('404');
        }

        $data['evenements'] = Evenement::where('categorie_id',$evenement->categorie_id)
                            ->where('valide',true)
                            ->where('publish',true)
                            ->where('id','!=',$evenement->id)->orderBy('created_at','DESC')
                            ->take(3)
                            ->get();
                            
        $data['evenement'] = $evenement;
        

        return view('site.evenement_show',$data);
    }
}
