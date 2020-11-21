<section class="shop-home-list section mt-5">


    <div class="container">
        <div class="row">
            <!--  iterate over categories -->
            @foreach($saleCategories as $category)
                 <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1> {{ $category->name }} </h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->

                <!--  iterate products categories -->
                        @foreach($category->products as $product)
                        <div class="single-list">
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        {{-- <img src="https://via.placeholder.com/115x140" alt="#"> --}}
                                        <img src="{{ $product->getFirstMediaUrl() }}" alt="#"
                                        style="height: 250px!important; object-fit: cover;"
                                        >
                                        <a href="products/ {{ $product->id }}" class="buy"
                                           style="display: flex; justify-items: center; align-items: center; padding: 0!important;">
{{--                                            <i class="fa fa-shopping-bag"></i>--}}
                                            <i style="width: 100%; padding: 0!important; margin: 0!important;" class="fa fa-shopping-bag" aria-hidden="true"></i>

                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="{{ $product->getFirstMediaUrl() }}"> {{ $product->name }}</a></h4>
                                        <p class="price with-discount"> {{ $product->price }} €</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach

        </div>
            @endforeach
    </div>
</section>
