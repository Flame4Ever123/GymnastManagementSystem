<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymnastCompetitionHasApparatus extends Model
{
    use HasFactory;

    protected $table = 'gymnast_competition_has_apparatuses';

    protected $fillable = [
        'gymnast_competition_id',
        'apparatus',
        'apparatus_ranking',
        'apparatus_score',
    ];

    public function gymnastCompetition()
    {
        return $this->belongsTo(GymnastHasCompetitions::class);
    }
    
}