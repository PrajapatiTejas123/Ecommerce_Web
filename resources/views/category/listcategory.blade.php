@extends('admin-lte.mainadmin')
@section('content') 

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Category Management</h1>
          </div>
         
          <div class="col-sm-4">
            <a href="{{'/admin/category/add'}}" class="btn btn-success">Add Category</a>
          </div>
          
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin/dashboard'}}">Home</a></li>
              <li class="breadcrumb-item active">List Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if ($message = Session::get('success'))
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-primary mt-2">
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
                <h3 class="card-title">List Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($category as $key => $crud) 
                  <tr>
                    <td scope="row">{{$category->firstItem()+$key}}</td>
                    <td>{{$crud->name}}</td>
                    <td>
                    @if($crud->status =='0')
                      Active
                    @else($crud->status =='1')
                      Inactive
                    @endif
                    </td>
                    <td><a href="{{ route('edit',$crud->id)}}"><i class="fa fa-edit" style="font-size:28px; color:green;"></i></a> </td>
                    <td>
                    <button type="button" class="btn btn-danger"
                    onclick="loadDeleteModal({{ $crud->id }}, `{{ $crud->username }}`)">Delete
                                </button>
                    </td>
                  </tr>
                  @endforeach 
                  </tbody>
                  
                </table>
                <div class="text-center" style="font-size:xx-large;">
                  @if ($category->isEmpty())
                  No Record Found
                  @endif
                </div>
                <div class="d-flex" style="margin:20px;">
                  {!! $category->withQueryString()->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      
    </section>
    
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="deleteCategory" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <span id="modal-category_name"></span>?
                        <input type="hidden" id="category" name="category_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>

 <script>
        function loadDeleteModal(id, name) {
            $('#modal-category_name').html(name);
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
            $('#deleteCategory').modal('show');
        }

        function confirmDelete(id) {
            $.ajax({
                url: '{{ url('/admin/category/delete') }}/' + id,
                //console.log('tejas');
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                   _token: '{!! csrf_token() !!}',
                 },
                success: function (data) {
                    setInterval('location.reload()', 1000);

              $('#deleteCategory').modal('hide');
                },
                error: function (error) {
                  
                    // Error logic goes here..!
                }
            });
        }
    </script>


@endsection
