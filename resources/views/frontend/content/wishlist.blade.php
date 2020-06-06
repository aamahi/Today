@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content">
        <br/>
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlists as $wishlist)
                                    <tr>
                                        <td class="col-md-2"><img src="{{asset('upload/product/'.($wishlist->product)->photo)}}" alt="imga"></td>
                                        <td class="col-md-7">
                                            <div class="product-name"><a href="{{url('/product/'.($wishlist->product)->id)}}">{{($wishlist->product)->product_name}}</a></div>
                                            <div class="rating">
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star non-rate"></i>
                                                <span class="review">( 06 Reviews )</span>
                                            </div>
                                            @if(($wishlist->product)->discount_price)
                                                <div class="price">
                                                    @php
                                                        $price = ($wishlist->product)->price;
                                                        $discount_price = ($wishlist->product)->discount_price
                                                    @endphp
                                                    ৳ {{$price-(($price/100)*$discount_price)}}
                                                    <span>৳ {{($wishlist->product)->price}}</span>
                                                </div>
                                            @else
                                                <div class="price">
                                                    ৳ {{($wishlist->product)->price}}
                                                </div>
                                            @endif
                                        </td>
                                        @if(($wishlist->product)->quantity>0)
                                            <td class="col-md-2">
                                                <a href="#" class="btn-upper btn btn-primary">Add to cart</a>
                                            </td>
                                        @elseif(($wishlist->product)->quantity==0)
                                            <td class="col-md-2">
                                                <a href="#" class="btn-upper btn btn-default">Add to cart</a>
                                            </td>
                                        @endif
                                        <td class="col-md-1 close-btn">
                                            <a href="" class="removewisht" data-id="{{$wishlist->id}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$wishlists->links()}}
                        </div>
                    </div>			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
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
