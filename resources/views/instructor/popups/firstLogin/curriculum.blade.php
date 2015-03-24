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
                        @foreach($course_main_curriculums as $course_main_curriculum)
                            <div class="row">
                                <!-- START HEADER XS BOX -->
                                <div class="col-lg-12">
                                    <div class="box">
                                        <div class="box-head box-head-xs style-primary">
                                            <header><h5 class="text-light"> <strong>{{ $course_main_curriculum->name }}</strong></h5></header>
                                        </div>
                                        <div class="box-body">
                                            {!! Form::open(['class' => 'form-horizontal']) !!}
                                                <div class="form-group">
                                                    @foreach($course_main_curriculum->courseSubCurriculums as $course_sub_curriculum)
                                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" value="{{ $course_sub_curriculum->name }}"> {{ $course_sub_curriculum->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div><!--end .col-lg-3 -->
                                <!-- END HEADER XS BOX -->
                            </div>
                        @endforeach


                        <div class="row">
                            <!-- START BASIC BUTTONS -->
                            <div class="col-lg-12">
                                <div class="box style-transparent">
                                    <div class="box-body text-center">
                                        <p class="text-right">
                                            <button type="button" class="btn btn-primary">특화분야 등록하기</button>
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

                var Curriculum = function() {
                    // Create reference to this instance
                    var o = this;
                    // Initialize app when document is ready
                    $(document).ready(function() {
                        $(":button").click(function(e) {
                            var result = "";
                            $(":checkbox:checked").each(function() {
                                result += $(this).val() + ", ";
                            })
                            var n = result.lastIndexOf(", ");
                            result = result.substring(0, n);
                            window.opener.$("#curriculum").val(result);
                            window.close();
                        });
                    });

                };

                // =========================================================================
                namespace.Curriculum = new Curriculum;
            }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
        </script>
    </body>
</html>