<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class IncomeSite extends Model
{
    protected $fillable = [
        'income_id',
        'name',
        'icon',
        'color',
        'slug',
        'amount',
        'comment',
    ];
    public function setNameAttribute ($name) {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public  function income ()
    {
        return $this->belongsTo('App\Income');
    }

    public  function getRouteKeyName()
    {
        return 'slug';
    }
}
