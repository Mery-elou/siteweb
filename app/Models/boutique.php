<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\user as Authenticatable;

class boutique extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard ='boutique';


    protected $fillable = [
        'b_nom',
        'email',
        'password',
        'nom_boutique',
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
