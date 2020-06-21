<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;
use App\Domains;
use App\User;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get user id from current user
        $user = auth()->user();

        $domains = Domains::with(['user','website'])->where(['user_id' => $user->id])->get();

        return view('website.index', compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate(['domain'=> ['required',] ]);


        $auth_user = auth()->user();
    
        $domain = new Domains();
        $domain->domain_name = request('domain');
        $domain->user_id = $auth_user->id;
        $domain_status = true;

        $domain->save();

        $website = new Website();
        $website->website_path = '/var/www/'.request('domain').'/public_html/';
        $website->website_status = true;
        $website->domain_id = $domain->id;
        $website->user_id = $auth_user->id;

        $website->save();

        $extra = Domains::find($domain->id);
        $extra->website_id = $website->id;

        $extra->save();

        return redirect('website')->with('success','Domain created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        return view('website.edit',compact('website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $request->validate([
            'domain' => 'required',
        ]);
  
        $update = Website::find($website->id);
        $update->website_path = request('domain');

        $update->save();

       return redirect('website')->with('success','Website updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        $website->delete();

        return redirect('website')->with('success','Item deleted successfully');
    }
}
