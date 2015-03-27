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

        var CompleteTest = function() {
            // Create reference to this instance
            var o = this;
            // Initialize app when document is ready
            $(document).ready(function() {
                window.opener.location.replace('../index');
                window.close();
            });

        };

        // =========================================================================
        namespace.CompleteTest = new CompleteTest;
    }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
</script>
</body>
</html>