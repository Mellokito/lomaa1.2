<?php

namespace App\Http\Controllers\administration;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('ajoutArticle');
        $this->middleware('accesEdition');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'Super Administrateur' || $user->role == 'Administrateur'){
            $data['editions'] = Edition::all();
        }else{
            $data['editions'] = Edition::where('user_id',Auth::user()->id)->get();
        }
        
        return view('administration.edition.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.edition.create');
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
            'auteur' => 'required|min:2|string',
            'date_publication' => 'required|date',
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

            $edition = new Edition();
            $edition->titre = $request->titre;
            $edition->description = $request->description;
            $edition->auteur = $request->auteur;
            if(empty($request->date_publication)){
                $edition->date = NULL;
            }else{
                $edition->date_publication = date('Y-m-d', strtotime($request->date_publication));
            }
            $edition->slug = substr(encrypt(time() . '-' .$request->titre),9,20);
            if ($storage_image) {
                $edition->image = $filename_image;
            }

            $edition->save(); 
            return redirect()->route('edition.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function show(Edition $edition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $edition = Edition::where('slug',$slug)->first();
        if (!$edition) {
            return redirect('404');
        }

        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur') && $edition->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }

        $data['edition'] = $edition;        

        return view('administration.edition.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $edition = Edition::where('slug',$slug)->first();
        if (!$edition) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|min:2|max:255',
            'description' => 'required|min:2|string',
            'auteur' => 'required|min:2|string',
            'date_publication' => 'required|date',
            'image' => 'required|image|max:2000',
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

            $edition->titre = $request->titre;
            $edition->description = $request->description;
            $edition->auteur = $request->auteur;
            if(empty($request->date_publication)){
                $edition->date = NULL;
            }else{
                $edition->date_publication = date('Y-m-d', strtotime($request->date_publication));
            }
            $edition->slug = substr(encrypt(time() . '-' .$request->titre),9,20);
            if ($storage_image) {
                $edition->image = $filename_image;
            }
            
            if($edition->image == NULL){
                return redirect()->back()->withInput($request->all)->with('error', 'Vous devez ajouter une image');
            }


            $edition->update(); 
            return redirect()->route('edition.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $edition = Edition::where('slug',$slug)->first();
        if (!$edition) {
            return redirect('404');
        }

        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur') && $edition->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        $edition->delete();

        return redirect()->route('edition.index')->with('success', 'Suppression effectuée');
    }

    public function supprimer_image($slug)
    {
        $edition = Edition::where('slug',$slug)->first();
         if(!$edition){
            return redirect('404');
        }

        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur') && $edition->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }

        Storage::delete('uploads/images/'.$edition->image);
        $edition->image = null;
        $edition->update();
        return redirect()->back()->with('success', 'Image supprimée');
    }

    public function valider($slug){
        $edition = Edition::where('slug',$slug)->first();
        if(!$edition){
           return redirect('404');
        }

        if($edition->valide == false){
            $edition->valide = true;
            $edition->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $edition->valide = false;
            $edition->publish = false;
            $edition->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier($slug){
        $edition = Edition::where('slug',$slug)->first();
        if(!$edition){
           return redirect('404');
        }
        
        if($edition->publish == false){
            $edition->publish = true;
            $edition->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $edition->publish = false;
            $edition->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
}
