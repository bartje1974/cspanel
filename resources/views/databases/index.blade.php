@extends('adminlte::page')

@section('title', 'Databases')

@section('content_header')
    <h1> Database <small>management</small></h1>
     <button type="button" class="btn btn-success">Add Database</button>
     <a href="{{ url('/phpmyadmin') }}" target="_blank" type="button" class="btn btn-outline-secondary">PhpMyAdmin</a>
@stop

@section('content')

<div class="card">
            <div class="card-header">
              <h3 class="card-title">Databases</h3> 

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="Database" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Database type</th>
                  <th>Database name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Backup</th>
                  <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>MariaDb</td>
                  <td>laravel</td>
                  <td>dbuser</td>
                  <td>*******  <button type="button" class="btn btn-sm btn-secondary"><i class="fa faw fa-eye"></i></button></td>
                  <td>Backup exists | Import </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-danger"><i class="fa faw fa-trash"></i>  Delete</button>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Database type</th>
                  <th>Database name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Backup</th>
                  <th>Operation</th>
                </tr>
                </tfoot>
              </table>
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


@section('plugins.Datatables', true)
@section('js')
    <script>
        $(document).ready(function () {
            $('#Database').dataTable();
        });
    </script>
@stop
