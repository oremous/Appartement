<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\Article;
use App\Models\Paiement;
use App\Models\StatutVente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function statut(){
        return $this->belongsTo(StatutVente::class, "statut_vente_id", "id");
    }

    public function paiements(){
        return $this->hasMany(Paiement::class);
    }

    public function articles(){
        return $this->belongsToMany(Article::class, "article_vente", "vente_id", "article_id");
    }
}
