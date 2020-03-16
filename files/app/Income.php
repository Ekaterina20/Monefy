<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
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
