@extends('frontend.frontend_index')
@section('frontend_content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="{{route('frontend_home')}}">Home</a></li>
                        <li class='active'>Login</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->

        <div class="body-content">
            <div class="container">
                <div class="sign-in-page">
                    <div class="row">
                        <!-- Sign-in -->
                        <div class="col-md-6 col-sm-6 sign-in">
                            <h4 class="">Sign in</h4>
                            <p class="">Hello, Welcome to your account.</p>
                            <div class="social-sign-in outer-top-xs">
                                <a href="{{ url('auth/facebook') }}"  target="_blank" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                                <a href="{{ url('auth/google') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
                            </div>
                            <form class="register-form outer-top-xs" role="form" method="post" action="{{route('login')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required>
                                </div>
                                <div class="radio outer-xs">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                                    </label>
                                    <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                            </form>
                        </div>
                        <!-- Sign-in -->

                        <!-- create a new account -->
                        <div class="col-md-6 col-sm-6 create-new-account">

                            <h4 class="checkout-subtitle">Create a new account</h4>

                            <p class="text title-tag-line">Create your new account.</p>
                            @foreach($errors->all() as $error)
                                @if($error)
                                    <P style="color: red">{{$error}}</P>
                                @endif

                            @endforeach
                            <form class="register-form outer-top-xs" action="{{route('register')}}" method="post" role="form">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                    <input type="email" value="{{old('email')}}" class="form-control unicase-form-control text-input" name="email" id="exampleInputEmail2" required >
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                    <input type="text" value="{{old('name')}}" class="form-control unicase-form-control text-input" name="name" id="exampleInputEmail1" required >
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" name="password" id="exampleInputEmail1" required >
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="exampleInputEmail1" required >
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                            </form>


                        </div>
                        <!-- create a new account -->			</div><!-- /.row -->
                </div><!-- /.sigin-in-->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->

                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
        </div><!-- /.body-content -->
    </div><!-- /#top-banner-and-menu -->

@endsection
