<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'media_type',
        'file_location',
        'screen_owner_id',
        'studio_id',
    ];

    public function screenOwner()
    {
        return $this->belongsTo(ScreenOwner::class, 'screen_owner_id', 'id');
    }


    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
}
