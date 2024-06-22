<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    protected $fillable = [
        'screen_name',
        'location_id',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
