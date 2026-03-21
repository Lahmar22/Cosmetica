<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'quantite',
        'statuts',
        'prixTotal',
        'produit_id',
        'client_id',
    ];
}
