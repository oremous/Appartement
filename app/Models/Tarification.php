<?php

namespace App\Models;

use App\Models\Article;
use App\Models\DureeVente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
