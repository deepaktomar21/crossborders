<header class="header header-22">
    <div class="header-middle">
        <div class="container">
            <div class="header-left" style="margin-left: -20px;"> 

                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <h4 style="font-family: Copperplate, Papyrus, fantasy; color: rgb(255, 176, 6);">
                    <a href="{{ route('index') }}" class="logo" style="text-decoration: none; color: inherit;">
                        <span style="font-size: 32px; font-weight: bold; display: block;">JoSafe</span>
                        <span style="font-size: 16px; font-weight: bold; display: block;"> Errand & Delivery Service</span>

                        <span style="font-size: 14px; display: block;">UK-Ghana Shopper</span>
                    </a>
                </h4>
                
            </div><!-- End .header-left -->
            <div class="wrap-container sticky-header">
                <div class="header-bottom">
                    <div class="container">
        
                        <div class="header-center">
                            <nav class="main-nav">
        
                                <ul class="menu sf-arrows">
                                    <li>
                                        <a href="{{ route('index') }}" style="color: rgb(255, 176, 6);">Home</a>
                                    </li>
                                    <li>
                                        <a href="#" style="color: rgb(255, 176, 6);"   color: #E6A545;>Browse Services</a>
                                        <ul style="display: none;">
                                            <li><a href="#service">Ghana</a></li>
                                            <li><a href="#service">UK</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('trackOrder') }}" style="color: rgb(255, 176, 6);">Track Order</a>
                                    </li>
        
                                    <li>
                                        <a href="{{ route('OrderForm') }}"  style="color: rgb(255, 176, 6);">Place Order</a>
        
                                      
                                    </li>
                                    <li>
                                        <a title="Pricing" style="color: rgb(255, 176, 6);" href="/#pricing">Pricing</a>
                                    </li>
                                    
                                </ul>
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-left -->
        
                      
                        <div class="header-right">
                            <div class="header-text">
                                <ul class="top-menu top-link-menu">
                                    <li>
                                        <ul>
                                            @if(Auth::check())
                                                <li>
                                                    <a href="#" style="color: rgb(255, 176, 6);">
                                                        <i class="icon-user"></i> Welcome, {{ Auth::user()->name }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logoutUser') }}" 
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="icon-sign-out"></i> Logout
                                                    </a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @else
                                                <li>
                                                    <a href="{{ route('login') }}" style="color: rgb(255, 176, 6);">
                                                        <i class="icon-user"></i> Login
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('register') }}" style="color: rgb(255, 176, 6);">
                                                        <i class="icon-user-plus"></i> Register
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- End .header-text -->
                        </div>
                        
                    </div><!-- End .container -->
                </div><!-- End .header-bottom -->
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <!-- End .wrap-container -->
</header><!-- End .header -->
