<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'prix',
        'Quantite',
        'path',
        'categorie',
        'user_id',
    ];
}
