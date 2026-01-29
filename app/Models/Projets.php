<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projets extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'description', 'image', 'lien_github', 'lien_demo'];

    function competence(): BelongsToMany 
    {
        return $this->belongsToMany(Competence::class,'projet_competence');
    }

}
