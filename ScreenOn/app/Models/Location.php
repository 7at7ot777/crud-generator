<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'longitude',
        'latitude',
        'image',
        'screen_owner_id',
    ];

    public function screenOwner()
    {
        return $this->belongsTo(ScreenOwner::class);
    }
}
