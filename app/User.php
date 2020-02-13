<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable  = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role','statut'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    private $role = [
        1 => "Super Administrateur",
        2 => "Administrateur",
        3 => "Contributeur"
    ];

    private $statut = [
        0 => "Inactif",
        1 => "Actif",
    ];


    public function role(){
        return $this->role;
    }

    public function getRoleAttribute($attribute){
        return $this->role[$attribute];
    }

    public function statut(){
        return $this->statut;
    }

    public function getStatutAttribute($attribute){
        return $this->statut[$attribute];
    }


    public function droit_acces()
    {
        return $this->belongsToMany('App\Categorie', 'categorie_droit_acces', 'user_id', 'categorie_id')
                    ->as('categorie_droit_acces')
                    ->withPivot(['droit_acces'])
                    ->withTimestamps();
    }

    public function droit_acces_evenement()
    {
        return $this->belongsToMany('App\Categorie_evenement', 'categorie_evenement_droit_acces', 'user_id', 'categorie_id')
                    ->as('categorie_evenement_droit_acces')
                    ->withTimestamps();
    }

    public function notification()
    {
        return $this->belongsToMany('App\Article', 'user_article_notification', 'user_id', 'article_id')
                    ->as('user_article_notification')
                    ->withTimestamps();
    }

    //Models
    public function article(){
        return $this->hasMany(Article::class);
    }

    public function evenement(){
        return $this->hasMany(Evenement::class);
    }

    public function edition(){
        return $this->hasMany(Edition::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function video(){
        return $this->hasMany(Video::class);
    }
}
