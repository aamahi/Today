@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.layout.frontend_sidenav')
                <!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">

                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        @foreach($head_categories as $category)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
                                                        {{$category->head_category_name}}
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        <ul>
                                                            @foreach($category->sub_categories as $sub_category)
                                                                <li><a href="{{url('/subcategory/',$sub_category->id)}}">{{$sub_category->sub_category_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                                        @endforeach
                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                            <!-- ============================================== PRICE SILDER============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder">
                                        <span class="min-max">
                                             <span class="pull-left">$200.00</span>
                                             <span class="pull-right">$800.00</span>
                                        </span>
                                        <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

                                        <input type="text" class="price-slider" value="" >

                                    </div><!-- /.price-range-holder -->
                                    <a href="#" class="lnk btn btn-primary">Show Now</a>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== PRICE SILDER : END ============================================== -->
                            <!-- ============================================== MANUFACTURES============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Manufactures</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Forever 18</a></li>
                                        <li><a href="#">Nike</a></li>
                                        <li><a href="#">Dolce & Gabbana</a></li>
                                        <li><a href="#">Alluare</a></li>
                                        <li><a href="#">Chanel</a></li>
                                        <li><a href="#">Other Brand</a></li>
                                    </ul>
                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== MANUFACTURES: END ============================================== -->
                            <!-- ============================================== COLOR============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Yellow</a></li>
                                        <li><a href="#">Pink</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Teal</a></li>
                                    </ul>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== COLOR: END ============================================== -->
                            <!-- ============================================== COMPARE============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-top-vs">
                                <h3 class="section-title">Compare products</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report">
                                        <p>You have no <span>item(s)</span> to compare</p>
                                    </div><!-- /.compare-report -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                                <h3 class="section-title">Product tags</h3>
                                <div class="sidebar-widget-body outer-top-xs">
                                    <div class="tag-list">
                                        <a class="item" title="Phone" href="category.html">Phone</a>
                                        <a class="item active" title="Vest" href="category.html">Vest</a>
                                        <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                                        <a class="item" title="Furniture" href="category.html">Furniture</a>
                                        <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                                        <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                                        <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                                        <a class="item" title="Toys" href="category.html">Toys</a>
                                        <a class="item" title="Rose" href="category.html">Rose</a>
                                    </div><!-- /.tag-list -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->		            	<!-- <!-- ============================================== Testimonials============================================== -->
                            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                                <div id="advertisement" class="advertisement">
                                    <div class="item">
                                        <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                        <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
                                    </div><!-- /.item -->

                                    <div class="item">
                                        <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                                        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                        <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
                                    </div><!-- /.item -->

                                    <div class="item">
                                        <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                        <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
                                    </div><!-- /.item -->

                                </div><!-- /.owl-carousel -->
                            </div>

                            <!-- ============================================== Testimonials: END ============================================== -->

                            <div class="home-banner">
                                <img src="assets/images/banners/LHS-banner.jpg" alt="Image">
                            </div>

                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image">
                                <img src="{{asset('/upload/web_banner/'.$web_banner->web_banner)}}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>


                    <!-- ========================================= SECTION – HERO : END ========================================= -->
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div><!-- /.filter-tabs -->
                            </div><!-- /.col -->
                            <div class="col col-sm-12 col-md-6"></div><!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">
                                {{--                                <div class="pagination-container">--}}
                                {{$products->links()}}
                                {{--                                    <ul class="list-inline list-unstyled">--}}
                                {{--                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                                {{--                                        <li><a href="#">1</a></li>--}}
                                {{--                                        <li class="active"><a href="#">2</a></li>--}}
                                {{--                                        <li><a href="#">3</a></li>--}}
                                {{--                                        <li><a href="#">4</a></li>--}}
                                {{--                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                                {{--                                    </ul><!-- /.list-inline -->--}}
                                {{--                                </div><!-- /.pagination-container -->		</div><!-- /.col -->--}}
                            </div><!-- /.row -->
                        </div>


                        <div class="search-result-container ">

                            <div id="myTabContent" class="tab-content category-list">

                                {{--                            // Grid --}}
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row">
                                            @foreach($products as $product)
                                                <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                    <div class="products">

                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="{{url('/product/'.$product->id)}}"><img  src="{{asset('/upload/product/'.$product->photo)}}" alt=""></a>
                                                                </div><!-- /.image -->

                                                                @if($product->quantity==0)
                                                                    <div class="tag sale"><span>out</span></div>
                                                                @elseif($product->discount_price)
                                                                    <div class="tag sale"><span> - {{$product->discount_price}}% </span></div>
                                                                @elseif($product->today_offer)
                                                                    <div class="tag new"><span>Today</span></div>
                                                                @elseif($product->hot_deal)
                                                                    <div class="tag hot"><span>HOT</span></div>
                                                                @elseif($product->special_offer)
                                                                    <div class="tag new"><span>Special</span></div>
                                                                @endif
                                                            </div><!-- /.product-image -->


                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>

                                                                <div class="product-price">
                                                                    @if($product->discount_price)
                                                                        <div class="product-price">
                                                                    <span class="price">
                                                                        ৳ {{$product->price-(($product->price/100)*$product->discount_price)}}</i>
                                                                    </span>
                                                                            <span class="price-before-discount">৳ {{$product->price}}</span>
                                                                        </div>
                                                                    @else
                                                                        <div class="product-price">
                                                                <span class="price">
                                                                    ৳ {{$product->price}}</i>
                                                                </span>
                                                                        </div>
                                                                    @endif

                                                                </div><!-- /.product-price -->

                                                            </div><!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn addcart" type="button">Add to cart</button>

                                                                        </li>

                                                                        <li class="lnk wishlist">
                                                                            <a class="add-to-cart addwish"  data-id="{{$product->id}}" title="Wishlist">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        </li>

                                                                        <li class="lnk">
                                                                            <a class="add-to-cart addcart" href="" title="Compare">
                                                                                <i class="fa fa-signal"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->
                                                        </div><!-- /.product -->

                                                    </div><!-- /.products -->
                                                </div><!-- /.item -->
                                            @endforeach
                                        </div><!-- /.row -->
                                    </div><!-- /.category-product -->
                                </div><!-- /.tab-pane -->



                                {{--                            LIst--}}
                                <div class="tab-pane "  id="list-container">
                                    <div class="category-product">
                                        @foreach($products as $product)
                                            <div class="category-product-inner wow fadeInUp">
                                                <div class="products">
                                                    <div class="product-list product">
                                                        <div class="row product-list-row">
                                                            <div class="col col-sm-4 col-lg-4">
                                                                <div class="product-image">
                                                                    <div class="image">
                                                                        <img src="{{asset('/upload/product/'.$product->photo)}}" alt="">
                                                                    </div>
                                                                </div><!-- /.product-image -->
                                                            </div><!-- /.col -->
                                                            <div class="col col-sm-8 col-lg-8">
                                                                <div class="product-info">
                                                                    <h3 class="name"><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                                                    <div class="rating rateit-small"></div>
                                                                    <div class="product-price">
                                                                        @if($product->discount_price)
                                                                            <div class="product-price">
                                                                    <span class="price">
                                                                        ৳ {{$product->price-(($product->price/100)*$product->discount_price)}}</i>
                                                                    </span>
                                                                                <span class="price-before-discount">৳ {{$product->price}}</span>
                                                                            </div>
                                                                        @else
                                                                            <div class="product-price">
                                                                <span class="price">
                                                                    ৳ {{$product->price}}</i>
                                                                </span>
                                                                            </div>
                                                                        @endif

                                                                    </div><!-- /.product-price -->
                                                                    <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
                                                                    <div class="cart clearfix animate-effect">
                                                                        <div class="action">
                                                                            <ul class="list-unstyled">
                                                                                <li class="add-cart-button btn-group">
                                                                                    <button class="btn btn-primary icon addcart" data-toggle="dropdown" type="button">
                                                                                        <i class="fa fa-shopping-cart"></i>
                                                                                    </button>
                                                                                    <button class="btn btn-primary cart-btn addcart" type="button">Add to cart fff</button>

                                                                                </li>

                                                                                <li class="lnk wishlist">
                                                                                    <a class="add-to-cart addwish"  data-id="{{$product->id}}" title="Wishlist">
                                                                                        <i class="icon fa fa-heart"></i>
                                                                                    </a>
                                                                                </li>

                                                                                <li class="lnk">
                                                                                    <a class="add-to-cart" title="Compare">
                                                                                        <i class="fa fa-signal"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div><!-- /.action -->
                                                                    </div><!-- /.cart -->

                                                                </div><!-- /.product-info -->
                                                            </div><!-- /.col -->
                                                        </div><!-- /.product-list-row -->
                                                        @if($product->quantity==0)
                                                            <div class="tag sale"><span>out</span></div>
                                                        @elseif($product->discount_price)
                                                            <div class="tag sale"><span> - {{$product->discount_price}}% </span></div>
                                                        @elseif($product->today_offer)
                                                            <div class="tag new"><span>Today</span></div>
                                                        @elseif($product->hot_deal)
                                                            <div class="tag hot"><span>HOT</span></div>
                                                        @elseif($product->special_offer)
                                                            <div class="tag new"><span>Special</span></div>
                                                        @endif
                                                    </div><!-- /.product-list -->
                                                </div><!-- /.products -->
                                            </div><!-- /.category-product-inner -->
                                        @endforeach
                                    </div><!-- /.category-product -->
                                </div><!-- /.tab-pane #list-container -->
                            </div><!-- /.tab-content -->




                            {{--                        Bottom Pagination--}}

                            <div class="clearfix filters-container">

                                <div class="text-right">
                                    {{$products->links()}}
                                    {{--                                <div class="pagination-container">--}}
                                    {{--                                    <ul class="list-inline list-unstyled">--}}
                                    {{--                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                                    {{--                                        <li><a href="#">1</a></li>--}}
                                    {{--                                        <li class="active"><a href="#">2</a></li>--}}
                                    {{--                                        <li><a href="#">3</a></li>--}}
                                    {{--                                        <li><a href="#">4</a></li>--}}
                                    {{--                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                                    {{--                                    </ul><!-- /.list-inline -->--}}
                                    {{--                                </div><!-- /.pagination-container -->						    </div><!-- /.text-right -->--}}

                                </div><!-- /.filters-container -->

                            </div>


                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- ============================================== BRANDS CAROUSEL ============================================== -->

                    <!-- /.logo-slider -->
                    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->

            </div>
    @include('frontend.layout.frontend_brands')

@endsection
