@extends('adminlte::page')

@section('title', 'Websites')

@section('content_header')
    <h1> Websites <small>Dashboard</small></h1>
     <a href="{{ route('website.create') }}" type="button" class="btn btn-success">Add website</a>
@stop

@section('content')


<div class="card">
            <div class="card-header">
              <h3 class="card-title">Your domains</h3> 

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    <p>{{ $message }}</p>
                </div>
              @endif
              <table id="Websites" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Domain name</th>
                  <th>Status</th>
                  <th>Back Up</th>
                  <th>Root Directory</th>
                  <th>Expire Date</th>
                  <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($domains as $row)
                <tr>
                  <td>{{ $row->domain_name }}</td>
                  <td>{{ $row->domain_status }}</td>
                  <td>{{ $row->website->website_status }}</td>
                  <td>{{ $row->website->website_path }}</td>
                  <td>{{ date("d-m-Y", strtotime(date("d-m-Y", strtotime($row['created_at'])) . " + 1 year")) }}</td>

                  <td>

                    <div class="form-inline">
                    <form id="delete_from_{{$row->website->id}}" action="{{ route('website.destroy', $row->website->id) }}" method="POST">
                      <a class="btn btn-info btn-sm" href="{{ route('website.show', $row->website->id) }}">Show</a>
                      <a class="btn btn-primary btn-sm mr-2" href="{{ route('website.edit', $row->website->id) }}"><i class="fa faw fa-file"></i> Edit</a>
                      @csrf
                      @method('DELETE')
                          <a href="javascript:void(0);" data-id="{{$row->website->id}}" class="_delete_data btn btn-danger btn-sm mr-2">
                              <i class="fa faw fa-trash"></i> Delete
                          </a>                    
                    </form>
                    <button type="button" class="btn btn-sm btn-warning mr-2"><i class="fa faw fa-stop"></i>  Stop</button>
                  </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Domain name</th>
                  <th>Status</th>
                  <th>Back Up</th>
                  <th>Root Directory</th>
                  <th>Expire Date</th>
                  <th>Operation</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
@stop
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('js')
    <script>
        $(document).ready(function () {
            $('#Websites').dataTable();
        });
    </script>
    <script>
    $(document).ready(function(){
        $('._delete_data').click(function(e){
            var data_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value) {
                    $(document).find('#delete_from_'+data_id).submit();
                }
            })
        });
    });            
</script>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://www.cs-hosting.nl">Cs-hosting.nl</a>.</strong> All rights
    reserved.
@stop