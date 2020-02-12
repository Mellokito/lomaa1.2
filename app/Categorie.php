<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    
    protected $guarded  = [];

    protected $hidden  = [
        'slug','valide','publish'
    ];

    public function article(){
        return $this->hasMany('App\Article');
    }

    public function droit_acces()
    {
        return $this->belongsToMany('App\User', 'categorie_droit_acces', 'user_id', 'categorie_id')
                    ->as('categorie_droit_acces')
                    ->withTimestamps();
    }
}
