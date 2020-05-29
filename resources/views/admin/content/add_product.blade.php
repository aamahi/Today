@extends('admin.index')
@section('product')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header text-center">
                            Add Product
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

                                <div class="form-row align-items-center">
                                    <div class="col-md-4">
                                        <label>HEad Categroy</label>
                                        <input type="text" class="form-control mb-4" id="inlineFormInput" placeholder="Jane Doe">
                                    </div>
                                    <div class="col-md-4">
                                        <label>HEad Categroy</label>
                                        <input type="text" class="form-control mb-4" id="inlineFormInput" placeholder="Jane Doe">
                                    </div>
                                    <div class="col-md-4">
                                        <label>HEad Categroy</label>
                                        <input type="text" class="form-control mb-4" id="inlineFormInput" placeholder="Jane Doe">
                                    </div>
                                </div>
                                <hr >
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Input focus</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 control-label">Decription</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="focusedInput" type="text" value="This is focused..."></textarea>
                                    </div>
                                </div>
                                <hr >
                                <div class="form-row align-items-center">
                                    <div class="col-md-4">
                                        <label>Price</label>
                                        <input type="number" class="form-control mb-4" id="inlineFormInput" placeholder="Jane Doe">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Discount Price</label>
                                        <input type="number" class="form-control mb-4" id="inlineFormInput" placeholder="Jane Doe">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Quantity</label>
                                        <input type="text" class="form-control mb-4" id="inlineFormInput" placeholder="Jane Doe">
                                    </div>
                                </div>
                                <hr >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <section class="card">
                                            <header class="card-header">
                                                Tags Input
                                            </header>
                                            <div class="card-body">
                                                <input name="tagsinput" id="tagsinput" class="tagsinput" value="Flat,Design,Lab,Clean" />
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-6">
                                        <section class="card">
                                            <header class="card-header">
                                                Custom Checkbox & Radio
                                            </header>
                                            <div class="card-body">
                                                <form action="#" method="get" accept-charset="utf-8">
                                                    <div class="checkboxes">
                                                        <label class="label_check" for="checkbox-01">
                                                            <input name="sample-checkbox-01" id="checkbox-01" value="1" type="checkbox" checked /> I agree to the terms &#38; conditions.
                                                        </label>
                                                        <label class="label_check" for="checkbox-02">
                                                            <input name="sample-checkbox-02" id="checkbox-02" value="1" type="checkbox" /> Please send me regular updates. </label>
                                                        <label class="label_check" for="checkbox-03">
                                                            <input name="sample-checkbox-02" id="checkbox-03" value="1" type="checkbox" /> This is nice checkbox.</label>

                                                    </div>
                                                </form>
                                            </div>

                                        </section>

                                    </div>
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
