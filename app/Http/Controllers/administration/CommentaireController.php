<?php

namespace App\Http\Controllers\administration;

use App\Article;
use App\Http\Controllers\Controller;

use App\Commentaire;
use Illuminate\Http\Request;
use Validator;

class CommentaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('ajoutArticle');
        $this->middleware('checkAdministrateur');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $article = Article::where('slug',$slug)->first();
        if (!$article) {
            return redirect('404');
        }

        $data['commentaires'] = Commentaire::where('article_id',$article->id)->get();
        $data['article'] = $article;

        return view('administration.articles.commentaire.index', $data);
    }

    public function show(Commentaire $commentaire)
    {
        $data['commentaire'] = $commentaire;

        return view('administration.articles.commentaire.show', $data);
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaire.index',$commentaire->article->slug)->with('success', 'Suppression effectuée');
    }

    public function valider(Commentaire $commentaire){
        if($commentaire->valide == false){
            $commentaire->valide = true;
            $commentaire->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $commentaire->valide = false;
            $commentaire->publish = false;
            $commentaire->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier(Commentaire $commentaire){
        if($commentaire->publish == false){
            $commentaire->publish = true;
            $commentaire->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $commentaire->publish = false;
            $commentaire->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
}
