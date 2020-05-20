@extends('admin.index')
@section('brand')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <section class="card">
                        <header class="card-header">
                            Edit Brand
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
                                    <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{$brand->brand_name}}" placeholder="Brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="brand_logo">Old Logo</label>
                                    <br/>
                                    <img src="{{asset('upload/brand/'.$brand->brand_logo)}}">
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
