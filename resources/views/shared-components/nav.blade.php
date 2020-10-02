<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">

                <div class="col-lg-3">
                    <div class="all-category"
                    style="height: 100%; display:flex; justify-content: center; align-items: center;"
                    >

                        <label 
                        class="cat-heading" 
                        for="toggle-nav"
                        style="height:100%; display: inline-block; align-self: stretch; padding-top: 1em; padding-bottom: 0"
                        >
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            Categories
                        </label>
                        <input type="checkbox" hidden id="toggle-nav" checked="false">
                        <ul class="main-category">
                            @php
                                $categories = App\Category::limit(9)->get();
                            @endphp
                            @foreach($categories as $category)
                            <li><a href="#"> {{ $category->name }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">

                                        <li><a href="#">New Arrivals</a></li>
                                        <li><a href="#">Today's Deal</a></li>
                                        <li><a href="#">Sell</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
