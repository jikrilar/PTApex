<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Nama tabel, jika menggunakan nama tabel selain 'admins'
    protected $table = 'admins';

    // Field yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Menyembunyikan field password ketika response JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts field ke tipe data yang sesuai
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
