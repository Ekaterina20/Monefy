<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Finance extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'amount',
        'comment',
        'date',
    ];

    public  function category ()
    {
        return $this->belongsTo('App\Category');
    }

    public  function user ()
    {
        return $this->belongsTo('App\User');
    }

}
