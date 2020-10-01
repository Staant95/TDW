<header>
    <div class="logo">Logo</div>

    <div class="search-bar">
        <form action="{{ route('search.index') }}" method="GET">
            @csrf
            <input name="search" type="search" placeholder="search product">
            <button class="search-btn" type="submit">
                <i class="ti-search"></i>
            </button>
        </form>
    </div>
    
    <div class="right-nav">

        <ul class="right-nav">
            <li class="right-nav-item">
                <i class="fa fa-heart-o" aria-hidden="true"></i>                
            </li>
            <li class="right-nav-item ">
                <div class="sinlge-bar shopping" id="cartContainer">

                    <cart-component user-id="{{ Auth::id() }}" ></cart-component>

                </div>
            </li>
            <li class="right-nav-item">
                Cart
            </li>
        </ul>
        <label id="menu-label" for="menu">
            X
        </label>
        
    </div>
    <input id="menu" type="checkbox" hidden>
    
   

    <ul class="navigation">
        <li class="navigation-item">
            <label for="categories-menu" id="categories-menu-label">
                Categories
            </label>
            <!-- <button>Categories</button> -->
            <input type="checkbox" id="categories-menu" hidden>
            <ul id="sub-category">
                @foreach($categories as $category)
                    <li>
                        <button>
                            {{ $category->name }} 
                        </button>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="navigation-item">
            <button>Sell</button>
        </li>
        <li class="navigation-item">
            <button>Contact</button>
        </li>
        <li class="navigation-item">
            <button>New Arrivals</button>
        </li>
        <li class="navigation-item">
            <button>Today's Deal</button>
        </li>
        
    </ul>

</header>

