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
              <li class="breadcrumb-item active">Edit Product</li>
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
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('updateproduct',$product->id) }}" enctype='multipart/form-data'>
              	@csrf
                <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" value="{{old('title',$product->title)}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                    @error('title')
          			     <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" value="{{old('description',$product->description)}}" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter Description">
                    @error('description')
          			    <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
            </div>
                 
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Sku</label>
                  <input type="text" name="sku" class="form-control" value="{{old('sku',$product->sku)}}" id="exampleInputPassword1" placeholder="Enter Model Number">
                    @error('sku')
          			  <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" value="{{old('image',$product->image)}}" name="image" class="form-control" id="image" placeholder="Enter Image">
                @error('image')
          			   <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Price</label>
                  <input type="text" name="price" class="form-control" value="{{old('price',$product->price)}}" id="exampleInputPassword1" placeholder="Enter Price">
                    @error('price')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Quantity</label>
                  <input type="text" value="{{old('qty',$product->qty)}}" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Enter Quantity">
                @error('qty')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label>Category<span class="text-danger"></span></label>
                <select id="status" value="{{old('category_id',$product->category_id)}}" name="category_id" class="form-control">
                    <option selected value="">Select Category</option>
                   @foreach ($category as $data)
                    <option value="{{$data->id}}" {{(old('category_id',$product->category_id) == $data->id) ? 'selected' : ''}}>
                        {{$data->name}}
                    </option>
                        @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Discount</label>
                  <input type="text" value="{{old('discount',$product->discount)}}" name="discount" class="form-control" id="exampleInputPassword1" placeholder="Enter Discount">
                @error('discount')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                    <input type="text" value="{{old('color',$product->color)}}" name="color" class="form-control" id="exampleInputEmail1" placeholder="Enter Color">
                    @error('color')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
             <div class="col-md-6">
                <label>Status<span class="text-danger"></span></label>
                <select id="status" value="{{old('status',$product->status)}}" name="status" class="form-control">
                    <option selected value="">Select Status</option>
                    <option  value="0" {{old('status',$product->status) == '0' ? "selected" : ""}}>Active</option>
                    <option  value="1" {{old('status',$product->status) == '1' ? "selected" : ""}}>Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
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