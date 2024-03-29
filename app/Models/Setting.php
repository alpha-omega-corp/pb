<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'email',
        'phone',
        'facebook',
        'linkedin',
        'twitter',
        'instagram',
    ];

    protected static function newFactory()
    {
    }
}
