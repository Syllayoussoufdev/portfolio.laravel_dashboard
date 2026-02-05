<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'description','slug', 'statut', 'category', 'image', 'lien_github', 'lien_demo'];

    function competence(): BelongsToMany 
    {
        return $this->belongsToMany(Competence::class,'competence_projet');
    }

}
