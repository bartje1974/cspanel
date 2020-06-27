
@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1> Profile <small> Your profile</small></h1>
@stop

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$profile->avatar}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$profile->profile_firstname}}</h3>

                <p class="text-muted text-center">{{$profile->profile_company_name}}</p>

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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Account settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">History</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
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
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @stop