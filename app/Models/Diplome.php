<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongToMany;

class Diplome extends Model
{
    protected $fillable = ['Titre', 'Centre_formateur', 'Annee_obtention'];
    public function competence(): belongToMany
    {
        return $this->belongsToMany(Competence::class,'diplome_competence')
        ->withPivot('niveau_maitrise')->withTimestamps();
    }
}
