<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>@yield('title') - {{env('APP_NAME')}}</title>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}"/>

    <!--[if lte IE 9]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-part2.min.css') }}"/>
    <!--[endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}"/>

    <!--[if lte IE 9]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}"/>
    <!--[endif]-->

</head>

<body class="login-layout {{--light-login blur-login--}}">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <span class="red">{{ explode(' ', env('APP_NAME'))[0] }}</span>
                            <span class="white" id="id-text2">{{ explode(' ', env('APP_NAME'))[1] }}</span>
                        </h1>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        @if($errors->any())
                            @if($errors->has('success'))
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                    <span>
                                        <i class="ace-icon fa fa-check-circle fa-fw"></i>
                                        {{ $errors->first() }}
                                    </span>
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                    <span>
                                        <i class="ace-icon fa fa-times-circle fa-fw"></i>
                                        {{ $errors->first() }}
                                    </span>
                                </div>
                            @endif
                        @endif

                        @yield('body')
                    </div><!-- /.position-relative -->

                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]-->
<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
<!--[endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- page specific plugin scripts -->

<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]-->
<script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('assets/js/respond.min.js') }}"></script>
<!--[endif]-->

<!-- inline scripts related to this page -->
@yield('javascripts')
</body>
</html>
