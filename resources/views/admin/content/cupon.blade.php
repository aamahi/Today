@extends('admin.index')
@section('cupon')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-7">
                    <section class="card">
                        <header class="card-header">
                          Cupon
                        </header>
                        <table id="example" class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Cupon Name </th>
                                <th class="hidden-phone"><i class="fa fa-percent"></i>% Discount</th>
                                <th class="hidden-phone"><i class="fa fa-clock-o"></i> Expaire Date</th>
                                <th><i class=" fa fa-edit"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cupons as $cupon)
                                <tr>
                                    <td class="hidden-phone">{{$cupon->cupon_name}}</td>
                                    <td class="hidden-phone">{{($cupon->discount)}}%</td>
                                    <td class="hidden-phone">{{($cupon->expaire_date)}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </button>
                                        <a href="{{route('delete_cupon',$cupon->id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o "></i> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
                <div class="col-lg-5">
                    <section class="card">
                        <header class="card-header">
                            Add Cupon
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
                            <form method="post" action="{{route('admin.cupon')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="cupon_name"> Cupon Name</label>
                                    <input type="text" class="form-control" id="cupon_name" name="cupon_name" value="{{old('cupon_name')}}" placeholder="Cupon Name">
                                </div>
                                <div class="form-group">
                                    <label for="discount"> Discount Amount</label>
                                    <input type="number" class="form-control" id="discount" name="discount" value="{{old('discount')}}" placeholder="Discount Amount (%)">
                                </div>
                                <div class="form-group">
                                    <label for="expaire_date"> Expaire Date</label>
                                    <input type="date" class="form-control" id="expaire_date" name="expaire_date" value="{{old('expaire_date')}}" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" placeholder="Expaire Date">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
            </section>
        </section>
    @endsection
