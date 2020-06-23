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
                                    <div class="panel-body ml-4">

                                        <ul>
                                            @if($errors->any())
                                                @foreach($errors->all() as $error)
                                                    <li class="text-danger"><h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$error}}</h4></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- panel-body  -->
                                    <form action="{{route('order')}}" method="post">
                                        @csrf
                                        <div class="panel-body">
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="name">Name <span>*</span></label>
                                                        <input type="name" class="form-control unicase-form-control text-input" id="name" name="name" value="{{Auth::user()->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="phone">Phone <span>*</span></label>
                                                        <input type="number" class="form-control unicase-form-control text-input" name="phone" id="phone" placeholder="Phone">
                                                    </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="email">Email Address <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" name="email" id="email" value="{{Auth::user()->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="city">City <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" name="city" id="city" placeholder="City">
                                                    </div>
                                            </div>
                                            <div class="col-md-12 already-registered-login">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"> Address <span>*</span></label>
                                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Paymate Option <span>*</span></label>
                                                    </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 already-registered-login">
                                                <div class="col-md-6">
                                                    <input type="radio" name="payment" value="2"  class="form-control unicase-form-control text-input" >
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{asset('frontend/assets/images/payments/bksh.jpg')}}" width="62" alt="BKSH">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 already-registered-login">
                                                <div class="col-md-6">
                                                    <input type="radio" name="payment" value="3"  class="form-control unicase-form-control text-input" >
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{asset('frontend/assets/images/payments/1.png')}}" alt="BKSH">
                                                </div>
                                            </div>
                                        <div class="col-md-2 col-sm-2 already-registered-login">
                                            <div class="col-md-6">
                                                <input type="radio" name="payment" value="3"  class="form-control unicase-form-control text-input" >
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{asset('frontend/assets/images/payments/3.png')}}" alt="BKSH">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 already-registered-login">
                                            <div class="col-md-6">
                                                <input type="radio" name="payment" value="4" class="form-control unicase-form-control text-input" >
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{asset('frontend/assets/images/payments/4.png')}}" alt="BKSH">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 already-registered-login">
                                            <div class="col-md-6">
                                                <input type="radio" name="payment" value="4" class="form-control unicase-form-control text-input" >
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{asset('frontend/assets/images/payments/4.png')}}" alt="BKSH">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 already-registered-login">
                                            <div class="col-md-6">
                                                <input type="radio" name="payment" value="1" class="form-control unicase-form-control text-input" >
                                            </div>
                                            <div class="col-md-6">
                                                <img  width="40" src="{{asset('frontend/assets/cash.png')}}" alt="BKSH">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="panel-body">
                                        <div class="col-md-9">
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Confirm Order</button>
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
                                                <div class="cart-item product-summary">
                                                    @php
                                                    $total =0;
                                                    @endphp
                                                    @foreach($carts as $cart)
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h4 class="name">{{($cart->product)->product_name}}</a></h4>
                                                            </div>
                                                            <div class="col-md-6">
                                                                @php
                                                                    $price = ($cart->product)->price;
                                                                    $discount_price = ($cart->product)->discount_price;
                                                                    $discount_amount = ($price-(($price/100)*$discount_price));
                                                                    $tot = $discount_amount*$cart->qunt
                                                                @endphp
                                                                @if(($cart->product)->discount_price)
                                                                    <h4 class="name">৳{{$discount_amount}}x{{$cart->qunt}}={{$tot}}</a></h4>
{{--                                                                    <div class="price">৳{{$discount_amount}}x{{$cart->qunt}}={{$tot}}</div>--}}
                                                                    @php
                                                                        $total = $total+$tot;
                                                                    @endphp
                                                                @else
                                                                    <h4 class="name">৳{{$price}}x{{$cart->qunt}}={{$price*$cart->qunt}}</a></h4>
{{--                                                                    <h4 class="price">৳{{$price}}x{{$cart->qunt}}={{$price*$cart->qunt}}</h4>--}}
                                                                    @php
                                                                        $total = $total+($price*$cart->qunt);
                                                                    @endphp
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <hr>
                                                    @endforeach
                                                </div>

                                                <div class="clearfix cart-total">
                                                    @if($sub_total)
                                                        <div class="row">
                                                           <div class="col-md-5">
                                                               <h3><span class="text">Sub Total :</span></h3>
                                                           </div>
                                                            <div class="col-md-3"></div>
                                                           <div class="col-md-4">
                                                               <input name="total" type="hidden" value="{{$total}}">
                                                               <input name="sub_total" type="hidden" value="{{$sub_total}}">
                                                               <h3><span class='price'>৳ {{$total}}</span></h3>
                                                           </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <h3><span class="text">Total :</span></h3>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <h3><span class='price'>৳ {{$sub_total}}</span></h3>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <h3><span class="text">Total :</span></h3>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input name="total" type="hidden" value="{{$total}}">
                                                                <input name="sub_total" type="hidden" value="{{$total}}">
                                                                <h3><span class='price'>৳ {{$total}}</span></h3>
                                                            </div>
                                                        </div>
                                                    @endif


                                                </div><!-- /.cart-total-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->

        </div><!-- /.body-content -->
@endsection
