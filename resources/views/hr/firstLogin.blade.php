@extends('hr.layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
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
            var p = FirstLogin.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._initInputMask();
            };

            // =========================================================================
            // INPUTMASK
            // =========================================================================

            p._initInputMask = function() {
                $(":input").inputmask();
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
            <div class="row">
                <!-- START HEADER XS BOX -->
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head box-head-xs style-primary">
                            <header><h5 class="text-light">첫 로그인 페이지</h5></header>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['action' => 'Hr\FirstLoginController@update',
                            'class' => 'form-horizontal form-validate',
                            'role' => 'form',
                            'files' => true]) !!}
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="password" class="control-label">비밀번호</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="password" id="password" required="" data-rule-minlength="6" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="password_confirmation">비밀번호 확인</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required="" data-rule-equalto="#password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="name_eng">영문 이름</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name_eng" id="name_eng" required="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="phone_number">개인 연락처</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="phone_number" id="phone_number" required="" data-inputmask="'mask': '99999999999'" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="profile_image">프로필 이미지</label>
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::file('profile_image') !!}
                                    </div>
                                </div>

                                <div class="form-footer text-right">
                                    <button type="submit" type="button" class="btn btn-primary">양식 전송하기</button>
                                </div>
                            {!! Form::close() !!}
                        </div><!--end .col-lg-3 -->
                        <!-- END HEADER XS BOX -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop