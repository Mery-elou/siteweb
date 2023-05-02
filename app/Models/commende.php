<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commende extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'prix',
        'Quantite',
        'path',
        'user_id',
    ];
}
