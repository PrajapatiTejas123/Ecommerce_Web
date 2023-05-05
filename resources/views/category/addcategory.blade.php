@extends('admin-lte.mainadmin')
@section('content') 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin/dashboard'}}">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('insertcategory')}}">
              	@csrf
                <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    @error('name')
          			     <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
             <div class="col-md-6">
                <label>Status<span class="text-danger"></span></label>
                <select id="status" value="{{old('status')}}" name="status" class="form-control">
                    <option selected value="">Select Status</option>
                    <option  value="0" {{old('status') == '0' ? "selected" : ""}}>Active</option>
                    <option  value="1" {{old('status') == '1' ? "selected" : ""}}>Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

          </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
@endsection
