<?php

namespace App\Http\Controllers\administration;

use App\Categorie_evenement;
use App\Droit_acces;
use App\Http\Controllers\Controller;
use Validator;

use App\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('ajoutArticle');
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
            $data['evenements'] = Evenement::all();
        }else{
            $data['evenements'] = Evenement::where('user_id',Auth::user()->id)->get();
        }
        
        return view('administration.evenements.evenement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        //////////DROIT ACCES /////////////
        if($user->role == 'Administrateur'){
            $data['categories'] = Categorie_evenement::all();
        }else{
            $droit_acces = new Droit_acces();
            $data['categories'] = $droit_acces->liste_categorie_evenement($user->id);
        }
        //////////DROIT ACCES /////////////

        return view('administration.evenements.evenement.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|min:2|max:255',
            'contenu' => 'required|min:2|string',
            'date' => 'required|date',
            'image' => 'required|image|max:2000',
            'categorie' => 'required|exists:categorie_evenements,id',
            'lieu' => 'required|min:2|string',
            'intervenant' => 'required|min:2|string',
            'adresse' => 'nullable|min:2|string',
            'site' => 'nullable|min:2|string',
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

            $evenement = new Evenement();

            $evenement->titre = $request->titre;
            $evenement->contenu = $request->contenu;
            $evenement->lieu = $request->lieu;
            $evenement->intervenant = $request->intervenant;
            $evenement->slug = substr(encrypt(time() . '-' .$request->titre),9,20);
            $evenement->user_id = Auth::user()->id;
            if ($storage_image) {
                $evenement->image = $filename_image;
            }
            ///////////DROIT ACCES//////////////////
            if($user->role == 'Administrateur'){
                $evenement->categorie_id = $request->categorie;
            }else{
                $droit_acces = new Droit_acces();

                if($droit_acces->ajouter_evenement($user->id,$request->categorie)){
                    $evenement->categorie_id = $request->categorie;
                }else{
                    return redirect()->back()->with('error', 'Vous n\'avez pas le droit d\'ajouter des événements dans cette catégorie :) ');
                }
            }
            ///////////DROIT ACCES//////////////////

            /////////// date //////////////
            if(empty($request->date)){
                $evenement->date = NULL;
            }else{
                $evenement->date = date('Y-m-d', strtotime($request->date)) . ' ' . date('H:i:s', strtotime($request->heure));
            }
            ///////////////////
            $evenement->adresse = $request->adresse;
            $evenement->site = $request->site;

            $evenement->save();
            return redirect()->route('evenement.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(Auth::user()->role != 'Administrateur' && $evenement->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $evenement = Evenement::where('slug',$slug)->first();
        if (!$evenement) {
            return redirect('404');
        }

        $data['evenement'] = $evenement;

        return view('administration.evenements.evenement.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();
        $evenement = Evenement::where('slug',$slug)->first();
        if (!$evenement) {
            return redirect('404');
        }

        if($user()->role != 'Administrateur' && $evenement->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }

        $data['evenement'] = $evenement;
        

        //////////DROIT ACCES /////////////
        if($user->role == 'Administrateur'){
            $data['categories'] = Categorie_evenement::all();
        }else{
            $droit_acces = new Droit_acces();
            $data['categories'] = $droit_acces->liste_categorie_evenement($user->id);
        }
        //////////DROIT ACCES /////////////

        return view('administration.evenements.evenement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $user = Auth::user();
        $evenement = Evenement::where('slug',$slug)->first();
        if (!$evenement) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|min:2|max:255',
            'contenu' => 'required|min:2|string',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2000',
            'categorie' => 'required|exists:categorie_evenements,id',
            'lieu' => 'required|min:2|string',
            'intervenant' => 'required|min:2|string',
            'adresse' => 'nullable|min:2|string',
            'site' => 'nullable|min:2|string',
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

            $evenement->titre = $request->titre;
            $evenement->contenu = $request->contenu;
            $evenement->lieu = $request->lieu;
            $evenement->intervenant = $request->intervenant;
            $evenement->user_id = Auth::user()->id;
            if ($storage_image) {
                $evenement->image = $filename_image;
            }
            
            ///////////DROIT ACCES//////////////////
            if($user->role == 'Administrateur'){
                $evenement->categorie_id = $request->categorie;
            }else{
                $droit_acces = new Droit_acces();

                if($droit_acces->ajouter_evenement($user->id,$request->categorie)){
                    $evenement->categorie_id = $request->categorie;
                }else{
                    return redirect()->back()->with('error', 'Vous n\'avez pas le droit d\'ajouter des événements dans cette catégorie :) ');
                }
            }
            ///////////DROIT ACCES//////////////////

            /////////// date //////////////
            if(empty($request->date)){
                $evenement->date = NULL;
            }else{
                $evenement->date = date('Y-m-d', strtotime($request->date)) . ' ' . date('H:i:s', strtotime($request->heure));
            }
            ///////////////////
            $evenement->adresse = $request->adresse;
            $evenement->site = $request->site;


            if($evenement->image == NULL){
                return redirect()->back()->withInput($request->all)->with('error', 'Vous devez ajouter une image');
            }
            $evenement->update();
            return redirect()->route('evenement.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $evenement = Evenement::where('slug',$slug)->first();
        if (!$evenement) {
            return redirect('404');
        }

        if($user()->role != 'Administrateur' && $evenement->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        $evenement->delete();
        $evenement->slider()->delete();
        return redirect()->route('evenement.index')->with('success', 'Suppression effectuée');
    }


    public function supprimer_image($slug)
    {
        $evenement = Evenement::where('slug',$slug)->first();
         if(!$evenement){
            return redirect('404');
        }

        if($user()->role != 'Administrateur' && $evenement->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        Storage::delete('uploads/images/'.$evenement->image);
        $evenement->image = null;
        $evenement->update();
        return redirect()->back()->with('success', 'Image supprimée');
    }

    public function slider(Request $request,$slug)
    {
        $validator = Validator::make($request->all(), [
            'ordre' => 'required|numeric|unique:sliders,ordre',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }
        $evenement = Evenement::where('slug',$slug)->first();
         if(!$evenement){
            return redirect('404');
        }
        
        if($evenement->valide && $evenement->publish){
            $evenement->slider()->create([
            'ordre' => $request->ordre,
            ]);
            return redirect()->back()->with('success', 'Evenement a été ajouter au slider');
        }else{
            return redirect()->back()->with('error', 'Cet événement n\'est pas publié');
        }
        
    }

    public function supprimer_slider($slug)
    {
        $evenement = Evenement::where('slug',$slug)->first();
         if(!$evenement){
            return redirect('404');
        }
        
        $evenement->slider()->delete();
        return redirect()->back()->with('success', 'Evenement a été supprimer du slider');
    }

    public function valider($slug){
        $evenement = Evenement::where('slug',$slug)->first();
        if(!$evenement){
           return redirect('404');
        }

        if($evenement->valide == false){
            $evenement->valide = true;
            $evenement->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $evenement->valide = false;
            $evenement->publish = false;
            $evenement->update();
            $evenement->slider()->delete();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier($slug){
        $evenement = Evenement::where('slug',$slug)->first();
        if(!$evenement){
           return redirect('404');
        }
        
        if($evenement->publish == false){
            $evenement->publish = true;
            $evenement->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $evenement->publish = false;
            $evenement->update();
            $evenement->slider()->delete();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
}
