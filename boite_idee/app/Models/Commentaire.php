<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model

{

    use HasFactory;

    protected $table = 'commentaires';
    protected $fillable = ['libelle', 'nom_complet_auteur', 'idee_id'];


    // Many-to-One relationship with Idee
    public function Idee()
    {
        return $this->belongsTo(Idee::class, 'idee_id');
    }
}
