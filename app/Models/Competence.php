<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Diplome;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competence extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'niveau', 'pourcentage'];
   
    public function diplome(): BelongsToMany 
    {
        return $this->belongsToMany(Diplome::class,'diplome_competence')
        ->withPivot('niveau_maitrise')->withTimestamps();
    }
}
