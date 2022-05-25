<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;

    public function dureeVente(){
        return $this->belongsTo(DureeVente::class, "duree_vente_id", "id");
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
