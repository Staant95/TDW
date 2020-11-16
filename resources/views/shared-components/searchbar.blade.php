<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="/"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->

                <div class="search-top">
                    <div class="top-search">
                        <a href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form class="search-form" action="{{ route('search') }}" method="GET">
                            @csrf

                            <input type="text" placeholder="Search me" name="product">
                            <button type="submit" style="background-color: #f7941d">
                                <i style="color: white" class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->

                <div class="mobile-nav">
                    {{-- slicknav should add the navigation --}}
                </div>

            </div>


            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">

                    <div class="search-bar">

                        <form method="GET" action="{{ route('search') }}">
                            <input name="product" placeholder="Search Products">
                            <button class="btnn" style="background-color: #f7941d">
                                <i style="color: white" class="ti-search"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->

                    <div class="sinlge-bar">
                        <a href="{{ route('wishlists.products.index', ['wishlist' => Auth::user()->wishlist->id]) }}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    </div>

                    {{-- CART --}}
                    <div class="sinlge-bar shopping" id="cartContainer">

                                                                                            <!-- \Cart::getContent()->count() -->
   

                        <cart-component 
                        user-id=" {{ Auth::id() }} "
                        cart-id=" {{ Auth::user()->cart->id }} " 
                        ></cart-component>



                        {{-- <cart-component user-id="{{ Auth::id() }}" ></cart-component> --}}

                    </div>

                    <div class="sinlge-bar">
                        <a href="{{ route('profile') }}" class="single-icon">
                            {{-- Hi, {{ Auth::user()->name }}</i>--}}
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </a>
                    </div>

                    {{-- END CART--}}

                </div>
            </div>
        </div>
    </div>
</div>
