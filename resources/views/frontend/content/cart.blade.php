@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Grandtotal</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                @php
                                    $sub_total = 0
                                @endphp
                                @foreach($carts as $cart)
                                    <tr>
                                    <td class="romove-item"><a href="{{route('remove_cart',$cart->id)}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="{{url('/product/'.($cart->product)->id)}}">
                                            <img src="{{asset('upload/product/'.($cart->product)->photo)}}" alt="">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="{{url('/product/'.($cart->product)->id)}}">{{($cart->product)->product_name}}</a></h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    (06 Reviews)
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                            </div>
                                            <input type="text" value="{{$cart->qunt}}">
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">

                                            @if(($cart->product)->discount_price)
                                                    @php
                                                        $price = ($cart->product)->price;
                                                        $discount_price = ($cart->product)->discount_price;
                                                        $discount_amount = $price-(($price/100)*$discount_price);
                                                    @endphp
                                                    ৳ {{$discount_amount}}
                                            @else
                                                    ৳ {{($cart->product)->price}}
                                            @endif
                                        </span></td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price">
                                            @if(($cart->product)->discount_price)
                                                @php
                                                    $price = ($cart->product)->price;
                                                    $discount_price = ($cart->product)->discount_price
                                                @endphp
                                                ৳ {{($price-(($price/100)*$discount_price))*$cart->qunt}}
                                                @php
                                                    $sub_total += ($price-(($price/100)*$discount_price))*$cart->qunt;
                                                @endphp
                                            @else
                                                ৳ {{(($cart->product)->price)*$cart->qunt}}
                                                @php
                                                    $sub_total += (($cart->product)->price)*$cart->qunt;
                                                @endphp
                                            @endif
                                        </span></td>
                                </tr>
                                @endforeach
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <form action="{{route('cart')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="cupon" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    @isset($discount)
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md"> ৳ {{$sub_total}}</span>
                                        </div>
                                        <div class="cart-sub-total">
                                            @php
                                               $discount_amount = (($sub_total/100)*$discount);
                                               $total =  $sub_total-$discount_amount;
                                            @endphp
                                            Discount ({{$discount}}%)<span class="inner-left-md"> ৳ {{$total}}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md"> ৳ {{$total}}</span>
                                        </div>
                                    @else
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md"> ৳ {{$sub_total}}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md"> ৳ {{$sub_total}}</span>
                                        </div>
                                    @endisset

                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                        <span class="">Checkout with multiples address!</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.layout.frontend_brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
@endsection
