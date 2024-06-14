<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'tempat_lahir',
        'jenis_kelamin',
        'tgl_lahir',
        'gol_darah',
        'agama',
        'alamat',
        'notlp',
        'nip',
        'username',
    ];

    protected $attributes = [
        'role'=>'PEGAWAI'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function obatmasuk()
    {
        return $this->hasMany(ObatMasuk::class);
    }

    public function obatkeluar() {
        return $this->hasMany(ObatKeluar::class);
    }
}