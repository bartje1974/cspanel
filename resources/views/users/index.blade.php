@extends('adminlte::page')

@section('title', 'Websites')

@section('content_header')
    <h1> Users <small>Management</small></h1>
@stop

@section('content')


<div class="card">
            <div class="card-header">
              <h3 class="card-title">All users</h3>

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
              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                             <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                        @endif
                      </td>
                      <td>
                        <form id="delete_from_{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('profile.show', $user->id) }}">Show</a>
                            <a class="btn btn-primary btn-sm mr-2" href="{{ route('users.edit', $user->id) }}"><i class="fa faw fa-file"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                                <a href="javascript:void(0);" data-id="{{$user->id}}" class="_delete_data btn btn-danger btn-sm mr-2">
                                    <i class="fa faw fa-trash"></i> Delete
                                </a>
                          </form>

                      </td>
                    </tr>
                   @endforeach
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
            $('#users').dataTable();
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
