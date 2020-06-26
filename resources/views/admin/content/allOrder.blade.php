@extends('admin.index')
@section('order')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="card">
                        <header class="card-header">
                            New Order
                        </header>
                        <div class="card-body">
                            <div class="adv-table">
                                <table  class="table table-bordered table-striped" id="example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Payment</th>
                                        <th>Sub Total</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_order as $order)
                                        <tr>
                                            <td>{{$order->name}}</td>
{{--                                            <td>{{($order->category)->category_name}}</td>--}}
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->payment}}</td>
                                            <td>{{$order->sub_total}} taka</td>
                                            <td>{{$order->total}} taka</td>
                                            <td>
                                                <a href="{{route('view_product',$order->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('edit_product',$order->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('product_soft_delete',$order->id)}}" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o"></i></a>
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
