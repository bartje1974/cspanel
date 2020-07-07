@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1> Profile:: <small> {{$profile->profile_firstname}} {{$profile->profile_lastname}}</small></h1>
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
        @if(!empty($profile->user->getRoleNames()))
        <strong>Role:</strong>
           @foreach($profile->user->getRoleNames() as $v)
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
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">History</a></li>
        </ul>
      </div>
      <div class="card-body">
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
@stop
