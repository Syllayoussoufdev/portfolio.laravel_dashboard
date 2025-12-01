<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongToMany;

class Competence extends Model
{
    protected $fillable = ['nom', 'niveau', 'pourcentage'];
   
    public function diplome(): belongToMany 
    {
        return $this->belongsToMany(Diplome::class,'diplome_competence')
        ->withPivot('niveau_maitrise')->withTimestamps();
    }
}
