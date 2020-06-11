@extends('frontend.frontend_index')
@section('frontend_content')
    <br/>
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a>
                                            <span>R</span>Shiping Address
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <form class="register-form" role="form">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">Phone <span>*</span></label>
                                                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <form class="register-form" role="form">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputPassword1">City <span>*</span></label>
                                                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-12 already-registered-login">
                                                <form class="register-form" role="form">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"> Address <span>*</span></label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Paymate Option <span>*</span></label>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-3 col-sm-3 already-registered-login">
                                                <div class="col-md-6">
                                                    <input type="radio" class="form-control unicase-form-control text-input" >
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{asset('frontend/assets/images/payments/bksh.jpg')}}" width="62" alt="BKSH">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 already-registered-login">
                                                <div class="col-md-6">
                                                    <input type="radio" class="form-control unicase-form-control text-input" >
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{asset('frontend/assets/images/payments/1.png')}}" alt="BKSH">
                                                </div>
                                            </div>
                                        <div class="col-md-3 col-sm-3 already-registered-login">
                                            <div class="col-md-6">
                                                <input type="radio" class="form-control unicase-form-control text-input" >
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{asset('frontend/assets/images/payments/3.png')}}" alt="BKSH">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 already-registered-login">
                                            <div class="col-md-6">
                                                <input type="radio" class="form-control unicase-form-control text-input" >
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{asset('frontend/assets/images/payments/4.png')}}" alt="BKSH">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Confirm Order</button>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Order Information</h4>
                                    </div>
                                    <div class="">
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="cart-item product-summary">
                                                    @php
                                                    $total =0;
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

                                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                                </div><!-- /.cart-total-->


                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
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
    </div><!-- /.body-content -->
@endsection
