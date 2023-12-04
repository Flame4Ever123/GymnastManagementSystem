<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymnastHasCompetitions extends Model
{
    use HasFactory;

    protected $table = 'gymnast_has_competitions';

    protected $fillable = [
        'gymnast_id',
        'competition_category',
        'total_ranking',
        'total_score',
    ];
    
    public function gymnast()
    {
        return $this->belongsTo(Gymnast::class);
    }

    public function competitionCategory()
    {
        return $this->belongsTo(CompetitionCategory::class);
    }

    public function gymnastCompetitionHasApparatus()
    {
        return $this->hasMany(GymnastCompetitionHasApparatus::class);
    }

}