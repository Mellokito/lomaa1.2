<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_evenement extends Model
{
    protected $table = 'categorie_evenements';
    
    protected $guarded  = [];

    protected $hidden  = [
        'slug','valide','publish'
    ];

    public function evenement(){
        return $this->hasMany('App\Evenement');
    }

    public function droit_acces()
    {
        return $this->belongsToMany('App\User', 'categorie_evenement_droit_acces', 'user_id', 'categorie_id')
                    ->as('categorie_evenement_droit_acces')
                    ->withTimestamps();
    }
}
