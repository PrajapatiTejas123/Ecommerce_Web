
    <ul class="header-cart-wrapitem w-full">
        <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img">
                <img src="{{asset('image')}}/{{ $user->product->image }}" alt="IMG">
            </div>

            <div class="header-cart-item-txt p-t-8">
                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                    {{$user->product->title}}
                </a>

                <span class="header-cart-item-info">
                    {{$user->quantity}} x {{$user->product->price}}
                </span>
            </div>
        </li>
    </ul>

        