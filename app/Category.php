<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [

        'name',
        'flag',
        'icon',
        'color',
        'flag',
    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

    public function finance()
    {
        return $this->hasMany('App\Finance');
    }
}
