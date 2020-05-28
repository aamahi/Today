@extends('admin.index')
@section('banner')
    active
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <section class="card">
                        <header class="card-header">
                            Deleted Web Banner
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-picture-o"></i> logo </th>
                                <th class="hidden-phone"><i class="fa fa-trash-o"></i> Deleted </th>
                                <th><i class=" fa fa-edit"></i> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_banners as $banner)
                                <tr>
                                    <td>
                                       <img width="125" src="{{asset('upload/banner/'.$banner->web_banner)}}">
                                    </td>
                                    <td class="hidden-phone">{{$banner->deleted_at->format('jS F, Y')}}</td>
                                    <td>
                                        <a href="{{route('banner.restore',$banner->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Restore </a>
                                        <a href="{{route('banner.delete',$banner->id)}}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o "></i> Delete </a>
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
