<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama',
        'password',
        'nik',
        'email',
        'no_whatsapp',
        'no_telepon',
        'alamat',
        'no_rumah',
        'foto_diri',
        'akses',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
}

