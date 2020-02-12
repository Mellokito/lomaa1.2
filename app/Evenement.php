<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = 'evenements';
    
    protected $guarded = [];

    protected $hidden  = [
        'slug','user_id','categorie_id','valide','publish'
    ];


    public function categorie(){
        return $this->belongsTo('App\Categorie_evenement');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function notification()
    {
        return $this->belongsToMany('App\User', 'user_evenement_notification', 'evenement_id', 'user_id')
                    ->as('user_evenement_notification')
                    ->withTimestamps();
    }

    public function slider()
    {
        return $this->morphOne('App\Slider','sliderable');
    }
}
