@extends('admin.index')
@section('testimonial')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <section class="card">
                        <header class="card-header">
                            Brand
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-picture-o"></i> Photo </th>
                                <th><i class="fa fa-edit"></i> Name </th>
                                <th><i class="fa fa-edit"></i> Company </th>
                                <th><i class=" fa  fa-check"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testemonials as $testemonial)
                                <tr>
                                    <td>
                                       <img width="75" src="{{asset('upload/testimonial/'.$testemonial->photo)}}">
                                    </td>
                                    <td class="hidden-phone">{{$testemonial->name}}</td>
                                    <td class="hidden-phone">{{$testemonial->company_name}}</td>

                                    <td>
                                        <a href="{{route('banner.update',$testemonial->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{{route('banner.soft_delete',$testemonial->id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o "></i> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="card">
                        <header class="card-header">
                            Add Testimonial
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
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.testimonial')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{old('company_Name')}}" placeholder="company_Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="review">Review</label>
                                    <textarea class="form-control" id="review" name="review">Write a review ..</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Testimonial</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
