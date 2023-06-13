    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                        <!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
                            My Account
                        </a> -->

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>

                        <!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
                            USD
                        </a>  --> 

                    </div>

                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="color:azure;">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="color:azure;">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

                </div>
            </div>

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="{{url('')}}" class="logo">
                        <img src="{{asset('images/icons/logo-01.png')}}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">

                        <ul class="main-menu">
                            <li class="{{ request()->is('/') ? 'active-menu' : ''}}">
                                <a href="{{url('')}}">Home</a>
                            </li>

                            <li class="{{ request()->is('product') ? 'active-menu' : ''}}" >
                                <a href="{{'product'}}">Product</a>
                            </li>

                            @if (Route::has('login'))
                            @auth
                            <li>
                               <button class="btn dropdown-toggle text-dark" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <li style="margin: 0px; color: #333; font-family: poppins-medium; font-size: 14px; margin-top: 18px;">My Account</li>
                        </button>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a  href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                        <i class="fa fa-sign-out" style="padding:5px;"></i>Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <!-- <li><a href="#"><i class="fa fa-user-o"></i> My Profile</a></li>
                        <li><a href="#"><i class="fa fa-user-o"></i> Change Password</a></li> -->
                         </ul>
                         @else
                        <!-- <ul class="header-links pull-right">
                            <li class="{{ request()->is('/userlogin') ? 'active-menu' : ''}}"><a href="{{url('/userlogin')}}" class="flex-c-m trans-04 p-lr-25 mt-0" style="color: #333; font-family: poppins-medium; font-size: 14px;"> Login</a></li>
                        </ul> -->
                        <li class="{{ request()->is('login') ? 'active-menu' : ''}}" >
                                <a href="{{'login'}}">Login</a>
                            </li>
                        </li>
                        <!-- <ul class="header-links pull-right">
                            <li class="{{ request()->routeIs('register*') ? 'active-menu' : 'simple' }}"><a href="{{url('register')}}" class="flex-c-m trans-04 p-lr-25 mt-0" style="font-family: poppins-medium; font-size: 14px;"> Register</a></li>
                            
                        </ul> -->
                        <li class="{{ request()->is('register') ? 'active-menu' : ''}}" >
                                <a href="{{'register'}}">Register</a>
                            </li>
                        </li>
                            @endauth
                            @endif
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        @php
                        $cart = App\Http\Controllers\HomeController::getProductCount();
                        @endphp
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="cart" data-notify="{{ $cart }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        @php
                        $fav = App\Http\Controllers\HomeController::getfavcount();
                        @endphp
                        <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="fav" data-notify="{{ $fav }}">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>
                </nav>
            </div>  
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            EN
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            USD
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{url('/')}}">Home</a>
                    <ul class="sub-menu-m">
                        <li><a href="index.html">Homepage 1</a></li>
                        <li><a href="home-02.html">Homepage 2</a></li>
                        <li><a href="home-03.html">Homepage 3</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="product.html">Shop</a>
                </li>

                <li>
                    <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
                </li>

                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{asset('images/icons/icon-close2.png')}}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>
    @php
        $cartitem = App\Http\Controllers\HomeController::getCartProduct();
    @endphp  
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            @if (!empty($cartitem)) 
            @foreach($cartitem as $key => $crud)
            
                <div class="header-cart-content flex-w js-pscroll" id="viewcart">
                    <ul class="header-cart-wrapitem w-full">
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="{{asset('image')}}/{{ $crud->product->image }}" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{$crud->product->title}}
                                </a>

                                <span class="header-cart-item-info">
                                    {{$crud->quantity}} x ${{$crud->product->price}}
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
            @else
                <h3>Record Not Found</h3>
            @endif
            <div class="w-full">
                        <div class="header-cart-total w-full p-tb-40">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons flex-w w-full">
                            <a href="{{'viewcart'}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                View Cart
                            </a>

                            <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                Check Out
                            </a>
                        </div>
                    </div>
        </div>
    </div>
