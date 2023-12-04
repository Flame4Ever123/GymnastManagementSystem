<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubHasCoaches extends Model
{
    use HasFactory;

    protected $table = 'club_has_coaches';

    protected $fillable = [
        'coach_id',
        'club_id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
    
}