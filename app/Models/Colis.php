<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\etapes;

class Colis extends Model
{
    protected $fillable = [
        'nom',
        'service',
        'commentaire',
        'date_envoi',
        'email',
        'origine',
        'destination',
        'image',
        'identifiant',
        'code_secret',
         ];



         public function etapes()
         {
             return $this->hasMany(Etapes::class);
         }

    //
}
