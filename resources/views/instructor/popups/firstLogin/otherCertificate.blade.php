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
                                <header><h5 class="text-light"> <strong>기타 자격증 1</strong></h5></header>
                            </div>
                            <div class="box-body">
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="other_certificate_name_1" class="control-label">자격증 이름</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input class="form-control" type="text" name="other_certificate_name_1" placeholder="통번역 자격증"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="other_certificate_detail_1" class="control-label">자격증 상세내용</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input class="form-control" type="text" name="other_certificate_detail_1" placeholder="1급 / 점수"/>
                                        </div>
                                    </div>
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
                                <header><h5 class="text-light"> <strong>기타 자격증 2</strong></h5></header>
                            </div>
                            <div class="box-body">
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="other_certificate_name_2" class="control-label">자격증 이름</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input class="form-control" type="text" name="other_certificate_name_2" placeholder="통번역 자격증"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="other_certificate_detail_2" class="control-label">자격증 상세내용</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input class="form-control" type="text" name="other_certificate_detail_2" placeholder="1급 / 점수"/>
                                        </div>
                                    </div>
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
                                <header><h5 class="text-light"> <strong>기타 자격증 3</strong></h5></header>
                            </div>
                            <div class="box-body">
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="other_certificate_name_3" class="control-label">자격증 이름</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input class="form-control" type="text" name="other_certificate_name_3" placeholder="통번역 자격증"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="other_certificate_detail_3" class="control-label">자격증 상세내용</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input class="form-control" type="text" name="other_certificate_detail_3" placeholder="1급 / 점수"/>
                                        </div>
                                    </div>
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

        var OtherCertificate = function() {
            // Create reference to this instance
            var o = this;
            // Initialize app when document is ready
            $(document).ready(function() {
                $(":button").click(function() {
                    window.opener.$("input[name=other_certificate_name_1]").val($("input[name=other_certificate_name_1]").val());
                    window.opener.$("input[name=other_certificate_detail_1]").val($("input[name=other_certificate_detail_1]").val());
                    window.opener.$("input[name=other_certificate_name_2]").val($("input[name=other_certificate_name_2]").val());
                    window.opener.$("input[name=other_certificate_detail_2]").val($("input[name=other_certificate_detail_2]").val());
                    window.opener.$("input[name=other_certificate_name_3]").val($("input[name=other_certificate_name_3]").val());
                    window.opener.$("input[name=other_certificate_detail_3]").val($("input[name=other_certificate_detail_3]").val());
                    window.close();
                });

            });

        };

        // =========================================================================
        namespace.OtherCertificate = new OtherCertificate;
    }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
</script>
</body>
</html>