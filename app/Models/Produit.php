<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'promotion', 'prix', 'quantite', 'id_rayon'];
    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }
    public function vonder()
    {
        return $this->hasOne(Vonder::class);
    }
}
