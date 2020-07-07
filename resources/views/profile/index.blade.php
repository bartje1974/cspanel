@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1> Profile:: <small> Here is your profile</small></h1>
@stop

@section('content')

<div class="row">
  <div class="col-md-3">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{ URL::to('/') }}/{{$profile->avatar}}" alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{$profile->profile_firstname}} {{$profile->profile_lastname}}</h3>
        <p class="text-muted text-center">{{$profile->profile_company_name}}</p>
        @if(!empty($user->getRoleNames()))
        <strong>Role:</strong>
           @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
           @endforeach
            @endif
        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Domains</b> <a class="float-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Emails</b> <a class="float-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Databases</b> <a class="float-right">13,287</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="card card-primary">
       <div class="card-header">
         <h3 class="card-title">About Me</h3>
       </div>
       <div class="card-body">
         <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
         <p class="text-muted">
                  {{$profile->profile_address}} {{$profile->profile_address_number}} <br>
                  {{$profile->profile_zipcode}} {{$profile->profile_place}}<br>
                  {{$profile->profile_country}}
                </p>

        <hr>
          <strong><i class="fas fa-phone-alt mr-1"></i> Contact</strong>
          <p class="text-muted">{{$profile->profile_phone}}</p>
       </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Account settings</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">History</a></li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="settings">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('profile.update', $profile->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="profile_firstname">first name</label>
                        <input type="text" class="form-control" id="profile_firstname"  name="profile_firstname" placeholder="first name" value="{{$profile->profile_firstname}}">
                      </div>
                      <div class="form-group col-md-8">
                        <label for="profile_lastname">last name</label>
                        <input type="text" class="form-control" id="profile_lastname" name="profile_lastname" placeholder="last name" value="{{$profile->profile_lastname}}">
                      </div>
                    </div>

                    <div class="form-group col-md-8">
                        <label for="profile_company_name">company</label>
                        <input type="text" class="form-control" id="profile_company_name" name="profile_company_name" placeholder="Company name" value="{{$profile->profile_company_name}}">
                      </div>


                    <div class="form-row">
                      <div class="form-group col-md-8">
                          <label for="profile_address">address</label>
                          <input type="text" class="form-control" id="profile_address" name="profile_address" placeholder="address" value="{{$profile->profile_address}}">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="profile_address_number">number</label>
                          <input type="text" class="form-control" id="profile_address_number" name="profile_address_number" placeholder="number" value="{{$profile->profile_address_number}}" >
                        </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="profile_place">City</label>
                        <input type="text" class="form-control" id="profile_place" name="profile_place" placeholder="city" value="{{$profile->profile_place}}">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="profile_zipcode">Zip</label>
                        <input type="text" class="form-control" id="profile_zipcode" name="profile_zipcode" placeholder="5044CC" value="{{$profile->profile_zipcode}}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="profile_country">country</label>
                        <input type="text" class="form-control" id="profile_country" name="profile_country" placeholder="country" value="{{$profile->profile_country}}">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="profile_phone">Phone</label>
                        <input type="text" class="form-control" id="profile_phone" name="profile_phone" placeholder="phone number" value="{{$profile->profile_phone}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="avatar">Choose avatar</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                      </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update profile</button>
                    </form>
          </div>
          <div class="tab-pane" id="timeline">
            @foreach ($activity as $log)
            <div class="timeline timeline-inverse">
              <div class="time-label">
                <span class="bg-danger">{{$log->created_at->diffForHumans()}}</span>
              </div>
              <div>
                @if($log->description =='Login Login successfull')
                        <i class="fas fa-user bg-primary"></i>
                @elseif($log->description =='updated')
                        <i class="fas fa-spell-check bg-primary"></i>
                @elseif($log->description =='deleted')
                        <i class="fas fa-remove-format bg-primary"></i>
                @elseif($log->description =='created')
                        <i class="fas fa-save bg-primary"></i>
                @endif

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{$log->created_at->diffForHumans()}}</span>

                          <h3 class="timeline-header">{{$log->description}}</h3>

                          <div class="timeline-body">

                            <?php $log->subject_type = str_replace('App\\', '', $log->subject_type );?>

                            @if($log->description =='deleted')
                              {{$log->subject_type}} is removed.
                             @elseif($log->description =='updated')
                              {{$log->subject_type}} is updated.
                             @elseif($log->description =='created')
                              {{$log->subject_type}} is created.
                            @endif
                          </div>
                          <div class="timeline-footer">

                          </div>
                        </div>
                      </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
