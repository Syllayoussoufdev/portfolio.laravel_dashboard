<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Diplome extends Model
{
    use HasFactory;    
    protected $fillable = ['Titre', 'Centre_formateur', 'Annee_obtention', 'Lieu_centre', 'niveau_diplome','Domaine_etude', 'Description'];
    public function competence(): BelongsToMany
    {
        return $this->belongsToMany(Competence::class,'diplome_competence');
    }
}
