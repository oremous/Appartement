<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\TypeArticle;
use App\Models\Tarification;
use App\Models\ProprieteArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;


    public function type(){
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }

    public function tarifications(){
        return $this->hasMany(Tarification::class);
    }

    public function ventes(){
        return $this->belongsToMany(Vente::class, "article_vente", "article_id", "vente_id");
    }

    public function proprietes(){
        return $this->belongsToMany(ProprieteArticle::class, "article_propriete", "article_id", "propriete_article_id");
    }
}
