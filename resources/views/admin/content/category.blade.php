@extends('admin.index')
@section('category')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <section class="card">
                        <header class="card-header">
                          Category
                        </header>
                        <table id="example" class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Category Name </th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Sub Category Name </th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Head Catgory Name </th>
                                <th><i class=" fa fa-edit"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td class="hidden-phone">{{$categorie->category_name}}</td>
                                    <td class="hidden-phone">{{($categorie->sub_category)->sub_category_name}}</td>
                                    <td class="hidden-phone">{{($categorie->head_category)->head_category_name}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit </button>
                                        <a href="{{route('delete_category',$categorie->id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o "></i> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="card">
                        <header class="card-header">
                            Add Category
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
                            <form method="post" action="{{route('admin.category')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="country">Select Head category:</label>
                                    <select name="head_category_id" class="form-control" style="width:250px">
                                        <option value="">--- Head Category ---</option>
                                        @foreach($head_categories as $head_category)--}}
                                        <option value="{{$head_category->id}}">{{$head_category->head_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_category_id">Select Sub Category:</label>
                                    <select name="state" class="form-control"style="width:250px">
                                        <option>--Sub Category--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_category_name"> Category Name</label>
                                    <input type="text" class="form-control" id="sub_category_name" name="category_name" value="{{old('sub_category_name')}}" placeholder="Sub Category Name">
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
