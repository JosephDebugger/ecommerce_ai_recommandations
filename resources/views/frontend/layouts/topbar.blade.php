
<!-- header-bot -->
<div class="header header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            <form action="#" method="post">
                <input type="search" name="search" placeholder="Search here..." required="">
                <input type="submit" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 logo_agile">
            <h1><a href="{{url('/')}}"><span>E</span> Shop </a></h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class=" footer-social ">
                
                <li class="btn btn-default ml-2"><a href="{{url('/login')}}"  data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt"
                    aria-hidden="true"></i> Sign In </a></li>
                <li class="btn btn-default"><a href="{{url('/register')}}"  data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o"
                    aria-hidden="true"></i> Sign Up </a></li>
                
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
                                    href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                            <li class=" menu__item"><a class="menu__link" href="{{url('/about')}}">About</a></li>
                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Men's wear <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="{{url('/mens')}}"><img src="{{asset('web/images/top2.jpg')}}" alt=" " /></a>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="{{url('/mens')}}">Clothing</a></li>
                                                <li><a href="{{url('/mens')}}">Wallets</a></li>
                                                <li><a href="{{url('/mens')}}">Footwear</a></li>
                                                <li><a href="{{url('/mens')}}">Watches</a></li>
                                                <li><a href="{{url('/mens')}}">Accessories</a></li>
                                                <li><a href="{{url('/mens')}}">Bags</a></li>
                                                <li><a href="{{url('/mens')}}">Caps & Hats</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="{{url('/mens')}}">Jewellery</a></li>
                                                <li><a href="{{url('/mens')}}">Sunglasses</a></li>
                                                <li><a href="{{url('/mens')}}">Perfumes</a></li>
                                                <li><a href="{{url('/mens')}}">Beauty</a></li>
                                                <li><a href="{{url('/mens')}}">Shirts</a></li>
                                                <li><a href="{{url('/mens')}}">Sunglasses</a></li>
                                                <li><a href="{{url('/mens')}}">Swimwear</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Women's wear <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="{{url('/womens')}}"><img src="{{asset('web/images/top1.jpg')}}" alt=" " /></a>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="{{url('/womens')}}">Clothing</a></li>
                                                <li><a href="{{url('/womens')}}">Wallets</a></li>
                                                <li><a href="{{url('/womens')}}">Footwear</a></li>
                                                <li><a href="{{url('/womens')}}">Watches</a></li>
                                                <li><a href="{{url('/womens')}}">Accessories</a></li>
                                                <li><a href="{{url('/womens')}}">Bags</a></li>
                                                <li><a href="{{url('/womens')}}">Caps & Hats</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="{{url('/womens')}}">Jewellery</a></li>
                                                <li><a href="{{url('/womens')}}">Sunglasses</a></li>
                                                <li><a href="{{url('/womens')}}">Perfumes</a></li>
                                                <li><a href="{{url('/womens')}}">Beauty</a></li>
                                                <li><a href="{{url('/womens')}}">Shirts</a></li>
                                                <li><a href="{{url('/womens')}}">Sunglasses</a></li>
                                                <li><a href="{{url('/womens')}}">Swimwear</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                            <a href="{{url('/womens')}}"><img src="images/top1.jpg"
                                                    alt=" " /></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                          
                            <li class=" menu__item"><a class="menu__link" href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                <form action="#" method="post" class="last">
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