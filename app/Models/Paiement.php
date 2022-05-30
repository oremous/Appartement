<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vente(){
        return $this->belongsTo(Vente::class);
    }
}
