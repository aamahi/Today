<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="@yield('home')" href="{{route('admin.home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a  class="@yield('category')" href="javascript:;" >
                    <i class="fa fa-tags"></i>
                    <span>Category</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{route('admin.head_category')}}">Head Category</a></li>
                    <li><a  href="{{route('admin.sub_category')}}">Sub Category</a></li>
                    <li><a  href="{{route('admin.category')}}" >Category</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a  class="@yield('product')" href="javascript:;" >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Product</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{route('admin.product_show')}}">Show Product</a></li>
                    <li><a  href="{{route('admin.product')}}">Add Product</a></li>
                    <li><a  href="{{route('show_deleted_product')}}">Deleted Product</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a  class="@yield('brand')" href="javascript:;" >
                    <i class="fa fa-bars"></i>
                    <span>Brand</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{route('admin.brand')}}">Brand</a></li>
                    <li><a  href="{{route('deleted.brand')}}">Deleted Brand</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a  class="@yield('banner')" href="javascript:;" >
                    <i class="fa fa-picture-o"></i>
                    <span>Banner</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{route('admin.banner')}}">Banner</a></li>
                    <li><a  href="{{route('deleted.banner')}}">Deleted Banner</a></li>
                </ul>
            </li>

            <li>
                <a class="@yield('cupon')" href="{{route('admin.cupon')}}">
                    <i class="fa fa-gift"></i>
                    <span>Cupon</span>
                </a>
            </li>
            <li>
                <a class="@yield('testimonial')" href="{{route('admin.testimonial')}}">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Testimonial</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-laptop"></i>
                    <span>Layouts</span>
                </a>
                <ul class="sub">
                    <li><a  href="boxed_page.html">Boxed Page</a></li>
                    <li><a  href="email_template.html" target="_blank">Email Template</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
