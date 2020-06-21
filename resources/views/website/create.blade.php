@extends('adminlte::page')

@section('title', 'Websites')

@section('content_header')
    <h1> Websites <small>Add Website</small></h1>
@stop

@section('content')

<div class="card">
            <div class="card-header">
              <h3 class="card-title">Add a new website</h3> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
              <form method="POST" action="{{ route('website.store') }}">
                @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">Domain name</label>
                <input type="text" class="form-control" id="domain" name="domain"  placeholder="domain.tld">
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Add domain">
              </div>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
@stop