@extends('admin-lte.mainadmin')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'/admin/dashboard'}}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <form method="POST" action="{{ route('updateuser',$users->id) }}" enctype='multipart/form-data'>
              	@csrf
                <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">FirstName<span class="text-danger">*</span></label>
                    <input type="text" value="{{old('firstname',$users->firstname)}}" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Enter FirstName">
                    @error('firstname')
          			     <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">LastName<span class="text-danger">*</span></label>
                    <input type="text" value="{{old('lastname',$users->lastname)}}" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Enter LastName">
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
                  <input type="text" name="email" class="form-control" value="{{old('email',$users->email)}}" id="exampleInputPassword1" placeholder="Enter Your Email">
                    @error('email')
          			  <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact<span class="text-danger">*</span></label>
                  <input type="text" value="{{old('contact',$users->contact)}}" name="contact" class="form-control" id="exampleInputPassword1" placeholder="Enter Contact">
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
                  <input type="text" value="{{old('address',$users->address)}}" name="address" class="form-control" id="exampleInputPassword1" placeholder="Enter Address">
                @error('address')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Date Of Birth<span class="text-danger">*</span></label>
                  <input type="date" value="{{old('dob',$users->dob)}}" name="dob" class="form-control" id="exampleInputPassword1" placeholder="Enter Date Of Birth">
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
              			<input type="radio" id="male" name="gender" value="male"{{ old('gender',$users->gender) == 'male' ? 'checked' : ''}}>
              			<label class="form-check-label" for="inlineRadio1">Male</label>
            			</div>
           				 <div class="form-check form-check-inline">
              			<input type="radio" id="female" name="gender" value="female"{{ old('gender',$users->gender) == 'female' ? 'checked' : ''}}>
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
                <select id="active" value="{{old('active',$users->active)}}" name="active" class="form-control">
                    <option selected value="">Select</option>
                    <option  value="0" {{old('active',$users->active) == '0' ? "selected" : ""}}>Active</option>
                    <option  value="1" {{old('active',$users->active) == '1' ? "selected" : ""}}>Inactive</option>
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
                <select id="roles" value="{{old('roles',$users->roles)}}" name="roles" class="form-control">
                    <option selected value="">Select Roles</option>
                    <option  value="0" {{old('roles',$users->roles) == '0' ? "selected" : ""}}>Admin</option>
                    <option  value="1" {{old('roles',$users->roles) == '1' ? "selected" : ""}}>User</option>
                </select>
                @error('roles')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" checked name="terms&condition" class="custom-control-input" id="exampleCheck1" value="terms&condition"{{ old('terms&condition') == 'terms&condition' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#" data-toggle="modal" data-target="#exampleModal">terms of service</a>.</label>  
                    </div>
                     <span class="text-danger"><strong>{{$errors->first('terms&condition')}}
                        </strong>
                        </span>
                    </div>

          </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">
          </div> 
        </div>  
      </div>
    </section>
@endsection