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
                        <form class="search-form" action="" method="GET">
                            @csrf

                            <input type="text" placeholder="Search me" name="search">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>


            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">
                    <div class="search-bar">
                        {{--  missing select option     --}}
                        <form method="GET" action="{{ route('search.index') }}">
                            <input name="search" placeholder="Search Products" type="search">
                            <button class="btnn"><i class="ti-search"></i></button>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->

                    {{--    Wishlis          --}}
                    <div class="sinlge-bar">
                        <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    </div>

                    {{-- USER ACCOUNT --}}
                    <div class="sinlge-bar">
                        <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                    </div>

                    {{-- CART --}}
                    <div class="sinlge-bar shopping" id="cartContainer">
                                                                                            <!-- \Cart::getContent()->count() -->
                    {{--                        <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ $cartItems }}</span></a>--}}
{{--                        <!-- Shopping Item -->--}}
{{--                        <div class="shopping-item">--}}

{{--                            <div class="dropdown-cart-header">--}}
{{--                                <!-- \Cart::getContent()->count() -->--}}
{{--                                <span>{{ $cartItems }}</span>--}}
{{--                                <!-- change link  -->--}}
{{--                                <a href="#">View Cart</a>--}}
{{--                            </div>--}}
{{--                            <ul class="shopping-list">--}}
{{--                                --}}{{-- @foreach($item in $cart) --}}
{{--                                <li>--}}
{{--                                    <!-- DELETE /cart/$item->id, CHANGE THE ACTION-->--}}
{{--                                    <form method="POST" action="/cart/1">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button class="remove" type="submit">--}}
{{--                                            <i class="fa fa-remove"></i>--}}
{{--                                        </button>--}}

{{--                                    </form>--}}

{{--                                    <a class="cart-img" href="#">--}}
{{--                                        <img src="https://via.placeholder.com/70x70" alt="#">--}}
{{--                                    </a>--}}
{{--                                    <h4><a href="#">Woman Ring</a></h4>--}}
{{--                                    <p class="quantity">1x - <span class="amount">$99.00</span></p>--}}
{{--                                </li>--}}

{{--                            </ul>--}}
{{--                            <div class="bottom">--}}
{{--                                <div class="total">--}}
{{--                                    <span>Total</span>--}}
{{--                                    <!-- \Cart::getTotal() -->--}}
{{--                                    <span class="total-amount">$134.00</span>--}}
{{--                                </div>--}}
{{--                                <!-- route('checkout') -->--}}
{{--                                <a href="checkout.html" class="btn animate">Checkout</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!--/ End Shopping Item -->

                        <cart-component user-id="1"></cart-component>

                    </div>

                    {{-- END CART--}}

                </div>
            </div>
        </div>
    </div>
</div>
