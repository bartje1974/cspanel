@extends('adminlte::page')

@section('title', 'Websites')

@section('content_header')
    <h1> Websites <small>Edit</small></h1>
@stop

@section('content')

<div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit your website options</h3> 
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
              <form method="POST" action="{{ route('website.update', $website->id) }}">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="sitepath">Website path</label>
                <input type="text" class="form-control" id="domain" name="domain" value="{{ $website->website_path }}">
              </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Update Website">
              </div>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://www.cs-hosting.nl">Cs-hosting.nl</a>.</strong> All rights
    reserved.
@stop