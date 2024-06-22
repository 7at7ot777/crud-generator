<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreenOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'company_name',
        'telephone',
    ];
}
