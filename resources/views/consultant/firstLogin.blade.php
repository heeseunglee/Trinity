@extends('consultant.layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var FirstLogin = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = Index.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
            };

            namespace.FirstLogin = new FirstLogin;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li class="active">첫 로그인 페이지</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 환영합니다!</h3>
        </div>
        <div class="section-body">
            @include('flash::message')
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
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light">첫 로그인 페이지</h5></header>
                    </div>
                    <div class="box-body">
                        {!! Form::open(['action' => 'Controllers\Consultant\FirstLoginController@update',
                        'class' => 'form-horizontal form-validate',
                        'role' => 'form',
                        'files' => true]) !!}
                        {!! Form::close() !!}
                    </div><!--end .col-lg-3 -->
                    <!-- END HEADER XS BOX -->
                </div>
            </div>
        </div>
    </section>
@stop
