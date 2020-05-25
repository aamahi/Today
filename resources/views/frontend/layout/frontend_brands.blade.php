<div id="brands-carousel" class="logo-slider wow fadeInUp">

    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
           @foreach($brands as $brand)
                <div class="item m-t-15">
                <a href="#" class="image">
                    <img data-echo="{{asset('upload/brand/'.$brand->brand_logo)}}" src="{{asset('upload/brand/'.$brand->brand_logo)}}" alt="">
                </a>
           </div>
            @endforeach
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
