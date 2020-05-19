@extends('admin.index')
@section('category')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-7">
                    <section class="card">
                        <header class="card-header">
                           Sub  Category
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Sub Category Name </th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Head Catgory Name </th>
                                <th><i class=" fa fa-edit"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                                <tr>
                                    <td class="hidden-phone">{{$sub_category->sub_category_name}}</td>
                                    <td class="hidden-phone">{{($sub_category->head_category)->head_category_name}}</td>
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
                            <form method="post" action="{{route('admin.sub_category')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="head_category_id">Head Category</label>
                                    <select name="head_category_id" class="form-control">
                                        <option disabled selected>Select a Head Category</option>
                                        @foreach($head_categories as $sub_category)
                                                <option value="{{$sub_category->id}}">{{$sub_category->head_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_category_name">Sub Category Name</label>
                                    <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" value="{{old('sub_category_name')}}" placeholder="Sub Category Name">
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
