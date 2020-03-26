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
        'name', 'email',  'phone_number',  'balance','password','api_token',
    ];

    protected $hidden = [
        'remember_token', 'is_admin', 'created_at', 'updated_at'
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

    /*public function getBalance() {
        return $this->balance;
    }

    public function update_balance_user($flag, $balance) {
        if ($flag == 'income') {
            $this->balance = $this->balance+$balance;
            $this->save();
            return $this->balance;
        }

        if ($flag == 'expenses') {
            $this->balance = $this->balance-$balance;
            $this->save();
            return $this->balance;
        }

    }*/
}
