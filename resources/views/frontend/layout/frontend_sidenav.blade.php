<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            @foreach($head_categories as $head_category)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa {{$head_category->category_icon}}" aria-hidden="true"></i>{{$head_category->head_category_name}}</a>
                    <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach($head_category->sub_categories as $sub_category)
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <a style="margin-left: -15px" href="{{url('/subcategory/'.$sub_category->id)}}"><h2 class="title">{{$sub_category->sub_category_name}}</h2></a>
                                        <ul>
                                            @foreach(\App\Model\Category\Category::where('sub_category_id',$sub_category->id)->get() as $category)
                                                <li>
                                                    <a href="{{url('/category/'.$category->id)}}">{{$category->category_name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach

                                <div class="dropdown-banner-holder">
                                    <a href="#"><img alt="" src="{{asset('upload/category/'.$head_category->category_banner)}}" /></a>
                                </div>
                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->
                    </ul><!-- /.dropdown-menu -->
                    <!-- ================================== MEGAMENU VERTICAL ================================== -->            </li><!-- /.menu-item -->
            @endforeach


        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div>
