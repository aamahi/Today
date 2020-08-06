@extends('admin.index')
@section('blog')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header text-center">
                            Add Blog
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
                            <form method="post" action="{{route('admin.blog')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text" placeholder="Blog Title" value="{{old('title')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Decription</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="details">Product Decription...</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="photo" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit"class="btn btn-success"> Add Blog </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="card">
                        <header class="card-header">
                            Blog
                        </header>
                        <div class="card-body">
                            <div class="adv-table">
                                <table  class="table table-bordered table-striped" id="example">
                                    <thead>
                                    <tr>
                                        <th> Photo</th>
                                        <th>Title</th>
                                        <th>Create At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td><img src="{{asset('upload/blog/'.$blog->photo)}}" width="65"></td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('blogDelete',$blog->id)}}" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o"></i></a>
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
