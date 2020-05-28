@extends('admin.index')
@section('brand')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-7">
                    <section class="card">
                        <header class="card-header">
                            Brand
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
                            @foreach($brands as $brand)
                                <tr>
                                    <td>
                                       <img width="75" src="{{asset('upload/brand/'.$brand->brand_logo)}}">
                                    </td>
                                    <td class="hidden-phone">{{$brand->brand_name}}</td>
                                    <td>
                                        <a href="{{route('brand.update',$brand->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{{route('brand.soft_delete',$brand->id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o "></i> Delete </a>
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
                            Add Brand
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
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.brand')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{old('brand_name')}}" placeholder="Brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="brand_logo">Brand Logo</label>
                                    <input type="file" class="form-control" id="brand_logo" name="brand_logo">
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
