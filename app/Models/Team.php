<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name', 
        'logo'
    ]; 

    public function getLogoAttribute($image)
    {
        return $this->attributes['logo'] = $image ? Storage::disk('public')->url('images').'/'.$image : $image;
    }

    
}
