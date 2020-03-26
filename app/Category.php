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
    ];

    protected $hidden = [

        'created_at',
        'updated_at',
        'flag',
    ];

    public function finance()
    {
        return $this->hasMany('App\Finance');
    }
}
