<!-- header-bot -->
<div class="header header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            <form action="" method="post">
                <input type="search" name="search" id="product_search_str" placeholder="Search here..." required="">
                <input type="button" onclick="searchProducts()" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 logo_agile">
            <h1><a href="{{ url('/') }}"><span>E</span> Shop </a></h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class=" footer-social ">

                {{-- <li class="btn btn-default ml-2"><a href="{{ url('customer/login') }}" data-toggle="modal"
                        data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
                <li class="btn btn-default"><a href="{{ url('customer/register') }}" data-toggle="modal"
                        data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a>
                </li> --}}

            <li>
                @if (auth('customer')->check())
                    <p>Welcome, {{ auth('customer')->user()->name }}!</p>
                    <li><a class="dropdown-item" href="#"><form action="{{ route('customer.logout') }}"
                        method="post">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            class="btn btn-default btn-sm">Logout</button>
                    </form></a></li>
                @else
                    
                <li class="btn btn-default ml-2"><a href="{{ url('customer/login') }}">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
            <li class="btn btn-default"><a href="{{ url('customer/register') }}" >
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a>
            </li>
                @endif
            </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link"
                                    href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
                            <li class=" menu__item"><a class="menu__link" href="{{ url('/about') }}">About</a></li>

                            <x-frontend.categories />

                            <li class=" menu__item"><a class="menu__link" href="{{ url('/contact') }}">Contact</a>
                            </li>
                            @if (auth('customer')->check())
                            <li class=" menu__item"><a class="menu__link" href="{{ url('/account_home') }}">Account</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                <form action="" method="post" class="last">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i
                            class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                </form>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
