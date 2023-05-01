@extends('admin-lte.mainadmin')
@section('content') 
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('insertuser')}}" enctype='multipart/form-data'>
              	@csrf
                <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">FirstName<span class="text-danger">*</span></label>
                    <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Enter FirstName">
                    @error('firstname')
          			     <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">LastName<span class="text-danger">*</span></label>
                    <input type="text" value="{{old('lastname')}}" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Enter LastName">
                    @error('lastname')
          			    <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
            </div>
                 
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Email<span class="text-danger">*</span></label>
                  <input type="text" name="email" class="form-control" value="{{old('email')}}" id="exampleInputPassword1" placeholder="Enter Your Email">
                    @error('email')
          			  <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Password<span class="text-danger">*</span></label>
                  <input type="password" value="{{old('password')}}" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                @error('password')
          			   <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password<span class="text-danger">*</span></label>
                  <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your ConfirmPassword">
                    @error('confirm_password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact<span class="text-danger">*</span></label>
                  <input type="text" value="{{old('contact')}}" name="contact" class="form-control" id="exampleInputPassword1" placeholder="Enter Contact">
                @error('contact')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Address<span class="text-danger">*</span></label>
                  <input type="text" value="{{old('address')}}" name="address" class="form-control" id="exampleInputPassword1" placeholder="Enter Address">
                @error('address')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Date Of Birth</label>
                  <input type="date" value="{{old('dob')}}" name="dob" class="form-control" id="exampleInputPassword1" placeholder="Enter Date Of Birth">
                @error('dob')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Gender<span class="text-danger">*</span></label>
                    <div class="mb-1">
            			<div class="form-check form-check-inline">
              			<input type="radio" id="male" name="gender" value="male"{{ old('gender') == 'male' ? 'checked' : ''}}>
              			<label class="form-check-label" for="inlineRadio1">Male</label>
            			</div>
           				 <div class="form-check form-check-inline">
              			<input type="radio" id="female" name="gender" value="female"{{ old('gender') == 'female' ? 'checked' : ''}}>
              			<label class="form-check-label" for="inlineRadio2">Female</label>
            			</div>
            			</div>
                    @error('gender')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
             <div class="col-md-6">
                <label>Status<span class="text-danger">*</span></label>
                <select id="active" value="{{old('active')}}" name="active" class="form-control">
                    <option selected value="">Select</option>
                    <option  value="0" {{old('active') == '0' ? "selected" : ""}}>Active</option>
                    <option  value="1" {{old('active') == '1' ? "selected" : ""}}>Inactive</option>
                </select>
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
            	<div class="col-md-6">
                <div class="form-group">
                 <label>Roles<span class="text-danger">*</span></label>
                <select id="roles" value="{{old('roles')}}" name="roles" class="form-control">
                    <option selected value="">Select</option>
                    <option  value="0" {{old('roles') == '0' ? "selected" : ""}}>Admin</option>
                    <option  value="1" {{old('roles') == '1' ? "selected" : ""}}>User</option>
                </select>
                @error('roles')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms&condition" class="custom-control-input" id="exampleCheck1" value="terms&condition"{{ old('terms&condition') == 'terms&condition' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#" data-toggle="modal" data-target="#exampleModal">terms of service</a>.</label>  
                    </div>
                     <span class="text-danger"><strong>{{$errors->first('terms&condition')}}
                        </strong>
                        </span>
                    </div>

          </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

    </script>
@endsection