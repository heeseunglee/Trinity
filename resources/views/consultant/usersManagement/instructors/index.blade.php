@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/jquery.dataTables.css?'.strtotime('now')) }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/TableTools.css?'.strtotime('now')) }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/jquery-timepicker/jquery.timepicker.css?'.strtotime('now')) }}" />
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/ColVis/js/ColVis.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/TableTools/media/js/TableTools.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
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
                this._enableEvents();
                this._initButtonStates();
                this._initDataTables();
                this._initTimePicker();
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
            };

            // =========================================================================
            // TIMEPICKER
            // =========================================================================

            p._initTimePicker = function() {
                if (!$.isFunction($.fn.timepicker)) {
                    return;
                }
                $('.input-timepicker').timepicker({'step': 60});
            };

            // =========================================================================
            namespace.Index = new Index;
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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 교수진 전체보기</h3>
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
                            <header><h5 class="text-light"> <strong>교수진</strong> 검색</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['id' => 'instructor_search',
                                            'class' => 'form-horizontal']) !!}

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="name" class="control-label">강사명</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="curriculum" class="control-label">특화분야</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <input type="text" name="curriculum" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="career_years" class="control-label">경력사항</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <select name="career_years" id="career_years" class="form-control">
                                                    <option value="">선택하세요</option>
                                                    <option value="3">3년 이상</option>
                                                    <option value="5">5년 이상</option>
                                                    <option value="10">10년 이상</option>
                                                    <option value="15">15년 이상</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="available_morning_from" class="control-label">시간대(오전)</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="text" class="form-control input-timepicker" name="available_morning_from" data-min-time="06:00am" data-max-time="12:00pm"/>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-1">
                                                <label for="" class="control-label">~</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="text" class="form-control input-timepicker" name="available_morning_to" data-min-time="06:00am" data-max-time="12:00pm"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="available_afternoon_from" class="control-label">시간대(오후)</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="text" class="form-control input-timepicker" name="available_afternoon_from" data-min-time="12:00pm" data-max-time="06:00pm"/>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-1">
                                                <label for="" class="control-label">~</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="text" class="form-control input-timepicker" name="available_afternoon_to" data-min-time="12:00pm" data-max-time="06:00pm"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="available_night_from" class="control-label">시간대(심야)</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="text" class="form-control input-timepicker" name="available_night_from" data-min-time="06:00pm" data-max-time="12:00am"/>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-1">
                                                <label for="" class="control-label">~</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="text" class="form-control input-timepicker" name="available_night_to" data-min-time="06:00pm" data-max-time="12:00am"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="rating" class="control-label">강사등급</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <select class="form-control" name="rating" id="rating">
                                                    <option value="">선택하세요</option>
                                                    <option value="15">A+</option>
                                                    <option value="14">A</option>
                                                    <option value="13">A-</option>
                                                    <option value="12">B+</option>
                                                    <option value="11">B</option>
                                                    <option value="10">B-</option>
                                                    <option value="9">C+</option>
                                                    <option value="8">C</option>
                                                    <option value="7">C-</option>
                                                    <option value="6">D+</option>
                                                    <option value="5">D</option>
                                                    <option value="4">D-</option>
                                                    <option value="3">E+</option>
                                                    <option value="2">E</option>
                                                    <option value="1">E-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="email3" class="control-label">강사분류</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <select class="form-control" name="visa_type" id="visa_type">
                                                    <option value="">선택하세요</option>
                                                    @foreach(App\InstructorVisaType::all() as $visa_type)
                                                        <option value="{{ $visa_type->visa_type }}">{{ $visa_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="contract_period" class="control-label">계약기간</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <select class="form-control" name="contract_period" id="contract_period">
                                                    <option value="">선택하세요</option>
                                                    @for($i = 3; $i < 37; $i++)
                                                        <option value="{{ $i }}">{{ $i }} 개월</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="preferred_area" class="control-label">선호지역</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <input class="form-control" type="text" name="preferred_area" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="gender" class="control-label">성별</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="M"> 남성
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="F"> 여성
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-2 col-sm-3">
                                                <label for="age" class="control-label">나이</label>
                                            </div>
                                            <div class="col-lg-9 col-md-10 col-sm-9">
                                                <select class="form-control" name="age" id="age">
                                                    <option value="">선택하세요</option>
                                                    <option value="25">25 ~ 30</option>
                                                    <option value="30">30 ~ 35</option>
                                                    <option value="35">35 ~ 40</option>
                                                    <option value="40">40 ~ 45</option>
                                                    <option value="45">45 ~ 50</option>
                                                    <option value="50">50 ~ 55</option>
                                                    <option value="55">55 ~ 60</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-primary">검색하기</button>
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
                            <header><h5 class="text-light"> <strong>교수진</strong> 목록</h5></header>
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
                                        <th>이름</th>
                                        <th>경력</th>
                                        <th>강사등급</th>
                                        <th>계약기간</th>
                                        <th>선호지역</th>
                                        <th>담당 고객사 수</th>
                                        <th>클래스 수 / 학생 수</th>
                                        <th>특화분야</th>
                                        <th class="text-right" style="width:90px">보기</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instructors as $instructor)
                                        <tr>
                                            <td>{{ $instructor->user->name_kor }}</td>
                                            <td>{{ $instructor->career_years }}</td>
                                            <td>{{ $instructor->rating }}</td>
                                            <td>{{ $instructor->end_of_contract_date }}</td>
                                            <td>TODO</td>
                                            <td>1</td>
                                            <td>1/1</td>
                                            <td>TODO</td>
                                            <td class="text-right" style="width:90px">
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Copy row"><i class="fa fa-copy"></i></button>
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end .col-lg-3 -->
                <!-- END HEADER XS BOX -->
            </div>
        </div>
    </section>
@stop
