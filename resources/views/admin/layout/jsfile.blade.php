
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('/admin/js/jquery.js')}}"></script>
<script src="{{asset('/admin/js/bootstrap.bundle.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('/admin/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('/admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('/admin/js/owl.carousel.js')}}" ></script>
<script src="{{asset('/admin/js/jquery.customSelect.min.js')}}" ></script>
<script src="{{asset('/admin/js/respond.min.js')}}" ></script>

<!--right slidebar-->
<script src="{{asset('/admin/js/slidebars.min.js')}}"></script>

<!--common script for all pages-->
<script src="{{asset('/admin/js/common-scripts5e1f.js')}}?v=2"></script>

<!--script for this page-->
<script src="{{asset('/admin/js/sparkline-chart.js')}}"></script>
<script src="{{asset('/admin/js/easy-pie-chart.js')}}"></script>
<script src="{{asset('/admin/js/count.js')}}"></script>
<!--Toaster-->
<script src="{{asset('admin/assets/toastr-master/toastr.js')}}"></script>
<script>
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>


<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    $(window).on("resize",function(){
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });

</script>

</body>
</html>
