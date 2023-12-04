<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    
    protected $table = 'coaches';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'license_number',
        'discipline',
        'home_address',
        'state',
        'is_deleted',
    ];
    
    public function coachesHasManyGymnasts()
    {
        return $this->hasMany(Gymnast::class);
    }

    public function coachesHasManyClubs()
    {
        return $this->hasMany(ClubHasCoaches::class);
    }
}
