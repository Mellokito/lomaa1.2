<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';
    
    protected $guarded  = [];
    
    protected $hidden  = [
        'valide','publish'
    ];


    public function article(){
        return $this->belongsTo('App\Article');
    }
}
