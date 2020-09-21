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

                        <cart-component user-id="{{ Auth::id() }}" ></cart-component>

                    </div>

                    {{-- END CART--}}

                </div>
            </div>
        </div>
    </div>
</div>
