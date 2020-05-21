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
                            Edit Banner
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
                            <form enctype="multipart/form-data" method="post" action="{{url('admin/banner/update/banner/'.$banner->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_logo">Old web Banner</label>
                                    <br/>
                                    <img width="600" src="{{asset('upload/banner/'.$banner->web_banner)}}">
                                </div>
                                <div class="form-group">
                                    <label for="brand_logo">Brand Logo</label>
                                    <input type="file" class="form-control" id="brand_logo" name="web_banner">
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
