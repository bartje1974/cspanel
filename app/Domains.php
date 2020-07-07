<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Domains extends Model
{
    use LogsActivity;

    protected $table = 'domains';

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
