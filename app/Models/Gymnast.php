<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gymnast extends Model
{
    use HasFactory;

    protected $table = 'gymnasts';

    protected $fillable = [
        'name',
        'category',
        'member_id',
        'club_id',
        'coach_id',
        'year_of_birth',
        'notes',
        'is_deleted',
    ];

    public function gymnastHasCompetitions()
    {
        return $this->hasMany(GymnastHasCompetitions::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
