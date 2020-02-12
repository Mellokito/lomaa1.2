<?php

namespace App\Http\Controllers\site;

use App\Article;
use App\Commentaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CommentaireController extends Controller
{
    public function ajouter_commentaire(Request $request,Article $article)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|min:2|max:255',
            'email' => 'required|email',
            'contenu' => 'required|min:2|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {

            $commentaire = new Commentaire();
            $commentaire->nom = $request->nom;
            $commentaire->email = $request->email;
            $commentaire->contenu = $request->contenu;
            $commentaire->article_id = $article->id;
            

            $commentaire->save();
            return redirect()->back()->with('success', 'Enregistrement effectué');
        }
    }
}
