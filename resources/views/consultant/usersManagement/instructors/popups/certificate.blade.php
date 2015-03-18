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

                        <div class="row">
                            <!-- START HEADER XS BOX -->
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-head box-head-xs style-primary">
                                        <header><h5 class="text-light"> <strong>운전면허증</strong></h5></header>
                                    </div>
                                    <div class="box-body">
                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                            @foreach(App\Certificate::where('name', '운전면허증')->get() as $driver)
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="driver" value="{{ $driver->name }}">
                                                                {{ $driver->name }}
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
                            <!-- START BASIC BUTTONS -->
                            <div class="col-lg-12">
                                <div class="box style-transparent">
                                    <div class="box-body text-center">
                                        <p class="text-right">
                                            <button type="button" class="btn btn-primary">자격증 등록하기</button>
                                        </p>
                                    </div><!--end .box-body -->
                                </div><!--end .box -->
                            </div><!--end .col-lg-12 -->
                            <!-- END BASIC BUTTONS -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <input name="hsk_result" type="hidden"/>
        <input name="tsc_result" type="hidden"/>
        <input name="opic_result" type="hidden"/>
        <input name="bct_result" type="hidden"/>
        <input name="driver_result" type="hidden"/>

        <!-- BEGIN JAVASCRIPT -->
        <script src="{{ asset('/js/libs/jquery/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ asset('/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('/js/core/BootstrapFixed.js') }}"></script>
        <script src="{{ asset('/js/libs/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/libs/spin.js/spin.min.js') }}"></script>
        <script src="{{ asset('/js/libs/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- Always put App.js last in your javascript imports -->
        <script src="{{ asset('/js/core/App.js') }}"></script>
        <script>
            (function(namespace, $) {
                "use strict";

                var Certificate = function() {
                    // Create reference to this instance
                    var o = this;
                    // Initialize app when document is ready
                    $(document).ready(function() {
                        $(".radio-inline").click(function(e) {
                            $("input[name=hsk]").change(function(e) {
                                $("input[name=hsk_result]").val($(this).val());
                            });
                            $("input[name=tsc]").change(function(e) {
                                $("input[name=tsc_result]").val($(this).val());
                            });
                            $("input[name=opic]").change(function(e) {
                                $("input[name=opic_result]").val($(this).val());
                            });
                            $("input[name=bct]").change(function(e) {
                                $("input[name=bct_result]").val($(this).val());
                            });
                            $("input[name=driver]").change(function(e) {
                                $("input[name=driver_result]").val($(this).val());
                            });
                        });
                        $(":button").click(function() {
                            var result = "";
                            if(!$("input[name=hsk_result]").val() == "") {
                                result = result + $("input[name=hsk_result]").val() + ", ";
                            }
                            if(!$("input[name=tsc_result]").val() == "") {
                                result = result + $("input[name=tsc_result]").val() + ", ";
                            }
                            if(!$("input[name=opic_result]").val() == "") {
                                result = result + $("input[name=opic_result]").val() + ", ";
                            }
                            if(!$("input[name=bct_result]").val() == "") {
                                result = result + $("input[name=bct_result]").val() + ", ";
                            }
                            if(!$("input[name=driver_result]").val() == "") {
                                result = result + $("input[name=driver_result]").val() + ", ";
                            }

                            var n = result.lastIndexOf(", ");
                            if (n > 0) {
                                result = result.substring(0, n);
                            }
                            window.opener.$("#certificate").val(result);
                            window.close();
                        });

                    });

                };

                // =========================================================================
                namespace.Certificate = new Certificate;
            }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
        </script>
    </body>
</html>