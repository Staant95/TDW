<header>
    <div class="logo">Logo</div>

    <div class="search-bar">
        <input type="text" placeholder="search product">
        <button class="search-btn">Search</button>
    </div>
    
    <div class="right-nav">

        <ul class="right-nav">
            <li class="right-nav-item">
                Ciao
            </li>
            <li class="right-nav-item" >
                Bla
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

