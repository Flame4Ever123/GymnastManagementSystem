<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competitions';

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    public function competitionHasManyCategories()
    {
        return $this->hasMany(CompetitionCategory::class);
    }
    
}
