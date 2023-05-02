<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class store extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard ='store';



    protected $fillable = [
        'f_nam',
        'email',
        'password',
        'nom_store',
        'banque',
    ];

 /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* public function image(){
        return $this->hasOne(Produit::class , 'boutique');
    } */
}
