@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/jquery.dataTables.css?'.strtotime('now')) }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/TableTools.css?'.strtotime('now')) }}" />
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/ColVis/js/ColVis.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/TableTools/media/js/TableTools.min.js') }}"></script>
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
                this._initInputMask();
                this._enableEvents();
                this._initButtonStates();
                this._initDataTables();
            };

            // =========================================================================
            // INPUTMASK
            // =========================================================================

            p._initInputMask = function() {
                $(":input").inputmask();
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
                $('#certificate').on('click', function(e) {
                    window.open('register/popups/certificate',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });
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
            // DATATABLES
            // =========================================================================

            p._initDataTables = function() {
                if (!$.isFunction($.fn.dataTable)) {
                    return;
                }
                $('.table-dynamic').dataTable({
                    "sPaginationType": "full_numbers",
                    "oLanguage": {
                        "sLengthMenu": '_MENU_ entries per page',
                        "sSearch": '<i class="fa fa-search"></i>',
                        "oPaginate": {
                            "sPrevious": '<i class="fa fa-angle-left"></i>',
                            "sNext": '<i class="fa fa-angle-right"></i>'
                        }
                    }
                });
            }

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
            <li class="active">교수진 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 교수진 등록</h3>
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
                            <header><h5 class="text-light"> <strong>교수진</strong> 등록</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['url' => 'Consultant/usersManagement/instructors/create',
                                            'class' => 'form-horizontal form-validate']) !!}

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="name">이름</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="name" placeholder="강사 이름" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="email">이메일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="email" name="email" placeholder="강사 이메일" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="phone_number">전화번호</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="phone_number" placeholder="" data-inputmask="'mask': '99999999999'" required/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="date_of_birth">생년월일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="date_of_birth" placeholder="" data-inputmask="'mask': 'y-m-d'" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="gender">성별</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="M" required> 남성
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="F" required> 여성
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="instructor_visa_type_id">국적</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_visa_type_id" id="instructor_visa_type_id" required>
                                            <option value="">선택하세요</option>
                                            @foreach(\App\InstructorVisaType::all() as $visa_type)
                                                <option value="{{ $visa_type->id }}">{{ $visa_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="certificate">자격증</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="certificate" id="certificate" placeholder="" required readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="other_certificate">기타 자격증</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="other_certificate" id="other_certificate" placeholder="" required readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="instructor_visa_type_id">학력</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_visa_type_id" id="instructor_visa_type_id" required>
                                            <option value="">선택하세요</option>
                                            @foreach(\App\InstructorVisaType::all() as $visa_type)
                                                <option value="{{ $visa_type->id }}">{{ $visa_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="instructor_visa_type_id">특화분야</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_visa_type_id" id="instructor_visa_type_id" required>
                                            <option value="">선택하세요</option>
                                            @foreach(\App\InstructorVisaType::all() as $visa_type)
                                                <option value="{{ $visa_type->id }}">{{ $visa_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
