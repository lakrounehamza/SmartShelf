<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vonder extends Model
{
    protected $fillable = ['id_produit', 'id_rayon'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }
}
