<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idee extends Model
{
    use HasFactory;

    protected $table = 'idees';

    protected $fillable = [
        'libelle',
        'description',
        'auteur_nom_complet',
        'auteur_email',
        'status',
        'date_creation',
        'categorie_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'idee_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }


}
