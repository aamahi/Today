@extends('admin.index')
@section('product')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header text-center">
                            Add Product
                        </header>
                        <div class="card-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{$error}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            <form method="post" action="{{route('admin.product')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col-md-4">
                                        <label>Head Categroy</label>
                                        <select name="head_category_id" class="form-control">
                                            <option>--Head Category--</option>
                                            @foreach($head_categories as $head_category);
                                                <option value="{{$head_category->id}}">{{$head_category->head_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Sub Categroy</label>
                                        <select name="state" class="form-control">
                                            <option>--Sub Category--</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Category</label>
                                        <select name="category" class="form-control">
                                            <option>-- Category--</option>
                                        </select>
                                    </div>
                                </div>
                                <hr >
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="product_name" type="text" placeholder="Product Name" value="{{old('product_name')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Decription</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="details">Product Decription...</textarea>
                                    </div>
                                </div>
                                <hr >
                                <div class="form-row align-items-center">
                                    <div class="col-md-3">
                                        <label>Price</label>
                                        <input type="number" class="form-control mb-4" name="price" placeholder="Price"  value="{{old('price')}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Discount Price</label>
                                        <input type="number" class="form-control mb-4" name="discount_price" placeholder="Discount Price"  value="{{old('discount_price')}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control mb-4" name="quantity" placeholder="Product Quantity"  value="{{old('quantity')}}">
                                    </div>
                                    <div class="col-md-3 float-left">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="today_offer" value="1" class="custom-control-input" id="today_offer" >
                                            <label class="custom-control-label" for="today_offer"> Today Offer </label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="special_offer" class="custom-control-input" value="1" id="special_offer">
                                            <label class="custom-control-label" for="special_offer" > Special Offer </label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="hot_deal"  class="custom-control-input" value="1" id="hot_deal">
                                            <label class="custom-control-label" for="hot_deal"> Hot Deal </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Product Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="inputEmail3" name="photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="multipleImage" class="col-sm-4 col-form-label">Multiple Product Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="multipleImage" name="multiple_image[]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"> Add Product </button>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
            </section>
        </section>
    @endsection
