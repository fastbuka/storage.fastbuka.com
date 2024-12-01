<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = 'Storage';

    protected $primaryKey = 'uuid';
    public $incrementing = false; 
    protected $keyType = 'string';

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }
}
