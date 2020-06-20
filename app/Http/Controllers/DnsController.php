<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DnsController extends Controller
{
    public function index($domain)
    {
    	$dnsipv4 = dns_get_record($domain, DNS_A);
    	$dnsipv6 = dns_get_record($domain, DNS_AAAA);
    	return $dnsipv4[0]['host'].'<br>'.$dnsipv4[0]['ip'].'<br> ipv6: '.$dnsipv6[0]['ipv6'];
    	//dd($dnsipv4);
    }
}
