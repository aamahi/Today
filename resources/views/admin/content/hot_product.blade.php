@extends('admin.index')
@section('hot')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="card">
                        <header class="card-header">
                           Hot deal Product
                        </header>
                        <div class="card-body">
                            <div class="adv-table">
                                <table  class="table table-bordered table-striped" id="example">
                                    <thead>
                                    <tr>
                                        <th>Product Photo</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Discount (%) </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td><img src="{{asset('upload/product/'.$product->photo)}}" width="65"></td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{($product->category)->category_name}}</td>
                                            <td>{{$product->price}} taka</td>
                                            <td>{{$product->discount_price}} %</td>
                                            <td>
                                                <a href="{{route('view_product',$product->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('remove_hot',$product->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            </section>
        </section>
    @endsection
