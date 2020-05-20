@extends('admin.index')
@section('brand')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <section class="card">
                        <header class="card-header">
                            Deleted Brand
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-picture-o"></i> logo </th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name </th>
                                <th><i class=" fa fa-edit"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_brand as $brand)
                                <tr>
                                    <td>
                                       <img width="75" src="{{asset('upload/brand/'.$brand->brand_logo)}}">
                                    </td>
                                    <td class="hidden-phone">{{$brand->brand_name}}</td>
                                    <td>
                                        <a href="{{route('brand.restore',$brand->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Restore </a>
                                        <a href="{{route('brand.delete',$brand->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
