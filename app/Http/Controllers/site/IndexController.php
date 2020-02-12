<?php

namespace App\Http\Controllers\site;

use App\Article;
use App\Categorie;
use App\Categorie_evenement;
use App\Edition;
use App\Evenement;
use App\Http\Controllers\Controller;
use App\Image;
use App\Slider;
use App\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['slider'] = Slider::orderBy('created_at','DESC')->take(3)->get();

        $data['categorie'] = Categorie::where('valide',true)
                                ->where('publish',true)
                                ->get();

        $data['articles'] = Article::orderBy('created_at','DESC')
                            ->where('valide',true)
                            ->where('publish',true)
                            ->take(3)
                            ->get();

        $data['evenements'] = Evenement::orderBy('created_at','DESC')
                                ->where('valide',true)
                                ->where('publish',true)
                                ->take(3)->get();

        $data['editions'] = Edition::orderBy('created_at','DESC')
                                ->where('valide',true)
                                ->where('publish',true)
                                ->take(2)->get();

        $data['video'] = Video::orderBy('created_at','DESC')
                            ->where('valide',true)
                            ->where('publish',true)
                            ->first();

        $data['images'] = Image::orderBy('created_at','DESC')
                            ->where('valide',true)
                            ->where('publish',true)
                            ->get();


        return view('site.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('site.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
