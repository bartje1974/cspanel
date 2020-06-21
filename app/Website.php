<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
	 protected $fillable = [
        'website_path', 'user_id', 'domain_id'
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function domains()
    {
    	return $this->belongsTo('App\Domains');
    }
    
}
