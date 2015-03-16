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
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <script src="//cdn.poesis.kr/post/popup.min.js"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var Index = function() {
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
                this._initPostCodify();
                this._initInputMask();
                this._enableEvents();
                this._initButtonStates();
                this._initDataTables();
            };

            // =========================================================================
            // POSTCODIFY
            // =========================================================================

            p._initPostCodify = function() {
                $("#postcodify_search_button").postcodifyPopUp();
                $("input[name='postcode_1']").postcodifyPopUp();
                $("input[name='postcode_2']").postcodifyPopUp();
                $("#address_1").postcodifyPopUp();
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
            namespace.Index = new Index;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li class="active">고객사 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 고객사 관리</h3>
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
                            <header><h5 class="text-light"> <strong>고객사</strong> 목록</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-dynamic">
                                <thead>
                                    <tr>
                                        <th>고객사</th>
                                        <th>대표 이메일</th>
                                        <th>대표 번호</th>
                                        <th>진행 클래스 수</th>
                                        <th>담당자 수</th>
                                        <th>학생 수</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td><a href="mailto:{{ $company->contact_email }}">{{ $company->contact_email }}</a></td>
                                            <td>{{ $company->contact_number_1 }}</td>
                                            <td>{{ $company->courses->count() }}</td>
                                            <td>{{ $company->hrs->count() }}</td>
                                            <td>{{ $company->students->count() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                            <header><h5 class="text-light"> <strong>고객사</strong> 등록</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['url' => 'Consultant/companiesManagement/create',
                                            'class' => 'form-horizontal form-validate',
                                            'files' => true]) !!}

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="name" class="control-label">고객사 이름</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="고객사 이름" data-rule-minlength="2" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="postcode_1" class="control-label">고객사 주소 : 우편번호</label>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <input name="postcode_1" type="text" class="postcodify_postcode6_1 form-control" placeholder="" required="" readonly/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <input name="postcode_2" type="text" class="postcodify_postcode6_2 form-control" placeholder="" required="" readonly/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <button type="button" id="postcodify_search_button" class="btn btn-default">주소 찾기</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="address_1" class="control-label">고객사 주소 : 도로명 주소</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="address_1" id="address_1" class="postcodify_address form-control" placeholder="" required="" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="address_2" class="control-label">고객사 주소 : 상세 주소</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="address_2" id="address_2" class="postcodify_details form-control" placeholder="" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="contact_email" class="control-label">고객사 이메일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="email" name="contact_email" id="contact_email" class="form-control" value="" placeholder="고객사 이메일" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="contact_number_1" class="control-label">고객사 연락처 #1(필수)</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="contact_number_1" id="contact_number_1" class="form-control" value="" placeholder="고객사 연락처 #1" data-inputmask="'mask': '99999999999'" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="contact_number_2" class="control-label">고객사 연락처 #2(선택)</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="contact_number_2" id="contact_number_2" class="form-control" value="" placeholder="고객사 연락처 #2" data-inputmask="'mask': '99999999999'"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="logo_image" class="control-label">로고 이미지 <small>(500 x 500px 준수!!)</small></label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        {!! Form::file('logo_image', '', array('id'=>'logo_image', 'class'=>'')) !!}
                                    </div>
                                </div>

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