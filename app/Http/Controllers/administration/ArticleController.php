<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;

use App\Article;
use App\Categorie;
use App\Droit_acces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class ArticleController extends Controller
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
        if($user->role == 'Super Administrateur' || $user->role == 'Administrateur'){
            $data['articles'] = Article::all();
        }else{
            $data['articles'] = Article::where('user_id',$user->id)->get();
        }
        
        return view('administration.articles.article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        /////////DROIT ACCES ///////////////
        if($user->role == 'Super Administrateur' || $user->role == 'Administrateur'){
            $data['categories'] = Categorie::all();
        }else{
            $droit_acces = new Droit_acces();
            $data['categories'] = $droit_acces->liste_categorie($user->id);
        }
        /////////DROIT ACCES ///////////////
        
        return view('administration.articles.article.create',$data);
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
            'auteur' => 'required|string|min:2|max:255',
            'image' => 'required|image|max:2000',
            'fichier' => 'nullable|mimes:pdf,doc,docx,dot,xls,xlsx,ppt',
            'categorie' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $storage_image = false;
            $storage_fichier = false;

            if ($request->hasFile("image")) {
                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $filename_image = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($image->storeAs('uploads/images', $filename_image)) {
                    $storage_image = true;
                };
            }

            if ($request->hasFile("fichier")) {
                $fichier = $request->file('fichier');

                $extension = $fichier->getClientOriginalExtension();
                $filename_fichier = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($fichier->storeAs('uploads/fichiers_article', $filename_fichier)) {
                    $storage_fichier = true;
                };
            }

            $article = new Article();

            $article->titre = $request->titre;
            $article->contenu = $request->contenu;
            $article->auteur = $request->auteur;
            $article->user_id = $user->id;
            if ($storage_image) {
                $article->image = $filename_image;
            }
            if ($storage_fichier) {
                $article->fichier = $filename_fichier;
            }
           ///////////DROIT ACCES//////////////////
            if($user->role == 'Super Administrateur' || $user->role == 'Administrateur'){
                $article->categorie_id = $request->categorie;
            }else{
                $droit_acces = new Droit_acces();

                if($droit_acces->ajouter_article($user->id,$request->categorie)){
                    $article->categorie_id = $request->categorie;
                }else{
                    return redirect()->back()->with('error', 'Vous n\'avez pas le droit d\'ajouter des article dans cette catégorie :) ');
                }
            }
            ///////////DROIT ACCES//////////////////

            $article->date = date('Y-m-d',strtotime($request->date));
            $article->slug = substr(encrypt(time() . '-' .$request->titre),9,20);

            $article->save();
            return redirect()->route('article.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $article = Article::where('slug',$slug)->first();
        if (!$article) {
            return redirect('404');
        }
       
        $data['article'] = $article;

        $article->notification()->sync(Auth::user()->id);

        return view('administration.articles.article.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();

        

        $article = Article::where('slug',$slug)->first();
        if (!$article) {
            return redirect('404');
        }

        if(($user->role != 'Super Administrateur' && $user->role != 'Administrateur') && $article->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }

        $data['article'] = $article;
        
        /////////DROIT ACCES ///////////////
        if($user->role == 'Super Administrateur' || $user->role == 'Administrateur'){
            $data['categories'] = Categorie::all();
        }else{
            $droit_acces = new Droit_acces();
            $data['categories'] = $droit_acces->liste_categorie($user->id);
        }
        /////////DROIT ACCES ///////////////

        return view('administration.articles.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $user = Auth::user();
        $article = Article::where('slug',$slug)->first();
        if (!$article) {
            return redirect('404');
        }

        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|min:2|max:255',
            'contenu' => 'required|min:2|string',
            'date' => 'required|date',
            'auteur' => 'required|string|min:2|max:255',
            'image' => 'nullable|image|max:2000',
            'fichier' => 'nullable|mimes:pdf,doc,docx,dot,xls,xlsx,ppt',
            'categorie' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
            $storage_image = false;
            $storage_fichier = false;

            if ($request->hasFile("image")) {
                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $filename_image = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($image->storeAs('uploads/images', $filename_image)) {
                    $storage_image = true;
                };
            }

            if ($request->hasFile("fichier")) {
                $fichier = $request->file('fichier');

                $extension = $fichier->getClientOriginalExtension();
                $filename_fichier = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($fichier->storeAs('uploads/fichiers_article', $filename_fichier)) {
                    $storage_fichier = true;
                };
            }

            

            $article->titre = $request->titre;
            $article->contenu = $request->contenu;
            $article->auteur = $request->auteur;
            $article->slug = substr(encrypt(time() . '-' .$request->titre),0,25);

            if ($storage_image) {
                $article->image = $filename_image;
            }
            if ($storage_fichier) {
                $article->fichier = $filename_fichier;
            }

            ///////////DROIT ACCES//////////////////
            if($user->role == 'Super Administrateur' || $user->role == 'Administrateur'){
                $article->categorie_id = $request->categorie;
            }else{
                $droit_acces = new Droit_acces();

                if($droit_acces->ajouter_article($user->id,$request->categorie)){
                    $article->categorie_id = $request->categorie;
                }else{
                    return redirect()->back()->with('error', 'Vous n\'avez pas le droit d\'ajouter des article dans cette catégorie :) ');
                }
            }
            ///////////DROIT ACCES//////////////////

            if(empty($request->date)){
                $article->date = NULL;
            }else{
                $article->date = date('Y-m-d', strtotime($request->date));
            }

            if($article->image == NULL){
                return redirect()->back()->withInput($request->all)->with('error', 'Vous devez ajouter une image');
            }
            $article->update();
            return redirect()->route('article.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = Article::where('slug',$slug)->first();
        if (!$article) {
            return redirect('404');
        }

        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur')  && $article->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        $article->delete();
        $article->slider()->delete();
        return redirect()->route('article.index')->with('success', 'Suppression effectuée');
    }

    public function supprimer_image($slug)
    {
        $article = Article::where('slug',$slug)->first();
         if(!$article){
            return redirect('404');
        }

        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur') && $article->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        Storage::delete('uploads/images/'.$article->image);
        $article->image = null;
        $article->update();
        return redirect()->back()->with('success', 'Image supprimée');
    }

    public function supprimer_fichier($slug)
    {
        $article = Article::where('slug',$slug)->first();
         if(!$article){
            return redirect('404');
        }
        
        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur') && $article->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        Storage::delete('uploads/fichiers/'.$article->fichier);
        $article->fichier = null;
        $article->update();
        return redirect()->back()->with('success', 'Fichier supprimé');
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
        $article = Article::where('slug',$slug)->first();
         if(!$article){
            return redirect('404');
        }
        
        if($article->valide && $article->publish){
            $article->slider()->create([
                'ordre' => $request->ordre,
             ]);
            return redirect()->back()->with('success', 'Article a été ajouter au slider');
        }else{
            return redirect()->back()->with('error', 'Cet article n\'est pas publié');
        }
        
    }

    public function supprimer_slider($slug)
    {
        $article = Article::where('slug',$slug)->first();
         if(!$article){
            return redirect('404');
        }
        
        $article->slider()->delete();
        return redirect()->back()->with('success', 'Article a été supprimer du slider');
    }

    public function valider($slug){
        $article = Article::where('slug',$slug)->first();
        if(!$article){
           return redirect('404');
        }

        if($article->valide == false){
            $article->valide = true;
            $article->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $article->valide = false;
            $article->publish = false;
            $article->update();
            $article->slider()->delete();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier($slug){
        $article = Article::where('slug',$slug)->first();
        if(!$article){
           return redirect('404');
        }
        
        if($article->publish == false){
            $article->publish = true;
            $article->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $article->publish = false;
            $article->update();
            $article->slider()->delete();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }

}
