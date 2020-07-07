<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ftp extends Model
{
    use LogsActivity;

    protected $table = 'ftp';
}
