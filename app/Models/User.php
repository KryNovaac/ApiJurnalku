<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{

    protected $fillable = ['name', 'nis', 'password', 'photo', 'rombel', 'rayon'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Fungsi otomatis untuk mengenkripsi password saat diinput (Opsional tapi sangat disarankan)
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

// app/Models/User.php


// Relasi ke tabel lain
public function documents() { return $this->hasOne(Document::class); }
public function certificates() { return $this->hasMany(Certificate::class); }
public function portfolios() { return $this->hasMany(Portfolio::class); }
public function socialLinks() { return $this->hasMany(SocialLink::class); }
}