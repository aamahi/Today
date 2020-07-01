@extends('admin.index')
@section('hot')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header text-center">
                            Add Hot Deal Product
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
                            <form method="post" action="{{route('admin.add_hot')}}">
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
                                <hr/>
                                <div class="form-row align-items-center">
                                    <div class="col-md-8">
                                        <label>Select Product</label>
                                        <select class="form-control" name="product_name">
                                            <option>-- Add Product --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Discount Amount(%) </label>
                                        Add Product
                                        <input type="number" class="form-control" name="discount_price" placeholder="Discount Percentage (%)"  value="{{old('discount_price')}}">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary"> Add Hot deal </button>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
            </section>
        </section>
    @endsection
