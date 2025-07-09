<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etapes extends Model
{

    
    protected $fillable = [
        'colis_id',
        'description',
        'lieu',
        'date',
        'heure',
        'statut'
         ];

         public function colis()
         {
             return $this->belongsTo(Colis::class); // 'colis_id' doit correspondre à la clé étrangère
         }
    //
}
