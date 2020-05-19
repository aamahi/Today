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
                            Head Category
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-picture-o"></i> Banner </th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name </th>
                                <th><i class=" fa fa-edit"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            {{print_r($head_categorys)}}--}}
                            @foreach($head_categorys as $head_category)
                                <tr>
                                    <td>
                                       <img width="75" src="{{asset('upload/category/'.$head_category->category_banner)}}">
                                    </td>
                                    <td class="hidden-phone">{{$head_category->head_category_name}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i> Delete </button>
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
                            Add Head Category
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
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.head_category')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="head_categoy_name">Category Name</label>
                                    <input type="text" class="form-control" id="head_categoy_name" name="head_category_name" value="{{old('head_categoy_name')}}" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="category_icon">Category Icon</label>
                                    <input type="text" class="form-control" id="category_icon" name="category_icon" value="{{old('category_icon')}}" placeholder="Icon Name (fa-sports)">
                                </div>
                                <div class="form-group">
                                    <label for="category_banner">Category Banner</label>
                                    <input type="file" class="form-control" id="category_banner" name="category_banner">
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
