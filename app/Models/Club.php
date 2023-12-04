<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table = 'clubs';

    protected $fillable = [
        'club_name',
        'description',
        'address',
        'state',
        'country',
        'is_deleted',
    ];
    
    public function clubHasManyGymnasts()
    {
        return $this->hasMany(Gymnast::class);
    }

    public function clubHasManyCoaches()
    {
        return $this->hasMany(ClubHasCoaches::class);
    }
}
