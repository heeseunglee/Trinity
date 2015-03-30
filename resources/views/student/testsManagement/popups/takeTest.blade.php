<html lang="en">
<head>
    <title>The Mandarin::TMIP</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="The Mandarin Integration Platform">
    <meta name="_token" content="{{{ csrf_token() }}}" />

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

        @if($lvl_test_mc->proceed_step == 0)
            @include('student.testsManagement.popups.partials.takeTestBeginner')
        @elseif($lvl_test_mc->proceed_step == 1)
            @include('student.testsManagement.popups.partials.takeTestElementary')
        @elseif($lvl_test_mc->proceed_step == 2)
            @include('student.testsManagement.popups.partials.takeTestIntermediate')
        @elseif($lvl_test_mc->proceed_step == 3)
            @include('student.testsManagement.popups.partials.takeTestExpert')
        @endif


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
    function updateMcAnswer(answer_number, answer) {

        var $post = {};
        $post.encrypted_test_id = $("input[name=encrypted_test_id]").val();
        $post.answer_number = answer_number;
        $post.answer = answer;

        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            type: "POST",
            url: "ajax/updateMcAnswer",
            data: $post,
            cache: false,
            success: function(){}
        });
        return false;
    }

    function submitMcTest() {
        var $post = {};
        $post.encrypted_test_id = $("input[name=encrypted_test_id]").val();
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            type: "POST",
            url: "ajax/submitMcTest",
            data: $post,
            cache: false,
            success: function(data){
                $("#content").html(data);
            }
        });
        return false;
    }

    function pauseMcTest() {
        var $post = {};
        $post.encrypted_test_id = $("input[name=encrypted_test_id]").val();
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            type: "POST",
            url: "ajax/pauseMcTest",
            data: $post,
            cache: false,
            success: function(){}
        });
        alert('시험이 일시정시 상태가 되었습니다. 시험을 종료합니다.');
        window.close();
    }

//    $(document).ready(function() {
//        $("html").mouseleave(function() {
//            pauseMcTest();
//        });
//    });

</script>
</body>
</html>