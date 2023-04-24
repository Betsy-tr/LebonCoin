<?php

namespace App\Models;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;

    public function annonce() : HasMany
    {
        return $this->hasMany(Annonce::class) ;
    }
}
