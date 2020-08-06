@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                            @include('frontend.layout.frontend_sidenav')
                    <!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">
                        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                            <h3 class="section-title">hot deals</h3>
                            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                                @foreach($hot_deals = \App\Model\Product::select('id','product_name','photo','price','discount_price')->orderBy('id','DESC')->where('hot_deal',1)->get() as $hot)
                                    <div class="item">
                                        <div class="products">
                                            <div class="hot-deal-wrapper">
                                                <div class="image">
                                                    <img src="{{asset('upload/product/'.$hot->photo)}}" alt="">
                                                </div>
                                                <div class="sale-offer-tag"><span>{{$hot->discount_price}}%<br>off</span></div>
                                                <div class="timing-wrapper">
                                                    <div class="box-wrapper">
                                                        <div class="date box">
                                                            <span class="key">120</span>
                                                            <span class="value">Days</span>
                                                        </div>
                                                    </div>

                                                    <div class="box-wrapper">
                                                        <div class="hour box">
                                                            <span class="key">20</span>
                                                            <span class="value">HRS</span>
                                                        </div>
                                                    </div>

                                                    <div class="box-wrapper">
                                                        <div class="minutes box">
                                                            <span class="key">36</span>
                                                            <span class="value">MINS</span>
                                                        </div>
                                                    </div>

                                                    <div class="box-wrapper hidden-md">
                                                        <div class="seconds box">
                                                            <span class="key">60</span>
                                                            <span class="value">SEC</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.hot-deal-wrapper -->

                                            <div class="product-info text-left m-t-20">
                                                <h3 class="name"><a href="{{url('/product/'.$hot->id)}}">{{$hot->product_name}}</a></h3>
                                                <div class="rating rateit-small"></div>

                                                <div class="product-price">
                                                    @if($hot->discount_price)
                                                        <span class="price">
                                                     ৳ {{$hot->price-(($hot->price/100)*$hot->discount_price)}}
                                                </span>
                                                        <span class="price-before-discount"> ৳ {{$hot->price}}</span>
                                                    @else
                                                        <span class="price">
                                                     ৳ {{$hot->price}}
                                                </span>
                                                    @endif
                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">

                                                    <div class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon addcart" data-id="{{$hot->id}}" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn  addcart" data-id="{{$hot->id}}" type="button">Add to cart</button>

                                                    </div>

                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /.sidebar-widget -->
                        </div>
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
                                                            <li><a href="{{url('subcategory',$sub_category->id)}}">{{$sub_category->sub_category_name}}</a></li>
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
                            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                                <div id="advertisement" class="advertisement">
                                    @foreach(\App\Model\Testemonial::all() as $testimonial)
                                        <div class="item">
                                            <div class="avatar"><img src="{{asset('upload/testimonial/'.$testimonial->photo)}}" alt="Image"></div>
                                            <div class="testimonials"><em>"</em> {{$testimonial->review}}<em>"</em></div>
                                            <div class="clients_author">{{$testimonial->name}}	<span>{{$testimonial->company_name}}</span>	</div><!-- /.container-fluid -->
                                        </div><!-- /.item -->
                                    @endforeach

                                </div><!-- /.owl-carousel -->
                            </div>

                            <!-- ============================================== Testimonials: END ============================================== -->

                            <div class="home-banner">
                                <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
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
                                                                    <button class="btn btn-primary icon addcart" data-id="{{$product->id}}" data-toggle="dropdown" type="button">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn addcart" data-id="{{$product->id}}" type="button">Add to cart</button>

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
                                                                            <button class="btn btn-primary icon addcart" data-id="{{$product->id}}" data-toggle="dropdown" type="button">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn addcart" data-id="{{$product->id}}" type="button">Add to cart</button>

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
                                                @elseif($product->hot_deal)
                                                    <div class="tag hot"><span>HOT</span></div>
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
