<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Finance extends Model
{
    protected $fillable = [

        'amount',
        'comment',
        'date',
        'category_id',
        'user_id',
    ];

    protected $hidden = [

        'created_at',
        'updated_at',
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
