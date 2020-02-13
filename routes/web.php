<?php
// Authentication Routes...


Route::prefix('administration')->group(function () {
    Route::get('lomaa_login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('lomaa_login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Dashbord
    Route::get('home', 'administration\HomeController@index')->name('dashboard.home');

    //Changer mot de passe
    Route::get('compte', 'administration\CompteController@index')->name('compte.index');
    Route::put('compte', 'administration\CompteController@update')->name('compte.update');

    // Categories
    Route::get('categorie', 'administration\CategorieController@index')->name('categorie.index');
    Route::get('categorie/create', 'administration\CategorieController@create')->name('categorie.create');
    Route::get('categorie/{slug}/edit', 'administration\CategorieController@edit')->name('categorie.edit');
    Route::post('categorie', 'administration\CategorieController@store')->name('categorie.store');
    Route::put('categorie/{slug}', 'administration\CategorieController@update')->name('categorie.update');
    Route::delete('categorie/{slug}', 'administration\CategorieController@destroy')->name('categorie.destroy');
    // valider publier
    Route::get('valider/categorie/{slug}','administration\CategorieController@valider')->name('categorie.valider')->middleware('validerArticle');
    Route::get('publier/categorie/{slug}','administration\CategorieController@publier')->name('categorie.publier')->middleware('validerArticle');

    // Categories evenement
    Route::get('categorie_evenement', 'administration\CategorieEvenementController@index')->name('categorie_evenement.index');
    Route::get('categorie_evenement/create', 'administration\CategorieEvenementController@create')->name('categorie_evenement.create');
    Route::get('ategorie_evenement/{slug}/edit', 'administration\CategorieEvenementController@edit')->name('categorie_evenement.edit');
    Route::post('categorie_evenement', 'administration\CategorieEvenementController@store')->name('categorie_evenement.store');
    Route::put('categorie_evenement/{slug}', 'administration\CategorieEvenementController@update')->name('categorie_evenement.update');
    Route::delete('categorie_evenement/{slug}', 'administration\CategorieEvenementController@destroy')->name('categorie_evenement.destroy');
    // valider publier
    Route::get('valider/categorie_evenement/{slug}','administration\CategorieEvenementController@valider')->name('categorie_evenement.valider')->middleware('validerArticle');
    Route::get('publier/categorie_evenement/{slug}','administration\CategorieEvenementController@publier')->name('categorie_evenement.publier')->middleware('validerArticle');

    //Droit d'accès catégories
    Route::get('droit_acces/{user}', 'administration\Droit_accesController@index')->name('categorie_droit_acces.index');
    Route::get('droit_acces/article/create/{user}', 'administration\Droit_accesController@article_create')->name('categorie_droit_acces.article_create');
    Route::get('droit_acces/evenement/create/{user}', 'administration\Droit_accesController@evenement_create')->name('categorie_droit_acces.evenement_create');
    Route::get('droit_acces/{user}/edit/{categorie}', 'administration\Droit_accesController@edit')->name('categorie_droit_acces.edit');
    Route::put('droit_acces/article/{user}', 'administration\Droit_accesController@article_store')->name('article_droit_acces.store');
    Route::put('droit_acces/evenement/{user}', 'administration\Droit_accesController@evenement_store')->name('evenement_droit_acces.store');
    Route::delete('droit_acces/article/{user}/{categorie}', 'administration\Droit_accesController@article_destroy')->name('article_droit_acces.destroy');
    Route::delete('droit_acces/evenement/{user}/{categorie}', 'administration\Droit_accesController@evenement_destroy')->name('evenement_droit_acces.destroy');
    Route::put('droit_acces/edition_media/{user}', 'administration\Droit_accesController@edition_media_store')->name('edition_media_droit_acces.store');


    // articles
    Route::resource('article', 'administration\ArticleController');
    // valider publier
    Route::get('valider/article/{slug}','administration\ArticleController@valider')->name('article.valider')->middleware('validerArticle');
    Route::get('publier/article/{slug}','administration\ArticleController@publier')->name('article.publier')->middleware('validerArticle');
    //Supprimer image
    Route::get('article/supprimer_image/{slug}', 'administration\ArticleController@supprimer_image')->name('article.supprimer_image');
    Route::get('article/supprimer_fichier/{slug}', 'administration\ArticleController@supprimer_fichier')->name('article.supprimer_fichier');
    //Slider
    Route::post('article/slider/{slug}', 'administration\ArticleController@slider')->name('article.slider');
    Route::delete('article/slider/{user}', 'administration\ArticleController@supprimer_slider')->name('article.supprimer_slider');

    //commentaires
    Route::get('commentaire/{article}', 'administration\CommentaireController@index')->name('commentaire.index');
    Route::get('voir_commentaire/{commentaire}', 'administration\CommentaireController@show')->name('commentaire.show');
    Route::delete('commentaire/{commentaire}', 'administration\CommentaireController@destroy')->name('commentaire.destroy');
    // valider publier
    Route::get('valider/commentaire/{commentaire}','administration\CommentaireController@valider')->name('commentaire.valider')->middleware('validerArticle');
    Route::get('publier/commentaire/{commentaire}','administration\CommentaireController@publier')->name('commentaire.publier')->middleware('validerArticle');
    
    // evenements
    Route::resource('evenement', 'administration\EvenementController');
    // valider publier
    Route::get('valider/evenement/{slug}','administration\EvenementController@valider')->name('evenement.valider')->middleware('validerArticle');
    Route::get('publier/evenement/{slug}','administration\EvenementController@publier')->name('evenement.publier')->middleware('validerArticle');
    
    //Supprimer image
    Route::get('evenement/supprimer_image/{slug}', 'administration\EvenementController@supprimer_image')->name('evenement.supprimer_image');
    //Slider
    Route::post('evenement/slider/{slug}', 'administration\EvenementController@slider')->name('evenement.slider');
    Route::delete('evenement/slider/{user}', 'administration\EvenementController@supprimer_slider')->name('evenement.supprimer_slider');

    // éditions
    Route::resource('edition', 'administration\EditionController');
    // valider publier
    Route::get('valider/edition/{slug}','administration\EditionController@valider')->name('edition.valider')->middleware('validerArticle');
    Route::get('publier/edition/{slug}','administration\EditionController@publier')->name('edition.publier')->middleware('validerArticle');
    //Supprimer image
    Route::get('edition/supprimer_image/{slug}', 'administration\EditionController@supprimer_image')->name('edition.supprimer_image');

    // Vidéos
    Route::resource('video', 'administration\VideoController');
    // valider publier
    Route::get('valider/video/{slug}','administration\VideoController@valider')->name('video.valider')->middleware('validerArticle');
    Route::get('publier/video/{slug}','administration\VideoController@publier')->name('video.publier')->middleware('validerArticle');
    //Supprimer image
    Route::get('video/supprimer_image/{slug}', 'administration\VideoController@supprimer_image')->name('video.supprimer_image');

    // Images
    Route::resource('image', 'administration\ImageController');
    // valider publier
    Route::get('valider/image/{image}','administration\ImageController@valider')->name('image.valider')->middleware('validerArticle');
    Route::get('publier/image/{image}','administration\ImageController@publier')->name('image.publier')->middleware('validerArticle');
    

    // Slider

    Route::get('slider', 'administration\SliderController@index')->name('slider.index');
    Route::delete('slider/{slider}', 'administration\SliderController@destroy')->name('slider.destroy');
    Route::post('slider_article', 'administration\SliderController@slider_article')->name('slider.article');
    Route::post('slider_evenement', 'administration\SliderController@slider_evenement')->name('slider.evenement');

    // Erreur user
    Route::get('erreur', function () {
        return view('administration.utilisateur.user_error');
    })->name('utilisateur.user_error');

    Route::resource('utilisateur', 'administration\UtilisateurController');
    Route::post('utilisateur/droit_acces/{user}', 'administration\UtilisateurController@droit_acces')->name('utilisateur.droit_acces');
});

// Site Frontend

//Index
Route::get('','site\IndexController@index')->name('site.index');

 //Article
Route::get('articles/{slug}','site\ArticleController@article_categorie')->name('site.article_categorie');
Route::get('article/{slug}','site\ArticleController@article_show')->name('site.article_show');
Route::get('articles','site\ArticleController@article_all')->name('site.article_all');

//Commentaire
Route::post('commentaire/{article}', 'site\CommentaireController@ajouter_commentaire')->name('site.ajouter_commentaire');


 //Evenement
 Route::get('evenements/{slug}','site\EvenementController@evenement_categorie')->name('site.evenement_categorie');
 Route::get('evenement/{slug}','site\EvenementController@evenement_show')->name('site.evenement_show');
 Route::get('evenements','site\EvenementController@evenement_all')->name('site.evenement_all');

 //Edition
Route::get('edition/{slug}','site\EditionController@edition_show')->name('site.edition_show');
Route::get('editions','site\EditionController@edition_all')->name('site.edition_all');



Route::get('about','site\IndexController@about')->name('site.about');


