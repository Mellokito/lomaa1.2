<?php

namespace App\Http\Controllers\administration;
use App\Http\Controllers\Controller;

use App\Categorie;
use Illuminate\Database\QueryException;
use Validator;
use Illuminate\Http\Request;

class CategorieController extends Controller
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
        $data['categories'] = Categorie::all();
        return view('administration.articles.categorie.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.articles.categorie.create');
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
            'nom' => 'required|string|max:255|unique:categories,nom',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $categorie = new Categorie();
            $categorie->nom = $request->nom;
            $categorie->slug = substr(encrypt(time() . '-' .$request->nom),9,20);
            $categorie->save(); 
            return redirect()->route('categorie.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categorie = Categorie::where('slug',$slug)->first();
        if (!$categorie) {
            return redirect('404');
        }

        $data['categorie'] = $categorie;

        return view('administration.articles.categorie.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $categorie = Categorie::where('slug',$slug)->first();
        if (!$categorie) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255|unique:categories,nom',
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
            return redirect()->route('categorie.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $Categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $categorie = Categorie::where('slug',$slug)->first();
        if (!$categorie) {
            return redirect('404');
        }

         
         try {
            $categorie->delete();
            return redirect()->route('categorie.index')->with('success', 'Suppression effectuée');
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1451 ){
                return redirect()->route('categorie.index')->with('error', 'Un ou plusieurs articles sont affectés à cette catégorie');
            }
        }

    }

    public function valider($slug){
        $categorie = Categorie::where('slug',$slug)->first();
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
        $categorie = Categorie::where('slug',$slug)->first();
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
