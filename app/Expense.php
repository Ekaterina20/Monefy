<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'color',
    ];
    /*чтобы вернуть slug*/
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
