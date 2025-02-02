<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'uuid',
        'slug',
        'user_uuid',
        'base_url',
        'path',
        'type',
        'size',
    ];

    protected $hidden = [
        'id',
    ];
}
