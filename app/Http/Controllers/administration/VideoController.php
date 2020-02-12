<?php

namespace App\Http\Controllers\administration;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('ajoutArticle');
        $this->middleware('accesVideo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'Administrateur'){
            $data['videos'] = Video::all();
        }else{
            $data['videos'] = Video::where('user_id',Auth::user()->id)->get();
        }
        
        return view('administration.video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|min:2|max:255',
            'description' => 'required|min:2|string',
            'code_youtube' => 'required|min:2|string',
            'image' => 'required|image|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $storage_image = false;
            if ($request->hasFile("image")) {
                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $filename_image = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($image->storeAs('uploads/images', $filename_image)) {
                    $storage_image = true;
                };
            }

            $video = new Video();
            $video->titre = $request->titre;
            $video->description = $request->description;
            $video->code_youtube = $request->code_youtube;

            $video->slug = substr(encrypt(time() . '-' .$request->titre),9,20);
            if ($storage_image) {
                $video->image = $filename_image;
            }

            $video->save(); 
            return redirect()->route('video.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $video = Video::where('slug',$slug)->first();
        if (!$video) {
            return redirect('404');
        }

        $data['video'] = $video;        

        return view('administration.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $video = Video::where('slug',$slug)->first();
        if (!$video) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|min:2|max:255',
            'description' => 'required|min:2|string',
            'code_youtube' => 'required|min:2|string',
            'image' => 'nullable|image|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
            $storage_image = false;
            if ($request->hasFile("image")) {
                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $filename_image = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($image->storeAs('uploads/images', $filename_image)) {
                    $storage_image = true;
                };
            }

            $video->titre = $request->titre;
            $video->description = $request->description;
            $video->code_youtube = $request->code_youtube;

            $video->slug = substr(encrypt(time() . '-' .$request->titre),9,20);
            if ($storage_image) {
                $video->image = $filename_image;
            }
            
            if($video->image == NULL){
                return redirect()->back()->withInput($request->all)->with('error', 'Vous devez ajouter une image');
            }


            $video->update(); 
            return redirect()->route('video.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $video = Video::where('slug',$slug)->first();
        if (!$video) {
            return redirect('404');
        }
        
        $video->delete();

        return redirect()->route('video.index')->with('success', 'Suppression effectuée');
    }

    public function supprimer_image($slug)
    {
        $video = Video::where('slug',$slug)->first();
         if(!$video){
            return redirect('404');
        }
        Storage::delete('uploads/images/'.$video->image);
        $video->image = null;
        $video->update();
        return redirect()->back()->with('success', 'Image supprimée');
    }

    public function valider($slug){
        $video = Video::where('slug',$slug)->first();
        if(!$video){
           return redirect('404');
        }

        if($video->valide == false){
            $video->valide = true;
            $video->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $video->valide = false;
            $video->publish = false;
            $video->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier($slug){
        $video = Video::where('slug',$slug)->first();
        if(!$video){
           return redirect('404');
        }
        
        if($video->publish == false){
            $video->publish = true;
            $video->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $video->publish = false;
            $video->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }

}
