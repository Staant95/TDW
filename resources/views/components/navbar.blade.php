<div>

       <nav class="navbar navbar-expand-md navbar-dark bg-dark">
           <div class="container">

                <a href="#" class="navbar-brand">
                    <b>G</b><small>iuseppe</small><b>S</b><small>tas</small>
        {{--            <img src="get-from-somewhere" width="30" height="30" alt="">--}}
                </a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>

                <div class="collapse navbar-collapse" id="navCollapse">
                    @guest
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item align-items-center {{ Request::is('homepage') ? 'active' : ''}}">
                                <a  class="nav-link" href="{{ route('homepage') }}">Homepage</a>
                            </li>
                            <li class="nav-item align-items-center {{ Request::is('products') ? 'active' : ''}}">
                                <a  class="nav-link" href="{{ route('services') }}">Services</a>
                            </li>
                            <li class="nav-item align-items-center {{ Request::is('login') ? 'active' : ''}}">
                                <a  class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item align-items-center {{ Request::is('register') ? 'active' : ''}}">
                                <a  class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    stas <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Il tuo account
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        I tuoi ordini
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item align-items-center {{ Request::is('homepage') ? 'active' : ''}}">
                                <a  class="nav-link" href="{{ route('homepage') }}">Homepage</a>
                            </li>
                            <li class="nav-item align-items-center {{ Request::is('products') ? 'active' : ''}}">
                                <a  class="nav-link" href="{{ route('services') }}">Services</a>
                            </li>
                        </ul>
                    @endguest
                </div>
           </div>
       </nav>

</div>
