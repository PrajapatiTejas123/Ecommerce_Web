<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{ asset('userlte/images/icons/favicon.png') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/slick/slick.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/MagnificPopup/magnific-popup.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('userlte/css/main.css') }}">
<!--===============================================================================================-->
</head>

    <body>
    @include('user-lte.header')
    @yield('content')

    @include('user-lte.footer')
 <script src="{{ asset('userlte/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
 <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}"></script>
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>
<script>
 <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.slim.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js') }}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js') }}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('userlte/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('userlte/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('userlte/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");
                $(this).addClass('js-addedwish-b2');
                $(this).off('js-addedwish-b2');
            });
        });

        

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('js-addedwish-b2');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
<!--===============================================================================================-->
    <script src="{{ asset('userlte/js/main.js') }}"></script>

<script type="text/javascript">
    var user_id = "{{ Auth::id() }}";
        $(document).ready(function(){
            $('.btn-addwish-b2').click(function(){
                var product_id = $(this).data('productid');
                // alert(product_id);
                $.ajax({
                 url: '/btn-addwish-b2',
                 type: 'post',
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    _token: '{!! csrf_token() !!}',
                    product_id: product_id,
                    user_id: user_id
                },
                success: function (response) {
                    if(response.action == 'add'){
                        $('a[data-productid ='+product_id+']').html('<img class="icon-heart2 dis-block trans-04 ab-t-l" id="fill" src="images/icons/icon-heart-02.png" alt="ICON">');
                        // $('.icon-heart2').append('<img class="icon-heart2 dis-block trans-04 ab-t-l" id="fill" src="images/icons/icon-heart-02.png" alt="ICON">');  
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                    } else if(response.action == 'remove'){
                        $('a[data-productid ='+product_id+']').html('<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" id="blank" alt="ICON">');

                        // $('.icon-heart1').append('<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" id="blank" alt="ICON">');
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'red');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                        // setInterval('location.reload()', 3000);
                    }
                }

                });
            });
        });
    </script>

<!--===============================================================================================-->
<script>
    var user = "{{ Auth::id() }}";
    if(user){
        setInterval(function () {CartTotal()}, 2000);
    }
    
    function CartTotal() {
        //alert('okkk');
            $.ajax({
                 url: "{{route('getProductCount')}}",
                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  
                type: 'POST',
                _token: '{{ csrf_token() }}',
                success: function(response)
                {
                    $("#cart").attr('data-notify', response);
                }
            });
        } 
</script>

</body>
</html>