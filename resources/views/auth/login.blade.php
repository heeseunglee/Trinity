<!DOCTYPE html>
<html lang="en">
<head>
    <title>Boostbox - Locked</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href="{{ asset('/css/theme-default/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/theme-default/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/theme-default/boostbox.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/theme-default/boostbox_responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1401481649"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1401481651"></script>
    <![endif]-->
</head>
<body class="body-dark">
<!-- START LOGIN BOX -->
<div class="box-type-login">
    <div class="box text-center">
        <div class="box-head">
            <h2 class="text-light text-white">Boost<strong>Box</strong> <i class="fa fa-rocket fa-fw"></i></h2>
            <h4 class="text-light text-inverse-alt">Ease your output with BoostBox</h4>
        </div>
        <div class="box-body box-centered">
            <h2>Sign in to your account</h2>
            <br/>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="이메일">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="비밀번호">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 text-left">
                        <div data-toggle="buttons">
                            <label class="btn checkbox-inline btn-checkbox-primary-inverse">
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-key"></i> Sign in</button>
                    </div>
                </div>
            </form>
        </div><!--end .box-body -->
        <div class="box-footer force-padding text-white">
            <a class="text-primary-alt" href="{{ url('/password/email') }}">forgot your password?</a>
        </div>
    </div>
</div>
<!-- END LOGIN BOX -->

<!-- BEGIN JAVASCRIPT -->
<script src="{{ asset('/js/libs/jquery/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('/js/core/BootstrapFixed.js') }}"></script>
<script src="{{ asset('/js/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('/js/libs/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/js/core/App.js') }}"></script>
<script src="{{ asset('/js/core/demo/Demo.js') }}"></script>
<!-- END JAVASCRIPT -->

</body>
</html>
