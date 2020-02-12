<?php

namespace App\Http\Controllers\administration;

use App\Article;
use App\Evenement;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('checkAdministrateur');
    }

    public function index()
    {
        $slider_article = Slider::select('sliderable_id')->where('sliderable_type','App\Article')->get();
        $T_article = array();
        for($i=0;$i < $slider_article->count(); $i++){
            $T_article[] = $slider_article[$i]->sliderable_id;
        }

        // Evenement
        $slider_evenement = Slider::select('sliderable_id')->where('sliderable_type','App\Evenement')->get();
        $T_evenement = array();
        for($i=0;$i < $slider_evenement->count(); $i++){
            $T_evenement[] = $slider_evenement[$i]->sliderable_id;
        }

        // dd($T_article);
        $data['sliders'] = Slider::all();
        $data['articles'] = Article::where('valide',true)->where('publish',true)->whereNotIn('id',$T_article)->get();
        $data['evenements'] = Evenement::where('valide',true)->where('publish',true)->whereNotIn('id',$T_evenement)->get();

        return view('administration.slider.index', $data);
    }

    public function slider_article(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ordre' => 'required|numeric|unique:sliders,ordre',
            'slug' => 'required|string|exists:articles,slug',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        $slug = $request->slug;

        $article = Article::where('slug', $slug)->first();
        if (!$article) {
            return redirect('404');
        }
        if ($request->isMethod('post')) {
            if ($article->valide && $article->publish) {
                $article->slider()->create([
                    'ordre' => $request->ordre,
                ]);
                return redirect()->back()->with('success', 'Article a été ajouter au slider');
            } else {
                return redirect()->back()->with('error', 'Cet article n\'est pas publié');
            }
        }
    }

    public function slider_evenement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ordre' => 'required|numeric|unique:sliders,ordre',
            'slug' => 'required|string|exists:evenements,slug',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        $slug = $request->slug;
        $evenement = Evenement::where('slug',$slug)->first();
         if(!$evenement){
            return redirect('404');
        }

        if ($request->isMethod('post')) {
            if ($evenement->valide && $evenement->publish) {
                $evenement->slider()->create([
                    'ordre' => $request->ordre,
                ]);
                return redirect()->back()->with('success', 'Evenement a été ajouter au slider');
            } else {
                return redirect()->back()->with('error', 'Cet evenement n\'est pas publié');
            }
        }
        
    }
    public function destroy(Slider $slider)
    {
        $slider->delete();
          
        return redirect()->route('slider.index')->with('success', 'Suppression effectuée');
    }
}
