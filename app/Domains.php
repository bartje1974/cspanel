<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Domains extends Model
{
    protected $fillable = [
        'domain_name','user_id', 'website_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function website()
    {
        return $this->belongsTo('App\Website');
    }
}
