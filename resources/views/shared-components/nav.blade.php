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
                        
                        
                        {{-- <ul class="main-category">
                            @php
                                $categories = App\Category::where('parent_id', NULL)->get();
                                $abbigliamento = $categories[0]->products;
                            @endphp

                            @foreach($categories as $index => $category)
                                <li>
                                    <a href="{{ route('category.index', ['category' => $category->id]) }}"> 
                                        {{ $category->name }}  
                                    </a>
                                </li>
                            @endforeach

                            
                        </ul> --}}

                        @php
                            $categories = App\Category::where('parent_id', NULL)->get();
                            $temp = $categories[1];
                            $categories[1] = $categories[3];
                            $categories[3] = $temp;

                            $abbigliamento = App\Category::where('parent_id', 1)->get();
                            $accessori = App\Category::where('parent_id', 12)->get();
                        @endphp

                        <ul class="main-category">
                            @foreach ($categories as $category)
                                
                                <li>
                                    <a href="{{ $category->id }}"> {{ $category->name }}
                                        @if ($category->id === 1 || $category->id === 12)
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        @endif
                                    </a>

                                    @if ($category->id === 1 )
                                        
                                        <ul class="sub-category">
                                            @foreach ($abbigliamento as $subC)
                                                <li>
                                                    <a href="{{ $subC->id }}"> {{ $subC->name }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif


                                    @if ($category->id === 12)

                                        <ul class="sub-category">
                                            @foreach ($accessori as $subC)
                                                <li>
                                                    <a href="{{ $subC->id }}"> {{ $subC->name }} </a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    @endif
                                </li>
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

                                        <li><a href="{{ route('category.index', ['category' => 8]) }}">New Arrivals</a></li>
                                        <li><a href="{{ route('category.index', ['category' => 9]) }}">Today's Deals</a></li>
                                        <li><a href="/contact">Contact Us</a></li>
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


