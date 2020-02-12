<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';
    
    protected $guarded  = [];

    protected $hidden  = [
        'slug','valide','publish'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
