<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Profile extends Model
{
	use LogsActivity;

	protected $fillable = [
        'profile_firstname', 'profile_lastname', 'profile_company_name', 'profile_address', 'profile_address_number',
        'profile_zipcode', 'profile_place', 'profile_country', 'profile_phone', 'avatar', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
