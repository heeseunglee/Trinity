<html lang="en">
    <head>
        <title>The Mandarin::TMIP</title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="The Mandarin Integration Platform">

        <!-- BEGIN STYLESHEETS -->
        <link rel="stylesheet" href="{{ asset('/css/theme-default/reset.css?'.strtotime('now')) }}"/>
        <link rel="stylesheet" href="{{ asset('/css/theme-default/bootstrap.css?'.strtotime('now')) }}"/>
        <link rel="stylesheet" href="{{ asset('/css/theme-default/boostbox.css?'.strtotime('now')) }}"/>
        <link rel="stylesheet" href="{{ asset('/css/theme-default/boostbox_responsive.css?'.strtotime('now')) }}"/>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!-- Additional CSS includes -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="/assets/js/libs/utils/html5shiv.js"></script>
        <script type="text/javascript" src="/assets/js/libs/utils/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="base">
            <div id="content">
                <section>
                    <div class="section-body">
                        <div class="row">
                            <!-- START HEADER XS BOX -->
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-head box-head-xs style-primary">
                                        <header><h5 class="text-light"> <strong>HSK</strong></h5></header>
                                    </div>
                                    <div class="box-body">
                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                            @foreach(App\Certificate::where('name', 'HSK')->get() as $hsk)
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="hsk" value="{{ $hsk->name }} {{ $hsk->grade }}">
                                                            {{ $hsk->grade }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div><!--end .col-lg-3 -->
                            <!-- END HEADER XS BOX -->
                        </div>
                        <div class="row">
                            <!-- START HEADER XS BOX -->
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-head box-head-xs style-primary">
                                        <header><h5 class="text-light"> <strong>TSC</strong></h5></header>
                                    </div>
                                    <div class="box-body">
                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                            @foreach(App\Certificate::where('name', 'TSC')->get() as $tsc)
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="tsc" value="{{ $tsc->name }} {{ $tsc->grade }}">
                                                                {{ $tsc->grade }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div><!--end .col-lg-3 -->
                            <!-- END HEADER XS BOX -->
                        </div>
                        <div class="row">
                            <!-- START HEADER XS BOX -->
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-head box-head-xs style-primary">
                                        <header><h5 class="text-light"> <strong>Opic</strong></h5></header>
                                    </div>
                                    <div class="box-body">
                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                            @foreach(App\Certificate::where('name', 'Opic 중국어')->get() as $opic)
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="opic" value="{{ $opic->name }} {{ $opic->grade }}">
                                                                {{ $opic->grade }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div><!--end .col-lg-3 -->
                            <!-- END HEADER XS BOX -->
                        </div>
                        <div class="row">
                            <!-- START HEADER XS BOX -->
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-head box-head-xs style-primary">
                                        <header><h5 class="text-light"> <strong>BCT</strong></h5></header>
                                    </div>
                                    <div class="box-body">
                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                            @foreach(App\Certificate::where('name', 'BCT')->get() as $bct)
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="bct" value="{{ $bct->name }} {{ $bct->grade }}">
                                                                {{ $bct->grade }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div><!--end .col-lg-3 -->
                            <!-- END HEADER XS BOX -->
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- BEGIN JAVASCRIPT -->
        <script src="{{ asset('/js/libs/jquery/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ asset('/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('/js/core/BootstrapFixed.js') }}"></script>
        <script src="{{ asset('/js/libs/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/libs/spin.js/spin.min.js') }}"></script>
        <script src="{{ asset('/js/libs/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <!-- Additional JS includes -->

        <!-- Always put App.js last in your javascript imports -->
        <script src="{{ asset('/js/core/App.js') }}"></script>
    </body>
</html>