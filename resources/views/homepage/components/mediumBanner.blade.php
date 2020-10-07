<section class="midium-banner">
    <div class="container">
        <div class="row">
           


            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{ asset('storage/mediumBannerMen.jpeg') }}" alt="#">
                    <div class="content">
                        <p>Man's Collectons</p>
                        <h3 style="color:white">Man's items <br>Up to<span> 50%</span></h3>
                        <a href="{{ route('category.index', ['category' => 3]) }}">Shop Now</a>
                    </div>
                </div>
            </div>


       
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{ asset('storage/mediumBannerShoes.jpeg') }}" alt="#">
                    <div class="content">
                        <p>shoes</p>
                        <h3 style="color: white">mid season <br> up to <span>70%</span></h3>
                        <a href="{{ route('category.index', ['category' => 5]) }}" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>


            
        </div>
    </div>
</section>
