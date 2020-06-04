

<!-- For demo purposes – can be removed on production -->


<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.addwish').on('click',function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            if(id){
                $.ajax({
                    url:"{{url('/add/wishlist/')}}/"+id,
                    type:"GET",
                    dataType:"json",
                    success:function (data) {
                        console.log(data)
                    },
                });
            }else{
                alert('danger');
            }
        })
    });
</script>
</body>

</html>
