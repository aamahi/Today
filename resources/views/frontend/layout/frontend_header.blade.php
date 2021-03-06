<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{route('cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
                            <!-- Authentication Links -->
                        @guest
                            <li><a href="{{url('/login')}}"><i class="icon fa fa-lock"></i>Login / Register</a></li>
                        @else
                            <li><a href=""><i class="icon fa fa-user"></i>{{Auth::User()->name}}</a></li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    <i class="icon fa fa-sign-out"></i> Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                            </form>
                        @endguest
                        </ul>

                </div><!-- /.cnt-account -->

                <div class="cnt-block">
{{--                    <ul class="list-unstyled list-inline">--}}
{{--                            <li class="dropdown dropdown-small">--}}
{{--                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li><a href="#">USD</a></li>--}}
{{--                                    <li><a href="#">INR</a></li>--}}
{{--                                    <li><a href="#">GBP</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        <li class="dropdown dropdown-small">--}}
{{--                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a href="#">English</a></li>--}}
{{--                                <li><a href="#">Bangla</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul><!-- /.list-unstyled -->--}}
                </div><!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('frontend/assets/images/logo.jpg')}}" width="200" alt="">
{{--                            <a href="{{route('admin.home')}}" class="logo">To<span>day</span></a>--}}
                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form action="{{route('search')}}" method="post">
                            @csrf
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle"  data-toggle="dropdown" href="">Categories <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu" >
                                            @foreach($head_categories as $head_category)
                                                <li class="menu-header" href="">- {{$head_category->head_category_name}}</li>
                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>
                                    <input class="search-field" placeholder="Search here..." name="search"/>
                                    <button type="submit" class="search-button"></button>
                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->
                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </div>
                                    <div class="basket-item-count"><span class="count">{{\App\Model\Cart::where('ip_address',request()->ip())->count()}}</span></div>
                                    <div class="total-price-basket">
                                        <span class="lbl">cart -</span>
                                        @php
                                            $total = 0;
                                        @endphp
                                        <span class="total-price">
                                            @foreach($carts as $cart)
                                                @php
                                                    $price = ($cart->product)->price;
                                                    $discount_price = ($cart->product)->discount_price;
                                                    $discount_amount = ($price-(($price/100)*$discount_price));
                                                    $tot = $discount_amount*$cart->qunt
                                                @endphp
                                                @if(($cart->product)->discount_price)
                                                    @php
                                                        $total = $total+$tot;
                                                    @endphp
                                                @else
                                                    @php
                                                        $total = $total+($price*$cart->qunt);
                                                    @endphp
                                                @endif
                                            @endforeach
                                        <span class="sign">৳</span>
                                        <span class="value">{{$total}}</span>
					                </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($carts as $cart)
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="image">
                                                        <a href="detail.html"><img src="{{asset('upload/product/'.($cart->product)->photo)}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="name"><a href="{{url('/product/'.($cart->product)->id)}}">{{($cart->product)->product_name}}</a></h3>
                                                    @php
                                                        $price = ($cart->product)->price;
                                                        $discount_price = ($cart->product)->discount_price;
                                                        $discount_amount = ($price-(($price/100)*$discount_price));
                                                        $tot = $discount_amount*$cart->qunt
                                                    @endphp
                                                    @if(($cart->product)->discount_price)
                                                        <div class="price">৳{{$discount_amount}}x{{$cart->qunt}}={{$tot}}</div>
                                                        @php
                                                            $total = $total+$tot;
                                                        @endphp
                                                    @else
                                                        <div class="price">৳{{$price}}x{{$cart->qunt}}={{$price*$cart->qunt}}</div>
                                                        @php
                                                            $total = $total+($price*$cart->qunt);
                                                        @endphp
                                                    @endif
                                                </div>
                                                <div class="col-xs-1 action">
                                                    <a href="{{route('remove_cart',$cart->id)}}"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                        @endforeach
                                    </div>

                                    <div class="clearfix cart-total">
                                        <div class="pull-right">

                                            <span class="text">Sub Total :</span><span class='price'>৳ {{$total}}</span>

                                        </div>
                                        <div class="clearfix"></div>

                                        <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div><!-- /.cart-total-->


                                </li>
                            </ul>
                        </div><!-- /.dropdown-cart -->

                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{url('/')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>

                                </li>
                                @foreach($head_categories as $head_category)
                                <li class="dropdown yamm mega-menu">
                                    <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$head_category->head_category_name}}</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    @foreach($head_category->sub_categories as $sub_category)
                                                        <div class="col-xs-12 col-sm-5 col-md-1 col-menu">
                                                            <a style="margin-left: -15px;" href="{{url('/subcategory/'.$sub_category->id)}}"><h2>{{strtoupper($sub_category->sub_category_name)}}</h2></a>
                                                        <ul class="links">
                                                            @foreach(\App\Model\Category\Category::where('sub_category_id',$sub_category->id)->get() as $category)
                                                                <li><a href="{{url('/category/'.$category->id)}}">{{$category->category_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- /.col -->
                                                    @endforeach
                                                    <br>
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                        <img class="img-responsive" src="{{asset('upload/category/'.$head_category->category_banner)}}" alt="">
                                                    </div><!-- /.yamm-content -->
                                                </div>
                                            </div>

                                        </li>
                                    </ul>

                                </li>
                                @endforeach
                                <li class="dropdown  navbar-right special-menu">
                                    <a href="{{route('today')}}">Hot Deal</a>
                                </li>


                            </ul><!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
