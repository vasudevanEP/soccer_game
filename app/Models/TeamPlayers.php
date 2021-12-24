<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamPlayers extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'playerImage',
        'team_id'
    ];

    protected $hidden = ['deleted_at','created_at', 'updated_at'];


    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getPlayerImageAttribute($image)
    {
        return $this->attributes['playerImage'] = $image ? Storage::disk('public')->url('images').'/'.$image : $image;
    }
}
