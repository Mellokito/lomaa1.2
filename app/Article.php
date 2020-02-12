<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    
    protected $guarded  = [];
    
    protected $hidden  = [
        'slug','valide','publish','categorie_id'
    ];


    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function commentaire(){
        return $this->hasMany('App\Commentaire');
    }

    public function notification()
    {
        return $this->belongsToMany('App\User', 'user_article_notification', 'article_id', 'user_id')
                    ->as('user_article_notification')
                    ->withTimestamps();
    }

    public function slider()
    {
        return $this->morphOne('App\Slider','sliderable');
    }
}
