<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:06:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Today Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin/css/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />


</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{route('admin.login')}}" method="post">
        @csrf
        <h2 class="form-signin-heading">Login as Admin</h2>
        <div class="login-wrap">
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

            <input type="text" name="email" class="form-control" placeholder="Email Address">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href=""> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>

    </form>

</div>



<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('admin/js/jquery.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:06:10 GMT -->
</html>
