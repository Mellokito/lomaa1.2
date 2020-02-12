<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    
    protected $guarded  = [];

    protected $hidden  = [
        'valide','publish'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
