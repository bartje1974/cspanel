<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        $activity = Activity::where('causer_id', $user->id)->latest()->limit(50)->get();
        
        return view('profile.index', compact('profile', 'activity'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request = request()->validate([
                                        'profile_firstname' => 'required',
                                        'profile_lastname' => 'required',
                                        'profile_address' => 'required',
                                        'profile_address_number' => 'required',
                                        'profile_zipcode' => 'required',
                                        'profile_place' => 'required',
                                        'profile_country' => 'required',
                                        'profile_phone' => 'required',
                                        'profile_company_name' => '',
                                        'avatar' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                                    ]);


        if(file_exists($_FILES['avatar']['tmp_name']))
        {
            $request['avatar'] = request('avatar')->store('avatars');
        }

        $update = Profile::find($profile->id)->update($request);

        return redirect('profile')->with('success','Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

}
