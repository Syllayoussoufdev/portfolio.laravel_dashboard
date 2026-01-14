<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['poste', 'entreprise', 'date_debut', 'date_fin', 'description'];

    function competence(): BelongsToMany 
    {
        return $this->belongsToMany(Competence::class,'experience_competence');
    }
    
}
