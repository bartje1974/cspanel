@extends('adminlte::page')

@section('title', 'Email')

@section('content_header')
    <h1> Email <small>accounts</small></h1>
     <button type="button" class="btn btn-success">New email account</button>
@stop

@section('content')

<div class="card">
            <div class="card-header">
              <h3 class="card-title">Email</h3> 

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="Email" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mailbox</th>
                  <th>Mail directory</th>
                  <th>Username</th>
                  <th>Domain</th>
                  <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>info@domain.tld</td>
                  <td>domain.tld/info/</td>
                  <td>domain.tld</td>
                  <td>Backup exists | Import </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary">Change password</button>
                    <button type="button" class="btn btn-sm btn-warning"><i class="fa faw fa-stop"></i>  susspend</button>
                    <button type="button" class="btn btn-sm btn-danger"><i class="fa faw fa-trash"></i>  Delete</button>        
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Mailbox</th>
                  <th>Mail directory</th>
                  <th>Username</th>
                  <th>Domain</th>
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
            $('#Email').dataTable();
        });
    </script>
@stop