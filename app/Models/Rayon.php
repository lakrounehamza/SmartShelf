<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = ['titre'];
    
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
