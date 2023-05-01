@extends('user-lte.mainapp')

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
           Login
        </h2>
    </section>  
    <section class="bg0 p-t-104 p-b-116">
       
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                           <!--  <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label> -->

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Enter Email" autofocus>

         					@error('email')
                    		<span class="invalid-feedback" role="alert">
                        	<strong>{{ $message }}</strong>
                    		</span>
                       		 @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Enter Password">

					        @error('password')
					            <span class="invalid-feedback" role="alert">
					            <strong>{{ $message }}</strong>
					            </span>
					        @enderror
                            </div>
                        </div>

                        
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
