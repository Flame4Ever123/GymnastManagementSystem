<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionCategory extends Model
{
    use HasFactory;

    protected $table = 'competition_categories';

    protected $fillable = [
        'competition_id',
        'category',
    ];
    
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function competitionHasManyGymnasts()
    {
        return $this->hasMany(GymnastHasCompetition::class);
    }
}