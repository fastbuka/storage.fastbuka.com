<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'User';

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
    ];

    protected $hidden = [
        'id',
        'email',
        'contact',
        'username',
        'balance',
        'walletAddress',
        'secretKey',
        'trustlines',
        'password',
        'email_verified',
        'contact_verified',
        'role',
        'status',
        'isOnline',
        'createdAt',
        'updatedAt',
    ];

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function storage()
    {
        return $this->hasMany(Storage::class, 'user_uuid', 'uuid');
    }
}
