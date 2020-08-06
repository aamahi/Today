@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">

                        <!-- ============================================== HOT DEALS ============================================== -->
                        <div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
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
                            </div>
                        </div>
                        <!-- ============================================== HOT DEALS: END ============================================== -->					<!-- ==============================================

<!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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

                            </div>
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->



                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">



                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="{{$product->photo}}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset('/upload/product/'.$product->photo)}}">
                                                <img class="img-responsive" alt="" src="{{asset('frontend/assets/images/blank.gif')}}" data-echo="{{asset('/upload/product/'.$product->photo)}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @foreach($product_photo as $photo)
                                        <div class="single-product-gallery-item" id="{{$photo->product_photo}}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset('upload/product_photo/'.$photo->product_photo)}}">
                                                <img class="img-responsive" alt="" src="{{asset('frontend/assets/images/blank.gif')}}" data-echo="{{asset('upload/product_photo/'.$photo->product_photo)}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endforeach
                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#{{$product->photo}}">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('frontend/assets/images/blank.gif')}}" data-echo="{{asset('upload/product/'.$product->photo)}}" />
                                                </a>
                                            </div>
                                            @foreach($product_photo as $photo)
                                                <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#{{$photo->product_photo}}">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('frontend/assets/images/blank.gif')}}" data-echo="{{asset('upload/product_photo/'.$photo->product_photo)}}"/>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->



                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->





                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$product->product_name}}</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    @if($product->quantity==0)
                                                        <span class="value">out of Stock</span>
                                                    @else
                                                        <span class="value">In Stock</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        {{$product->details}}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if($product->discount_price)
                                                        <span class="price">৳ {{$product->price-(($product->price/100)*$product->discount_price)}}</span>
                                                        <span class="price-strike">৳ {{$product->price}}</span>
                                                    @else
                                                        <span class="price">৳ {{$product->price}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <div class="col-md-3">
                                                        <a class="btn btn-primary addwish" data-id="{{$product->id}}" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-9">
                                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                        <div class="addthis_inline_share_toolbox_xa00"></div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>
                                            <form action="{{route('add_cart')}}" method="post">
                                                @csrf
                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input name="qunt" type="text" value="1">
                                                        <input name="product_id" type="hidden" value="{{$product->id}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>

                                            </form>

                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">{{$product->details}}<br><br></p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($related_product as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="{{url('/product/'.$product->id)}}"><img  src="{{asset('upload/product/'.$product->photo)}}" alt=""></a>
                                                </div><!-- /.image -->
                                                @if($product->quantity==0)
                                                    <div class="tag sale"><span>out</span></div>
                                                @elseif($product->hot_deal)
                                                    <div class="tag hot"><span>HOT</span></div>
                                                @elseif($product->discount_price)
                                                    <div class="tag sale"><span> - {{$product->discount_price}}% </span></div>
                                                @endif

                                            </div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
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
                                                        <a class="add-to-cart addwish"  data-id="{{$product->id}}" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div>
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div><!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
@endsection
