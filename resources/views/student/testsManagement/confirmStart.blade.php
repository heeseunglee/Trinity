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
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-head box-head-xs style-danger box-bordered">
                                <header><h5 class="text-light"> <strong>테스트 주의사항</strong></h5></header>
                            </div>
                            <div class="box-body text-center">
                                <p>회원님께서 레벨테스트를 시작하시면 마우스를 절대로 <strong class="text-support2">창 밖으로</strong> 옮기지 마십시오!!</p>
                                <p class="text-support2">창이 자동으로 종료되며 시험이 자동으로 일시정지 상태가 됩니다.</p>
                                <p>레벨 테스트는 각 단계별로 20분씩 진행됩니다.</p>
                                <p>레벨 테스트를 희망하지 않으시면 아래의 <strong class="text-support2">레벨테스트 포기</strong> 버튼을 눌러주십시오. 자동으로 입문으로 배정됩니다.</p>
                                <p>레벨 테스트 도중 급하신 일이 있다면 일시정지 버튼을 눌러주십시오.</p>
                                <p>레벨 테스트의 시험 시간이 만료되면 자동으로 완료처리 됩니다.</p>
                                {!! Form::open() !!}
                                    <input name="encrypted_test_id" type="hidden" value="{{ $encrypted_test_id }}"/>

                                    <div class="form-footer text-center">
                                        <button type="button" name="takeTest" class="btn btn-success">레벨테스트 진행</button>
                                        <button type="submit" class="btn btn-danger">레벨테스트 포기</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
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

        var ConfirmStart = function() {
            // Create reference to this instance
            var o = this;
            // Initialize app when document is ready
            $(document).ready(function() {
                $("button[name=takeTest]").click(function() {
                    var w = 800;
                    var h = 600;
                    var left = (screen.width/2)-(w/2);
                    var top = (screen.height/2)-(h/2);
                    window.open('../takeTest/' + $("input[name=encrypted_test_id]").val(),
                            'popup',
                            'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
                    window.location.href = "../index";
                });
            });

        };

        // =========================================================================
        namespace.ConfirmStart = new ConfirmStart;
    }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
</script>
</body>
</html>