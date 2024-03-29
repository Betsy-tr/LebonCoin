<?php

namespace App\Models;

use App\Models\User ;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Annonce extends Model
{
    use HasFactory;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class) ; 
    }

    public function categorie() : BelongsTo
    {
        return $this->belongsTo(Categorie::class) ; 
    }

    public function favoris():HasMany
    {
        return $this->hasMany(User::class, 'favoris');
    }
}
