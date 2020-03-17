<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExpenseSite extends Model
{
    protected $fillable = [
        'expense_id',
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

    public  function expense ()
    {
        return $this->belongsTo('App\Expense');
    }

    public  function getRouteKeyName()
    {
        return 'slug';
    }
}
