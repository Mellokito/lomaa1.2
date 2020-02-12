<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    
    protected $guarded  = [];

    protected $hidden  = [
        'slug','valide','publish'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
