<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'playlist_id',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
