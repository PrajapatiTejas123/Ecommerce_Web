@extends('admin-lte.mainadmin')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>User Management</h1>
          </div>
         
          <div class="col-sm-4">
            <a href="{{'add'}}" class="btn btn-success">Add User</a>
          </div>
          
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin/dashboard'}}">Home</a></li>
              <li class="breadcrumb-item active">List User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if ($message = Session::get('success'))
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success mt-2">
               {{ $message }}
            </div>
          </div>
        </div>
      </div>
    @endif

<div class="wrapper mt-3">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>DoB</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Roles</th>
                    
                    <th>Action</th>
                    <!-- <th>Delete</th> -->
                    
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($users as $key => $user) 
                  <tr>
                    <td scope="row">{{$users->firstItem()+$key}}</td>
                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->contact}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->gender}}</td>
                    <td>
                    	@if($user->active == 0)
                    		Active
                    	@else
                    		Inactive
                    	@endif
                    </td>
                    <td>
                    	@if($user->roles == 0)
                    		Admin
                    	@else
                    		User
                    	@endif
                    </td>
                    
                    <td><a href="{{ route('edituser',$user->id) }}"><i class="fa fa-edit" style="font-size:28px; color:green;"></i></a> 
                    <button
                    type ="button" class="btn btn-danger btn-sm" onclick="OpenDeleteModal({{ $user->id }})"><i class="fa fa-trash"></i></button>
                    </td>
                    
                  </tr>
                  @endforeach 
                  </tbody>
                  
                </table>
                <div class="text-center" style="font-size:xx-large;">
                  @if ($users->isEmpty())
                  No Record Found
                  @endif
                </div>
                <div class="d-flex" style="margin:20px;">
                  {!! $users->withQueryString()->links() !!}
                </div>
              </div>
              
            </div>
           
          </div>
          
        </div>
        
      </div>
      
    </section>
    <div class="modal fade" id="DeleteuserModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="delete" name="delete_id">
        <h4>Are you Sure ? want to delete this data?</h4>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="user-modal-confirm_delete">Yes Delete</button>
      </div>
    </div>
  </div>
</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

    </script>
    
 <script>
        function OpenDeleteModal(id) {
            $('#user-modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
            $('#DeleteuserModel').modal('show');
        }

        function confirmDelete(id) {
            $.ajax({
                url: '{{ url('admin/user/delete') }}/' + id,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                   _token: '{!! csrf_token() !!}',
                 },
                success: function (data) {
                    setInterval('location.reload()', 1000);

              $('#DeleteuserModel').modal('hide');
                },
                error: function (error) {
                 
                    // Error logic goes here..!
                }
            });
        }
    </script>
@endsection