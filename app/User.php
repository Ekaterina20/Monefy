<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'name', 'email',  'phone_number',
        'balance',
        'password',
        'api_token',
        'is_admin',
    ];

    protected $hidden = [
        'remember_token', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        return $this->is_admin;
    }


    public function Finance () {
        return $this->hasMany(Finance::class);
    }

    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }
}
