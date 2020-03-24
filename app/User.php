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
        'name', 'email',  'phone_number', 'is_admin', 'balance',
    ];

    protected $hidden = [
        'password', 'remember_token', 'api_token'
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
