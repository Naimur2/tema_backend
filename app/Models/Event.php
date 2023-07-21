<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_id',
        'starting_date',
        'ending_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
