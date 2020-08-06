@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                            @include('frontend.layout.frontend_sidenav')
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">hot deals</h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                            @foreach($hot_deals as $hot)
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
                    <!-- ============================================== HOT DEALS: END ============================================== -->


                    <!-- ============================================== SPECIAL OFFER ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Offer</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p30.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p29.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p28.jpg')}}" alt="">

                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p27.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p26.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->

                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p25.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p24.jpg')}}"  alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p23.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p22.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->

                    <div class="sidebar-widget product-tag wow fadeInUp">
                        <h3 class="section-title">Category</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list">
                                @foreach($head_categories as $category)
                                    <a class="item" title="Phone" href="category.html">{{$category->head_category_name}}</a>
                                @endforeach
                            </div><!-- /.tag-list -->
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <br/>
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Deals</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p28.jpg')}}"  alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p15.jpg')}}"  alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img data-echo="{{asset('frontend/assets/images/products/p26.jpg')}}"  alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p18.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p17.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p16.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img data-echo="{{asset('frontend/assets/images/products/p15.jpg')}}" alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p14.jpg')}}"  alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p13.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            @foreach($testemonials as $testimonial)
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




                </div><!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @foreach($banners as $banner)
                                <div class="item" style="background-image: url({{asset('upload/banner/'.$banner->web_banner)}});">
{{--                                <div class="container-fluid">--}}
{{--                                    <div class="caption bg-color vertical-center text-left">--}}
{{--                                        <div class="slider-header fadeInDown-1">Top Brands</div>--}}
{{--                                        <div class="big-text fadeInDown-1">--}}
{{--                                            New Collections--}}
{{--                                        </div>--}}

{{--                                        <div class="excerpt fadeInDown-2 hidden-xs">--}}

{{--                                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>--}}

{{--                                        </div>--}}
{{--                                        <div class="button-holder fadeInDown-3">--}}
{{--                                            <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>--}}
{{--                                        </div>--}}
{{--                                    </div><!-- /.caption -->--}}
{{--                                </div><!-- /.container-fluid -->--}}
                            </div><!-- /.item -->
                            @endforeach

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- /.row -->
                        </div><!-- /.info-boxes-inner -->

                    </div><!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">New Products</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                                @foreach($head_categories as $head_category)
                                    <li><a data-transition-type="backSlide" href="#category_{{$head_category->id}}" data-toggle="tab">{{$head_category->head_category_name}}</a></li>
                                @endforeach
                            </ul><!-- /.nav-tabs -->
                        </div>

                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @foreach($products as $product)
                                            <div class="item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{url('/product/'.$product->id)}}"><img  src="{{asset('upload/product/'.$product->photo)}}" alt=""></a>
                                                        </div><!-- /.image -->
                                                        @if($product->quantity==0)
                                                            <div class="tag sale"><span>out</span></div>
                                                        @elseif($product->discount_price)
                                                            <div class="tag sale"><span> - {{$product->discount_price}}% </span></div>
                                                        @elseif($product->hot_deal)
                                                            <div class="tag hot"><span>HOT</span></div>
                                                        @endif

                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                            @if($product->discount_price)
                                                                <div class="product-price">
                                                                    <span class="price">
                                                                       ৳ {{$product->price-(($product->price/100)*$product->discount_price)}}
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

                                                        <!-- /.product-price -->

                                                    </div><!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button data-toggle="tooltip" class="btn btn-primary icon addcart" data-id="{{$product->id}}" type="button" title="Add Cart">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>

                                                                </li>
                                                                <li class="lnk wishlist">
                                                                        <a data-id="{{$product->id}}" href="" data-toggle="tooltip" class="add-to-cart addwish"  title="Wishlist">
                                                                            <i class="icon fa fa-heart"></i>
                                                                        </a>
{{--                                                                    </form>--}}
                                                                </li>

{{--                                                                <li class="lnk wishlist">--}}
{{--                                                                    <form action="{{url('/hi')}}" methoSPECIAL OFFER
d ="post" >--}}
{{--                                                                        <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                                                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">--}}
{{--                                                                            <i class="fa fa-heart-o"></i>--}}
{{--                                                                        </button>--}}
{{--                                                                    </form>--}}
{{--                                                                </li>--}}

                                                                <li class="lnk">
                                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Quick View">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div><!-- /.action -->
                                                    </div><!-- /.cart -->
                                                </div><!-- /.product -->

                                            </div><!-- /.products -->
                                        </div><!-- /.item -->
                                        @endforeach
                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div><!-- /.tab-pane -->
                            @foreach($head_categories as $head_category)
                                <div class="tab-pane" id="category_{{$head_category->id}}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                            @foreach(\App\Model\Product::where('head_category_id',$head_category->id)->get() as $product)
                                                <div class="item item-carousel">
                                                    <div class="products">

                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="{{url('/product/'.$product->id)}}"><img  src="{{asset('upload/product/'.$product->photo)}}" alt=""></a>
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

                                                            <!-- /.product-price -->

                                                            </div><!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                                        </li>

                                                                        <li class="lnk wishlist">
                                                                            <a data-id="{{$product->id}}" href="" data-toggle="tooltip" class="add-to-cart addwish"  title="Wishlist">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        </li>

                                                                        <li class="lnk">
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->
                                                        </div><!-- /.product -->

                                                    </div><!-- /.products -->
                                                </div><!-- /.item -->
                                            @endforeach
                                        </div><!-- /.home-owl-carousel -->
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /.tab-content -->
                    </div><!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt="">
                                    </div>

                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt="">
                                    </div>

                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.wide-banners -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Special Offer</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach($special_offers as $product)
                                <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{url('/product/'.$product->id)}}"><img  src="{{asset('upload/product/'.$product->photo)}}" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag new"><span> Special </span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
                                                <span class="price">
                                                   {{$product->price}}
                                                </span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart addwish" data-id="{{$product->id}}" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner.jpg')}}" alt="">
                                    </div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span></h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div><!-- /.new-label -->
                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== BEST SELLER ============================================== -->

                    <div class="best-deal wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">Best seller</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p20.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p21.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p22.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p23.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p24.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p25.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p26.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{asset('frontend/assets/images/products/p27.jpg')}}" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== BEST SELLER : END ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest form blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">

                                @foreach($blogs as $blog)
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href=""><img src="{{asset('upload/blog/'.$blog->photo)}}" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->


                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">{{$blog->title}}</a></h3>
                                            <span class="info">By Hello User &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">{{ Str::limit($blog->details, 95)}}</p>
                                            <a href="{{route('readBlog',$blog->id)}}" class="lnk btn btn-primary">Read more</a>
                                        </div><!-- /.blog-post-info -->


                                    </div><!-- /.blog-post -->
                                </div>
                                @endforeach

                            </div><!-- /.owl-carousel -->
                        </div><!-- /.blog-slider-container -->
                    </section><!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section wow fadeInUp new-arriavls">
                        <h3 class="section-title">HOT DEAL</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach($hot_deals as $product)
                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="{{url('/product/'.$product->id)}}"><img  src="{{asset('upload/product/'.$product->photo)}}" alt=""></a>
                                                </div><!-- /.image -->

                                                <div class="tag sale"><span> - {{$product->discount_price}}%</span></div>
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">
                                                <span class="price">
                                                   {{$product->price}}
                                                </span>

                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn addcart"  data-id="{{$product->id}}"type="button">Add to cart</button>
                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a class="add-to-cart addwish"  data-id="{{$product->id}}" title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        <li class="lnk">
                                                            <a class="add-to-cart" href="" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                </div><!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.layout.frontend_brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->
@endsection
