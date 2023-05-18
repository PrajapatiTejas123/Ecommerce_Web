<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('user-lte.mainapp')
@section('content')

    
    
    <!-- Header -->

    <!-- Cart -->
    

        

    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url(images/slide-01.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Women Collection 2018
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men New-Season
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men Collection 2018
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    New arrivals
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Banner -->
    

<div class="container">
            <div class="p-b-10 mt-5">
                <h3 class="ltext-103 cl5">
                      Latest Product
                </h3>
            </div>
</div>
    <!-- Product -->
<div class="bg0 m-t- p-b-">
    <div class="container">
        <div class="row isotope-grid mt-5">
                 
                @foreach($product as $key => $crud) 

                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('image') }}/{{ $crud->image }}" alt="IMG-PRODUCT">

                            <a href="#" onclick="ProductDetails({{ $crud->id }}, this)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $crud->title }}
                                </a>

                                <span class="stext-105 cl3">
                                    {{ $crud->price }}
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                @php $countwishlist = 0 @endphp
                                @if(Auth::check())
                                    @php
                                        $countwishlist = App\Models\Productwishlist::countwishlist($crud['id'])
                                    @endphp
                                    @endif
                                <a href="#" data-productid="{{ $crud->id }}"  class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    @if($countwishlist > 0)
                                   <!--  <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" id="blank" alt="ICON"> -->
                                     <img class="icon-heart2 dis-block trans-04 ab-t-l" id="fill" src="images/icons/icon-heart-02.png" alt="ICON">
                                    @else
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" id="blank" alt="ICON">
                                    <!-- <img class="icon-heart2 dis-block trans-04 ab-t-l" id="fill" src="images/icons/icon-heart-02.png" alt="ICON"> -->
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

               @endforeach 

            </div>
        </div>
    </div>

    <div class="flex-c-m flex-w w-full  mb-5 mt-0">
                <a href="{{ url('/product') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
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

@endsection