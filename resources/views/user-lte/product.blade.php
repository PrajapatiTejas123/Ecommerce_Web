@extends('user-lte.mainapp')
@section('content')
	<!-- Header -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
.menu-link {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 5px;
    padding: 5px 8px;
    border: 0;
    border-radius: 50px;
    line-height: 1.5em;
    color: black;
    text-decoration: none;
    font-size: 15px;
    background: white;
    list-style: none;
}
.menu {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 5px;
    padding: 5px 8px;
    border: 0;
    border-radius: 50px;
    line-height: 1.5em;
    color: black;
    text-decoration: none;
    font-size: 15px;
    background: white;
    list-style: none;
}
.menu-act {
    background: slateblue;
    color: white;
}
.menu-active {
    background: slateblue;
    color: white;
}
.product-add-cart-active {
	color: #717fe0;
}
.product-add-cart-deactive{
	color: silver;
}
.btn-addwish-b2 {
	hover: display-block;
}

</style>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
				        <a href="{{'product'}}">
						All Products</a>
					</button>
					<form method="get" action="{{route('product')}}">
					@foreach($category as $key => $crud) 
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="category" value="{{$crud->id}}" style="color: black;"  data-filter=".women">
						 {{$crud->name}}
					</button>
					@endforeach	
				</form>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<form method="get" action="{{route('product')}}">
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
					</div>	
				</div>
			</form>
				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
				<form method="get" action="{{route('product')}}">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">

							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<!-- <li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li> -->
								<!-- <li>
								<button class="filter-link stext-106 trans-04 filter-link-active menu" name="newness" value="" type="button" style="color: black;"  data-filter=".women">
						 		Newness
								</button></li> -->
								<!-- <li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li> -->
								<li>
								<button class="filter-link stext-106 trans-04 mt-2 menu {{ ('asc' == request()->get('sortby')) ? ' menu-active' : '' }}" name="lowtohigh" id="lowtohigh" value="asc" type="button" onclick="function5()" style="color: black;"  data-filter=".women">
						 		Price: Low to High
								</button></li>
								<li>

								<button class="filter-link stext-106 trans-04 mt-2 menu {{ ('desc' == request()->get('sortby')) ? ' menu-active' : '' }}" name="prices" value="desc" onclick="function6()" id="hightolow" type="button" style="color: black;"  data-filter=".women">
						 		Price: High to Low
								</button></li>
								<input type="hidden" id="sortby" name="sortby" value="" />
							</ul>
						</div>
				
						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<!-- <li class="">
									<a href="{{route('product')}}"><button class="filter-link stext-106 trans-04 filter-link-active menu-link {{ ('all' == request()->get('price')) ? ' menu-active' : '' }}" type="button" style="color: black;"  data-filter=".women" value="all" name="prices"></a>
						 			All
									</button>
								</li> -->

								<li class="">

									<button class="filter-link stext-106 trans-04 mt-2 menu-link price {{ ('0-50' == request()->get('price')) ? ' menu-active' : '' }}" onclick="function1()" id="price" value="0-50" name="prices" type="button" style="color: black;">
						 			$0.00 - $50.00
									</button>
									<input type="hidden" id="prices1" name="price" value="" />
								</li>
								
								<li class="">
									<button class="filter-link stext-106 trans-04 mt-2 menu-link price {{ ('50-100' == request()->get('price')) ? 'menu-active' : '' }}" onclick="function2()" id="price1" name="prices" value="50-100" type="button" style="color: black;"  data-filter=".women">
										$50.00 - $100.00
									</button>
								</li>

								<li class="">
									<button class="filter-link stext-106 trans-04 mt-2 menu-link price {{ ('100-150' == request()->get('price')) ? ' menu-active' : '' }}" onclick="function3()" id="price2" name="prices" value="100-150" type="button" style="color: black;"  data-filter=".women">
										$100.00 - $150.00
									</button>
								</li>

								<li class="">
									<button class="filter-link stext-106 trans-04 mt-2 menu-link price {{ ('150-200' == request()->get('price')) ? ' menu-active' : '' }}" onclick="function7()" id="price3" name="prices" value="150-200" type="button" style="color: black;"  data-filter=".women">
										$150.00 - $200.00
									</button>
								</li>

								<!-- <li class="">
									<button class="filter-link stext-106 trans-04 mt-2 menu-link" onclick="function4()" name="prices" id="price3" value="150" type="button" style="color: black;"  data-filter=".women">
										$150.00+
									</button>
								</li> -->
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<!-- <li class="p-b-6"> -->
							@foreach($color as $key => $crud)
								<div class="flex-w p-t-4 m-r--5">
									<input type="checkbox" id="vehicle1" name="color[]" value="{{$crud->color}}" 
									@if (request()->get('color'))
	               	{{ in_array($crud->color, request()->get('color')) ? 'checked' : '' }}
	               	@endif > &nbsp;&nbsp;
									<!-- <span class="fs-15 lh-12 m-r-6 mt-1" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span> -->
							  	
									<a href="#" class="filter-link stext-106 trans-04 mt-1">
									{{ ucfirst($crud->color) }}	
									</a>
								</div>
								<!-- </li> -->
							  @endforeach
								<!-- <li class="p-b-6"> -->
								
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Categories
							</div>
								@foreach($category as $key => $crud)

								<div class="flex-w p-t-4 m-r--5">
								<input type="checkbox" id="categorys" name="categorys[]" value="{{$crud->id}}"
								 {{request('category') == $crud->id ? 'checked' : ''}}
	               @if (request()->get('categorys'))
	               {{ in_array($crud->id, request()->get('categorys')) ? 'checked' : '' }}
	               @endif 
								 >&nbsp;&nbsp;
								<a href="" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5 mt-1">
									{{$crud->name}}
								</a>
								
							</div>
							@endforeach
							<button type="submit" class="btn btn-outline-primary mt-3">Search Product</button>
						</div>
					</div>
				 </form>
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach($products as $key => $crud) 
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<input type="hidden" value="{{$crud->id}}" class="p_id">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{asset('image')}}/{{ $crud->image }}" alt="IMG-PRODUCT">

							<a href="" onclick="ProductDetails({{ $crud->id }}, this)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</form>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$crud->title}}
								</a>

								<span class="stext-105 cl3">
									${{$crud->price}}
								</span>
							</div>

							

							<div class="block2-txt-child2 flex-col-l mt-2">
								
								<a href="#" class="dis-block pos-relative js-addwish-b2">
								@if(Auth::user())
								@if(in_array($crud->id,$favcheck))

									<img class=" dis-block trans-04" onclick="AddToFavourite({{ $crud->id }}, this)" src="{{asset('images/icons/icon-heart-02.png')}}" alt="ICON" id="fill">
								@else
									<img class="dis-block trans-04" onclick="AddToFavourite({{ $crud->id }}, this)" src="{{asset('images/icons/icon-heart-01.png')}}" alt="ICON" id="blank">
								@endif
								@endif
								</a>
								@if(Auth::user())
								@if(in_array($crud->id,$productschecked))
								<span class="stext-105 cl3 cart" id="cart">
								<i class="zmdi zmdi-shopping-cart product-add-cart-active" onclick="AddToCart({{ $crud->id }}, this)" style="font-size: 28px;"></i>
								</span>
							  @else
							  	<span class="stext-105 cl3 cart" id="cart">
									<i class="zmdi zmdi-shopping-cart" onclick="AddToCart({{ $crud->id }}, this)" style="font-size: 28px;"></i>
							  @endif
							  @endif
							</div>
						</div>
					</div>
				</div>
				@endforeach 
			</div>

			<!-- Load more -->
			<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->

		</div>
	</div>
		

	<!-- Footer -->
	


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="prodetails" id="prodetails">
					
				</div>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){	
		$(".menu-link").click(function(){
			$('.menu-link').removeClass('menu-active');
			$(this).addClass('menu-active')
		});
	});	
