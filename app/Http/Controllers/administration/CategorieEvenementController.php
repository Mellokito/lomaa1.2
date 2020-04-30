<?php

namespace App\Http\Controllers\administration;
use App\Http\Controllers\Controller;
use Validator;

use App\Categorie_evenement;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieEvenementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('checkAdministrateur');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        $data['categories'] = Categorie_evenement::all();
        return view('administration.evenements.categorie_evenement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        return view('administration.evenements.categorie_evenement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255|unique:categorie_evenements,nom',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $categorie = new Categorie_evenement();
            $categorie->nom = $request->nom;
            $categorie->slug = substr(encrypt(time() . '-' .$request->nom),9,20);
            $categorie->save(); 
            return redirect()->route('categorie_evenement.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie_evenement  $categorie_evenement
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie_evenement $categorie_evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie_evenement  $categorie_evenement
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $categorie = Categorie_evenement::where('slug',$slug)->first();
        if (!$categorie) {
            return redirect('404');
        }

        $data['categorie'] = $categorie;

        return view('administration.evenements.categorie_evenement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie_evenement  $categorie_evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $categorie = Categorie_evenement::where('slug',$slug)->first();
        if (!$categorie) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255|unique:categorie_evenements,nom',
        ]);
        // return var_dump($categorie->role);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        if ($request->isMethod('put')) {
            $categorie->nom = $request->nom;
            $categorie->update();
            return redirect()->route('categorie_evenement.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie_evenement  $categorie_evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $categorie = Categorie_evenement::where('slug',$slug)->first();
        if (!$categorie) {
            return redirect('404');
        }

       
        try {
            $categorie->delete();
            return redirect()->route('categorie_evenement.index')->with('success', 'Suppression effectuée');
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1451){
                return redirect()->route('categorie_evenement.index')->with('error', 'Un ou plusieurs événements sont affectés à cette catégorie');
            }
        }

    }


    public function valider($slug){
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $categorie = Categorie_evenement::where('slug',$slug)->first();
        if(!$categorie){
           return redirect('404');
        }

        if($categorie->valide == false){
            $categorie->valide = true;
            $categorie->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $categorie->valide = false;
            $categorie->publish = false;
            $categorie->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier($slug){
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $categorie = Categorie_evenement::where('slug',$slug)->first();
        if(!$categorie){
           return redirect('404');
        }
        
        if($categorie->publish == false){
            $categorie->publish = true;
            $categorie->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $categorie->publish = false;
            $categorie->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
}
