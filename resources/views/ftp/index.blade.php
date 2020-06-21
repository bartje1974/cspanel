@extends('adminlte::page')

@section('title', 'Websites')

@section('content_header')
    <h1> Ftp <small>management</small></h1>
     <button type="button" class="btn btn-success">Add Ftp</button>
@stop

@section('content')

<div class="card">
            <div class="card-header">
              <h3 class="card-title">FTP manager</h3> 

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="Ftp" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Root Directory</th>
                  <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Domain.tld</td>
                  <td>*******  <button type="button" class="btn btn-sm btn-secondary"><i class="fa faw fa-eye"></i></button></td>
                  <td>Running</td>
                  <td>/var/www/domain.tld/public_html</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary"><i class="fa faw fa-file"></i>  Edit</button>
                    <button type="button" class="btn btn-sm btn-danger"><i class="fa faw fa-trash"></i>  Delete</button>
                    <button type="button" class="btn btn-sm btn-warning"><i class="fa faw fa-stop"></i>  Stop</button>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Site name</th>
                  <th>Status</th>
                  <th>Back Up</th>
                  <th>Root Directory</th>
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
            $('#Ftp').dataTable();
        });
    </script>
@stop