</script>

<!-- High to low and low to high !-->

<script type="text/javascript">
	
		$(".menu").click(function(){
			$('.menu').removeClass('menu-active');
			$(this).addClass('menu-active')
			//alert('ok');
		});	
</script>
<script>
    function AddToCart(id, e) {
    	  //alert(id)
            $.ajax({
                url: '{{ url('/addtocart') }}/' + id,
                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  
                type: 'POST',
                //data: { id: },
                _token: '{{ csrf_token() }}',
                success: function(response)
                {
                		
                    if (response.success == true) {
                     		swal("","Product Is Added In Cart !", "success");
                		    $(e).addClass('product-add-cart-active');
                		    $("#viewcart").append(response.html);

                     }else{
                     		swal("","Product Is Already Added In Cart !", "info");
                     }
                }
            });
       }    
</script>

<script type="text/javascript">
  	function function1() {
  	var price = $("#price").val();
  	//alert(price)
  	$("#prices1").val(price);
	} 
	function function2() {
  	var price1 = $("#price1").val();
  	$("#prices1").val(price1);
	} 
	function function3() {
  	var price1 = $("#price2").val();
  	$("#prices1").val(price1);
	} 
	function function7() {
  	var price1 = $("#price3").val();
  	$("#prices1").val(price1);
	} 
	function function4() {
  	var price1 = $("#price3").val();
  	$("#prices1").val(price1);
	} 
	function function5() {
  	var price1 = $("#lowtohigh").val();
  	$("#sortby").val(price1);
	} 
	function function6() {
  	var price1 = $("#hightolow").val();
  	$("#sortby").val(price1);
	}

//btn-addwish-b2       icon-heart1 
</script>
@endsection