<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Larinfo;
use App\Domains;
//use Spatie\Dns\Dns;


class HomeController extends Controller
{
    public function index()
    {
        //$dns = new Dns('cs-hosting.nl');
        //return $dns->getRecords('AAAA'); // returns all available dns records

        $cf = config('app.timezone');;
    	$larinfo = Larinfo::getInfo();
        $user = auth()->user();

        $domains = Domains::with(['user'])->where(['user_id' => $user->id])->count();

        $dbserver        = $larinfo['database']['driver'];
        $dbversion       = $larinfo['database']['version'];
        $serveruptime    = $larinfo['server']['uptime']['uptime'];
        $servercpu       = $larinfo['server']['hardware']['cpu'];
        $serversoftware  = $larinfo['server']['software']['os'];
        $serverwebserver = $larinfo['server']['software']['webserver'];
        $serverphp       =  $larinfo['server']['software']['php'];

        return view('home', compact('dbserver', 'dbversion', 'serveruptime', 'servercpu', 'serversoftware', 'serverwebserver', 'serverphp', 'domains', 'cf'));
    }
}
