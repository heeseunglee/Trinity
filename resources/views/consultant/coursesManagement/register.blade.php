@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/jquery-timepicker/jquery.timepicker.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/theme-default/libs/multi-select/multi-select.css') }}"/>
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('/js/libs/moment/moment.min.js')}}"></script>
    <script src="{{ asset('/js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/js/libs/multi-select/jquery.multi-select.js') }}"></script>
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
                this._initEvents();
                this._initCKEditor();
                this._initTimepicker();
                this._initDatepicker();
            };

            // =========================================================================
            // EVENTS
            // =========================================================================

            p._initEvents = function() {
                $("#company_id").on('change', function(e) {
                    if(!$(this).val()) {
                        $("#hr_id").html("");
                        $("#students_list").html("");
                        return false;
                    }
                    $.get('ajax/hrSelect/' + $(this).val(), function(data) {
                        $("#hr_id").html(data);
                    });
                    $.get('ajax/studentsListMultiselect/' + $(this).val(), function(data) {
                        $("#students_list").html(data);
                    }).success(function() {
                        if (!$.isFunction($.fn.multiSelect)) {
                            return;
                        }
                        $('#students').multiSelect({selectableOptgroup: true});
                    });
                });
                $("#curriculum").on('click', function(e) {
                    window.open('popups/curriculum',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });
                $("input[name=is_lvl_test]").on('change', function(e) {
                    if($(this).val() == 1) {
                        $("#mid_lvl_test").css('display', 'block');
                        $("#final_lvl_test").css('display', 'block');
                    }
                    else {
                        $("#mid_lvl_test").css('display', 'none');
                        $("#final_lvl_test").css('display', 'none');
                    }
                });
            };

            // =========================================================================
            // CKEDITOR
            // =========================================================================

            p._initCKEditor = function() {
                $('#ckeditor').ckeditor();
            };

            // =========================================================================
            // TIMEPICKER
            // =========================================================================

            p._initTimepicker = function() {
                $('.input-timepicker').timepicker({
                    'timeFormat': 'H:i',
                    'minTime' : '06:00',
                    'maxTime' : '24:00'
                });
            }

            // =========================================================================
            // DATEPICKER
            // =========================================================================

            p._initDatepicker = function() {
                if (!$.isFunction($.fn.datepicker)) {
                    return;
                }

                var nowTemp = new Date();
                var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                var start_date = $('input[name=start_date]').datepicker({
                    format: 'yyyy-mm-dd',
                    onRender: function(date) {
                        return date.valueOf() < now.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function(ev) {
                    if (ev.date.valueOf() >= end_date.date.valueOf()) {
                        var newDate = new Date(ev.date);
                        newDate.setDate(newDate.getDate() + 1);
                        end_date.setValue(newDate);
                    }
                    start_date.hide();
                    $('input[name=end_date]')[0].focus();
                }).data('datepicker');

                var end_date = $('input[name=end_date]').datepicker({
                    format: 'yyyy-mm-dd',
                    onRender: function(date) {
                        return date.valueOf() <= start_date.date.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function(ev) {
                    end_date.hide();
                }).data('datepicker');

                var mid_lvl_test_start_date = $('input[name=mid_lvl_test_start_date]').datepicker({
                    format: 'yyyy-mm-dd',
                    onRender: function(date) {
                        return date.valueOf() < now.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function(ev) {
                    if (ev.date.valueOf() >= mid_lvl_test_end_date.date.valueOf()) {
                        var newDate = new Date(ev.date);
                        newDate.setDate(newDate.getDate() + 1);
                        mid_lvl_test_end_date.setValue(newDate);
                    }
                    mid_lvl_test_start_date.hide();
                    $('input[name=mid_lvl_test_end_date]')[0].focus();
                }).data('datepicker');

                var mid_lvl_test_end_date = $('input[name=mid_lvl_test_end_date]').datepicker({
                    format: 'yyyy-mm-dd',
                    onRender: function(date) {
                        return date.valueOf() <= mid_lvl_test_start_date.date.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function(ev) {
                    mid_lvl_test_end_date.hide();
                }).data('datepicker');

                var final_lvl_test_start_date = $('input[name=final_lvl_test_start_date]').datepicker({
                    format: 'yyyy-mm-dd',
                    onRender: function(date) {
                        return date.valueOf() < now.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function(ev) {
                    if (ev.date.valueOf() >= final_lvl_test_end_date.date.valueOf()) {
                        var newDate = new Date(ev.date);
                        newDate.setDate(newDate.getDate() + 1);
                        final_lvl_test_end_date.setValue(newDate);
                    }
                    final_lvl_test_start_date.hide();
                    $('input[name=final_lvl_test_end_date]')[0].focus();
                }).data('datepicker');

                var final_lvl_test_end_date = $('input[name=final_lvl_test_end_date]').datepicker({
                    format: 'yyyy-mm-dd',
                    onRender: function(date) {
                        return date.valueOf() <= final_lvl_test_start_date.date.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function(ev) {
                    final_lvl_test_end_date.hide();
                }).data('datepicker');

            };

            // =========================================================================
            // MultiSelect
            // =========================================================================

            p._initMultiSelect = function() {
                if (!$.isFunction($.fn.multiSelect)) {
                    return;
                }
                $('#students').multiSelect({selectableOptgroup: true});
            };

            namespace.Register = new Register;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Hr/coursesManagement/index') }}">클래스 관리</a></li>
            <li class="active">클래스 등록</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 등록</h3>
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
                            <header><h5 class="text-light">클래스 등록</h5></header>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['class' => 'form-horizontal form-validate text-center',
                            'role' => 'form']) !!}

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="company_id" class="control-label">고객사</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="company_id" id="company_id">
                                            <option value="">선택하세요</option>
                                            @foreach(App\Company::all() as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="hr_id" class="control-label">인사담당자</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9" id="hr_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="curriculum" class="control-label">과정 선택</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="curriculum" id="curriculum" class="form-control" readonly required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="course_type_id" class="control-label">클래스 형태</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="course_type_id" id="" required="">
                                            <option value="">선택하세요</option>
                                            @foreach(\App\CourseType::all() as $course_type)
                                                <option value="{{ $course_type->id }}">{{ $course_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="name" class="control-label">클래스 명</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control" required="" data-rule-minlength="8" placeholder="CGV 금융중국어 입문 A 1"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="start_date" class="control-label">클래스 시작일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="start_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="end_date" class="control-label">클래스 종료일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="end_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="start_time" class="control-label">클래스 시작시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="start_time" class="form-control input-timepicker" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="end_time" class="control-label">클래스 종료시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="end_time" class="form-control input-timepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="running_days[]" class="control-label">클래스 진행 요일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="1" required=""> 월
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="2" required=""> 화
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="3" required=""> 수
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="4" required=""> 목
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="5" required=""> 금
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="6" required=""> 토
                                        </label>
                                        <label class="checkbox-inline">
                                            <input name="running_days[]" type="checkbox" value="7" required=""> 일
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="location" class="control-label">클래스 진행 장소</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="location" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="is_lvl_test" class="control-label">레벨 테스트 유무</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input name="is_lvl_test" type="radio" value="1" checked="checked" required=""> 예
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input name="is_lvl_test" type="radio" value="0" required=""> 아니오
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group" id="mid_lvl_test">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="mid_lvl_test_start_date" class="control-label">중간 테스트 시작일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="mid_lvl_test_start_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="mid_lvl_test_end_date" class="control-label">중간 테스트 종료일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="mid_lvl_test_end_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group" id="final_lvl_test">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="final_lvl_test_start_date" class="control-label">수료 테스트 시작일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="final_lvl_test_start_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="final_lvl_test_end_date" class="control-label">수료 테스트 종료일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="final_lvl_test_end_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="instructor_id" class="control-label">교수진 선택</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_id" id="" required="">
                                            <option value="">선택하세요</option>
                                            @foreach(\App\Instructor::all() as $instructor)
                                                <option value="{{ $instructor->id }}">{{ $instructor->user->name_kor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="students_list">
                                </div>

                                <div class="form-footer text-right">
                                    <button type="submit" type="button" class="btn btn-primary">양식 전송하기</button>
                                </div>

                            {!! Form::close() !!}
                        </div><!--end .col-lg-12 -->
                        <!-- END HEADER XS BOX -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop