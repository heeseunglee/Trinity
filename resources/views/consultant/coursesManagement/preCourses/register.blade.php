@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/jquery-timepicker/jquery.timepicker.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('/js/libs/moment/moment.min.js')}}"></script>
    <script src="{{ asset('/js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
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
                        $("#hr_id").html("<option value=''>선택하세요</option>");
                        return false;
                    }
                    $.get('ajax/hrSelect/' + $(this).val(), function(data) {
                        $("#hr_id").html(data);
                    });
                });
                $("#curriculum").on('click', function(e) {
                    window.open('popups/curriculum',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
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
            <li><a href="{{ URL::to('Hr/coursesManagement/preCourses/index') }}">Pre 클래스 관리</a></li>
            <li class="active">Pre 클래스 등록</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Pre 클래스 등록</h3>
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
                            <header><h5 class="text-light">Pre 클래스 등록</h5></header>
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
                                        <label for="curriculum" class="control-label">희망과정 선택</label>
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
                                        <label for="estimated_size" class="control-label">예상 수강생 수</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="estimated_size" id="" required="">
                                            <option value="">선택하세요</option>
                                            <option value="10">0 - 10명</option>
                                            <option value="20">10 - 20명</option>
                                            <option value="30">20 - 30명</option>
                                            <option value="40">30 - 40명</option>
                                            <option value="50">40 - 50명</option>
                                            <option value="60">50명 이상</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="instructor_visa_type_id" class="control-label">희망 강사 국적</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_visa_type_id" id="" required="">
                                            <option value="">선택하세요</option>
                                            @foreach(\App\InstructorVisaType::all() as $visa_type)
                                                <option value="{{ $visa_type->id }}">{{ $visa_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="instructor_gender" class="control-label">희망 강사 성별</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm 3">
                                        <label class="radio-inline">
                                            <input type="radio" name="instructor_gender" value="M" required> 남성
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm 3">
                                        <label class="radio-inline">
                                            <input type="radio" name="instructor_gender" value="F" required> 여성
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="instructor_career" class="control-label">희망 강사 경력</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_career" id="" required="">
                                            <option value="">선택하세요</option>
                                            <option value="3">3년 이상</option>
                                            <option value="5">5년 이상</option>
                                            <option value="10">10년 이상</option>
                                            <option value="15">15년 이상</option>
                                            <option value="0">상관 없음</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="start_date" class="control-label">클래스 희망 시작일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="start_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="end_date" class="control-label">클래스 희망 종료일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="end_date" class="form-control input-datetimepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="start_time" class="control-label">클래스 희망 시작시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="start_time" class="form-control input-timepicker" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="end_time" class="control-label">클래스 희망 종료시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="end_time" class="form-control input-timepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="meeting_date" class="control-label">상담 희망일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="meeting_date" class="form-control input-datetimepicker" data-format="YYYY-MM-DD" required=""/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="meeting_time" class="control-label">상담 희망 시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" name="meeting_time" class="form-control input-timepicker" required=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="running_days[]" class="control-label">클래스 희망 요일</label>
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
                                        <label for="location" class="control-label">클래스 희망 장소</label>
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

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="other_requests" class="control-label">기타 요청사항</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <textarea id="ckeditor" name="other_requests" class="form-control control-12-rows" placeholder="Enter text ..."></textarea>
                                    </div>
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