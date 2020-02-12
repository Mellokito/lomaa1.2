<?php

namespace App\Http\Controllers\site;

use App\Edition;
use App\Http\Controllers\Controller;

class EditionController extends Controller
{
    public function edition_all(){
        $data['editions'] = Edition::orderBy('created_at','DESC')
                            ->where('valide',true)
                            ->where('publish',true)                    
                            ->paginate(6);

        return view('site.edition_all',$data);
    }

    public function edition_show($slug){
        $edition = Edition::where('slug',$slug)
            ->where('valide',true)
            ->where('publish',true)
            ->first();

        if(!$edition){
            return redirect('404');
        }

        $data['editions'] = Edition::where('id','!=',$edition->id)
                            ->where('valide',true)
                            ->where('publish',true)                    
                            ->orderBy('created_at','DESC')
                            ->take(3)
                            ->get();

        $data['edition'] = $edition;
        

        return view('site.edition_show',$data);
    }
}
