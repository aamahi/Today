@extends('admin.index')
@section('product')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-md-3">
                    <section class="card">
                        <header class="card-header">
                            Category
                        </header>
                        <div class="card-body">
                            <ul class="nav flex-column prod-cat">
                                @foreach($categories as $category)
                                    <li class="nav-item"><a href="#" class="nav-link"> <i class=" fa fa-angle-right"></i> {{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-md-9">

                    <section class="card ">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="pro-img-details">
                                    <img class="img-fluid" src="{{asset('upload/product/'.$product->photo)}}" alt=""/>
                                </div>
                                <div class="pro-img-list">
                                    @foreach($multi_photo as $photo)
                                        <a href="#">
                                            <img width="85" src="{{asset('upload/product_photo/'.$photo->product_photo)}}" alt="">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="pro-d-title">
                                    <a href="#" class="">
                                        {{$product->product_name}}
                                    </a>
                                </h4>
                                <p>
                                    {{$product->details}}
                                </p>
                                <div class="product_meta">
                                    <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">{{($product->head_category)->head_category_name}}</a> > <a rel="tag" href="#">{{($product->sub_category)->sub_category_name}}</a> > <a rel="tag" href="#">{{($product->category)->category_name}}</a></span>
                                    <span class="tagged_as"><strong>Tags:</strong> @if($product->hot_deal==1)<a rel="tag" href="#">Hot deal , </a> @endif <a rel="tag" href="#">@if($product->today_offer==1)<a rel="tag" href="#"> Today Offer ,</a> @endif </a> @if($product->special_offer==1)<a rel="tag" href="#"> Special Offer ,</a> @endif </span>
                                </div>
                                @if($product->discount_price)
                                    <div class="m-bot15"> <strong>Price : </strong>
                                        <span class="pro-price"> ৳ {{$product->price-(($product->price/100)*$product->discount_price)}}</span>
                                        <span class="amount-old">৳ {{$product->price}}</span>
                                    </div>
                                @else
                                    <div class="m-bot15"> <strong>Price : </strong>
                                        <span class="pro-price"> ৳ {{$product->price}}</span>
                                    </div>
                                @endif
                                <br/>
                                <br/>
                                <p>
                                    <a href="{{route('admin.product_show')}}" class="btn btn-round btn-info" type="button"><i class="fa fa-reply"></i> Back</a>
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="card">
                        <header class="card-header tab-bg-dark-navy-blue p-0">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Review</a>
                                </li>
                            </ul>

                        </header>
                        <div class="card-body">
                            <div class="tab-content tasi-tab" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p>{{$product->details}}</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <article class="media mb-3">
                                        <a class="mr-3 p-thumb">
                                            <img src="img/avatar-mini.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="cmt-head" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                            <p> <i class="fa fa-clock-o"></i> 1 hours ago</p>
                                        </div>
                                    </article>
                                    <article class="media mb-3">
                                        <a class="mr-3 p-thumb">
                                            <img src="img/avatar-mini2.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="cmt-head" href="#">Nulla vel metus scelerisque ante sollicitudin commodo</a>
                                            <p> <i class="fa fa-clock-o"></i> 23 mins ago</p>
                                        </div>
                                    </article>
                                    <article class="media mb-3">
                                        <a class="mr-3 p-thumb">
                                            <img src="img/avatar-mini3.jpg">
                                        </a>
                                        <div class="media-body">
                                            <a class="cmt-head" href="#">Donec lacinia congue felis in faucibus. </a>
                                            <p> <i class="fa fa-clock-o"></i> 15 mins ago</p>
                                        </div>
                                    </article>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection
