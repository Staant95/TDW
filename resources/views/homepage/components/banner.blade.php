<section class="small-banner section">
    <div class="container-fluid">

        <div class="row">


           
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{ asset('storage/bannerMenCollection.jpeg') }}" alt="#">
                    <div class="content">

                            <p style="color: white">Man's Collectons</p>
                            <h3 style="color: white">Summer travel <br> collection</h3>
                            <a href="{{ route('category.index', ['category' => 3]) }}" style="color: white; font-size: 1.5em">Discover Now</a>
                        
                    </div>
                </div>
            </div>


       
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{ asset('storage/bannerJeans.jpg') }}" alt="#">
                    <div class="content">
                        <p style="color: white">Jeans Collectons</p>
                        <h3 style="color: white">Awesome Jeans <br> 2020</h3>
                        <a href="{{ route('category.index', ['category' => 4]) }}" style="color: white; font-size: 1.5em;" >Shop Now</a>
                        
                    </div>
                </div>
            </div>
        


            <div class="col-lg-4 col-12">
                <div class="single-banner tab-height">
                    <img src="{{ asset('storage/bannerSales.jpg') }}" alt="#">
                    <div class="content">
                        <p style="color: white">Flash Sale</p>
                        <h3 style="color: white">Mid Season <br> Up to <span style="color : white">50%</span> Off</h3>
                        <a style="color: white; font-size: 1.5em" href="{{ route('category.index', ['category' => 1]) }}">Discover Now</a>
                    </div>
                </div>
            </div>
            


        </div>

    </div>
</section>
