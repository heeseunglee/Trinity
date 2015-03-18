@extends('consultant.layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var Register = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = Register.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._enableEvents();
                this._initButtonStates();
            };

            // =========================================================================
            // EVENTS
            // =========================================================================

            // events
            p._enableEvents = function() {
                var o = this;

                $('.box-head .tools .btn-refresh').on('click', function(e) {
                    o._handleBoxRefresh(e);
                });
                $('.box-head .tools .btn-collapse').on('click', function(e) {
                    o._handleBoxCollapse(e);
                });
                $('.box-head .tools .btn-close').on('click', function(e) {
                    o._handleBoxClose(e);
                });
                $('.btn-hr-add').on('click', function(e) {
                    o._handleHrAdd(e);
                });
                $('.btn-hr-remove').on('click', function(e){
                    o._handleHrRemove(e);
                });
                $('#certificate').on('click', function(e) {
                    window.open('register/popups/certificate',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });
                $("input[name=other_certificate_name_1], input[name=other_certificate_detail_1]," +
                "input[name=other_certificate_name_2], input[name=other_certificate_detail_2]," +
                "input[name=other_certificate_name_3], input[name=other_certificate_detail_3]").on('click', function(e) {
                    window.open('register/popups/otherCertificate',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                })
                $("#curriculum").on('click', function(e) {
                    window.open('register/popups/curriculum',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                })
            };

            // =========================================================================
            // HANDLERS
            // =========================================================================

            p._handleBoxRefresh = function(e) {
                var o = this;
                var box = $(e.currentTarget).closest('.box');
                boostbox.App.addBoxLoader(box);
                setTimeout(function() {
                    boostbox.App.removeBoxLoader(box);
                }, 1500);
            };

            p._handleBoxCollapse = function(e) {
                var box = $(e.currentTarget).closest('.box');
                boostbox.App.toggleBoxCollapse(box);
            };

            p._handleBoxClose = function(e) {
                var box = $(e.currentTarget).closest('.box');
                boostbox.App.removeBox(box);
            };

            p._handleHrAdd = function(e) {
                var number_of_hrs = Number($("input[name='number_of_hrs']").val());
                number_of_hrs++;
                $("input[name='number_of_hrs").val(number_of_hrs);
                var row = "<div class='form-group'><div class='col-lg-3 col-md-2 col-sm-3'><label for='name_kor_"+number_of_hrs+"' class='control-label'>인사담당자 이름 "+number_of_hrs+"</label></div><div class='col-lg-9 col-md-10 col-sm-9'><input type='text' name='name_kor_"+number_of_hrs+"' id='name_kor_"+number_of_hrs+"' class='form-control' placeholder='인사담당자 이름 "+number_of_hrs+"' data-rule-minlength='2' required=''></div></div><div class='form-group'><div class='col-lg-3 col-md-2 col-sm-3'><label for='email_"+number_of_hrs+"' class='control-label'>인사담당자 이메일 "+number_of_hrs+"</label></div><div class='col-lg-9 col-md-10 col-sm-9'><input type='email' name='email_"+number_of_hrs+"' id='email_"+number_of_hrs+"' class='form-control' placeholder='인사담당자 이메일 "+number_of_hrs+"' required=''></div></div>";
                $("#last_line").before(row);
            };

            p._handleHrRemove = function(e) {
                var number_of_hrs = Number($("input[name='number_of_hrs']").val());
                if(number_of_hrs == 1) {
                    return false;
                }
                number_of_hrs--;
                $("input[name='number_of_hrs").val(number_of_hrs);
                $(".form-group").last().remove();
                $(".form-group").last().remove();
            };

            // =========================================================================
            // BUTTON STATES (LOADING)
            // =========================================================================

            p._initButtonStates = function() {
                $('.btn-loading-state').click(function() {
                    var btn = $(this);
                    btn.button('loading');
                    setTimeout(function() {
                        btn.button('reset');
                    }, 3000);
                });
            };

            // =========================================================================
            namespace.Register = new Register;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Consultant/usersManagement/index') }}">사용자 관리</a></li>
            <li class="active">인사담당자 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 인사담당자 등록</h3>
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
                            <header><h5 class="text-light"> <strong>인사담당자</strong> 등록</h5></header>
                            <div class="tools" style="float: none;">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-hr-add"><i class="fa fa-plus-square style-support3"></i></a>
                                    <a class="btn btn-equal btn-sm btn-hr-remove"><i class="fa fa-minus-square style-support5"></i></a>
                                </div>
                            </div>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['url' => 'Consultant/usersManagement/hrs/create',
                                            'class' => 'form-horizontal form-validate']) !!}

                                <input name="number_of_hrs" type="hidden" value="1"/>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="company_id" class="control-label">고객사</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select name="company_id" id="company_id" class="form-control" required>
                                            <option value="">선택하세요</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="name_kor_1">인사담당자 이름</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="name_kor_1" placeholder="인사담당자 이름" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="email_1">인사담당자 이메일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="email" name="email_1" placeholder="인사담당자 이메일" required/>
                                    </div>
                                </div>

                                <div id="last_line"></div>

                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-primary">양식 전송하기</button>
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div><!--end .col-lg-3 -->
                <!-- END HEADER XS BOX -->
            </div>
        </div>
    </section>
@stop
