<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable, LogsActivity;

    protected $table = 'users';

    protected static $logAttributes = ['name',  'email'];

    protected static $ignoreChangedAttributes = ['password', 'updated_at'];

    protected static $recordEvents = ['created', 'updated'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'user';

    public function getDescriptionForEvents(string $eventName) 
    {
        return "You have {$eventName} user";
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function domains()
    {
        return $this->hasMany('App\Domains');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}

// user hasOn profile
// user hasMany domains

//$user = User::find(1) select * from user where id = 1
//$user->domains; select * from domains where user_id = $user->id
//$user->domains->first()
//$user->domains->last()
//$user->domains->find()
//$user->domains->split(3)
//$user->domains->groupBy()