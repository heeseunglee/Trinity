@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/jquery-timepicker/jquery.timepicker.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('/js/libs/moment/moment.min.js')}}"></script>
    <script src="{{ asset('/js/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var Modify = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = Modify.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._initEvents();
                this._initCKEditor();
                this._initTimepicker();
                this._initDateTime();
            };

            // =========================================================================
            // EVENTS
            // =========================================================================

            p._initEvents = function() {
                $("#curriculum").on('click', function(e) {
                    window.open('../popups/curriculum',
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
                    'timeFormat': 'H:i'
                });
            }

            // =========================================================================
            // DATETIMEPICKER
            // =========================================================================

            p._initDateTime = function() {
                if (!$.isFunction($.fn.datetimepicker)) {
                    return;
                }
                $(".input-datetimepicker").datetimepicker({
                    'pickTime': false
                });
                $("input[name=start_date]").on("change.dp", function(e) {
                    $("input[name=end_date]").data("DateTimePicker").setStartDate(e.date);
                });
                $("input[name=end_date]").on("change.dp", function(e) {
                    $("input[name=start_date]").data("DateTimePicker").setEndDate(e.date);
                });
            }

            namespace.Modify = new Modify;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Consultant/coursesManagement/index') }}">클래스 관리</a></li>
            <li class="active">클래스 개설요청 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 개설요청 수정</h3>
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
                            <header><h5 class="text-light">클래스 개설요청 수정</h5></header>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['class' => 'form-horizontal form-validate text-center',
                                            'role' => 'form']) !!}

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="curriculum" class="control-label">희망과정 선택</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <?php
                                            $curriculums_array = array();
                                            foreach($new_course_request->curriculums()->get() as $curriculum) {
                                                $curriculums_array[] = $curriculum->name;
                                            }
                                        ?>
                                        <input type="text"
                                               name="curriculum"
                                               id="curriculum"
                                               class="form-control"
                                               readonly
                                               required=""
                                               value="{{ implode(', ', $curriculums_array) }}"/>
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
                                                <option value="{{ $course_type->id }}"
                                                    @if($new_course_request->course_type_id == $course_type->id)
                                                        selected="selected"
                                                    @endif>{{ $course_type->name }}</option>
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
                                            <option value="10"
                                                @if($new_course_request->estimated_size == 10)
                                                    selected="selected"
                                                @endif>0 - 10명</option>
                                            <option value="20"
                                                @if($new_course_request->estimated_size == 20)
                                                    selected="selected"
                                                @endif>10 - 20명</option>
                                            <option value="30"
                                                @if($new_course_request->estimated_size == 30)
                                                    selected="selected"
                                                @endif>20 - 30명</option>
                                            <option value="40"
                                                @if($new_course_request->estimated_size == 40)
                                                    selected="selected"
                                                @endif>30 - 40명</option>
                                            <option value="50"
                                                @if($new_course_request->estimated_size == 50)
                                                    selected="selected"
                                                @endif>40 - 50명</option>
                                            <option value="60"
                                                @if($new_course_request->estimated_size == 60)
                                                    selected="selected"
                                                @endif>50명 이상</option>
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
                                                <option value="{{ $visa_type->id }}"
                                                    @if($new_course_request->instructor_visa_type_id == $visa_type->id)
                                                        selected="selected"
                                                    @endif>{{ $visa_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="instructor_gender" class="control-label">희망 강사 성별</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input type="radio"
                                                   name="instructor_gender"
                                                   value="M"
                                                   required
                                                @if($new_course_request->instructor_gender == 'M')
                                                   checked="checked"
                                                @endif> 남성
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input type="radio"
                                                   name="instructor_gender"
                                                   value="F"
                                                   required
                                                @if($new_course_request->instructor_gender == 'F')
                                                   checked="checked"
                                                @endif> 여성
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="instructor_career" class="control-label">희망 강사 경력</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_career" id="" required="">
                                            <option value=""
                                                    >선택하세요</option>
                                            <option value="3"
                                                @if($new_course_request->instructor_career == 3)
                                                    selected="selected"
                                                @endif>3년 이상</option>
                                            <option value="5"
                                                @if($new_course_request->instructor_career == 5)
                                                    selected="selected"
                                                @endif>5년 이상</option>
                                            <option value="10"
                                                @if($new_course_request->instructor_career == 10)
                                                    selected="selected"
                                                @endif>10년 이상</option>
                                            <option value="15"
                                                @if($new_course_request->instructor_career == 15)
                                                    selected="selected"
                                                @endif>15년 이상</option>
                                            <option value="0"
                                                @if($new_course_request->instructor_career == 0)
                                                    selected="selected"
                                                @endif>상관 없음</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="start_date" class="control-label">클래스 희망 시작일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text"
                                               name="start_date"
                                               class="form-control input-datetimepicker"
                                               data-format="YYYY-MM-DD"
                                               required=""
                                               value="{{ explode(' ', $new_course_request->start_datetime)[0] }}"/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="end_date" class="control-label">클래스 희망 종료일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text"
                                               name="end_date"
                                               class="form-control input-datetimepicker"
                                               data-format="YYYY-MM-DD"
                                               required=""
                                               value="{{ explode(' ', $new_course_request->end_datetime)[0] }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="start_time" class="control-label">클래스 희망 시작시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text"
                                               name="start_time"
                                               class="form-control input-timepicker"
                                               required=""
                                               value="{{ substr(explode(' ', $new_course_request->start_datetime)[1], 0, -3) }}"/>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="end_time" class="control-label">클래스 희망 종료시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text"
                                               name="end_time"
                                               class="form-control input-timepicker"
                                               required=""
                                               value="{{ substr(explode(' ', $new_course_request->end_datetime)[1], 0, -3) }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="meeting_date" class="control-label">상담 희망일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text"
                                               name="meeting_date"
                                               class="form-control input-datetimepicker"
                                               data-format="YYYY-MM-DD"
                                               required=""
                                               value="{{ explode(' ', $new_course_request->meeting_datetime)[0] }}" />
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="meeting_time" class="control-label">상담 희망 시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text"
                                               name="meeting_time"
                                               class="form-control input-timepicker"
                                               required=""
                                               value="{{ substr(explode(' ', $new_course_request->meeting_datetime)[1], 0, -3) }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="running_days[]" class="control-label">클래스 희망 요일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        @for($i = 1, $days_array = ['일','월','화','수','목','금','토']; $i <= 7; $i++)
                                            <label class="checkbox-inline">
                                                <input name="running_days[]"
                                                       type="checkbox"
                                                       value="{{ $i }}"
                                                       required=""
                                                   @if(strpos($new_course_request->running_days, ''.$i) !== false)
                                                       checked="checked"
                                                   @endif> {{ $days_array[$i%7] }}
                                            </label>
                                        @endfor
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="location" class="control-label">클래스 희망 장소</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="location" required="" value="{{ $new_course_request->location }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="is_lvl_test" class="control-label">레벨 테스트 유무</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input name="is_lvl_test" type="radio" value="1" required=""
                                                @if($new_course_request->is_lvl_test)
                                                   checked="checked"
                                                @endif> 예
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input name="is_lvl_test" type="radio" value="0" required=""
                                                @if(!$new_course_request->is_lvl_test)
                                                   checked="checked"
                                                @endif> 아니오
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="other_requests" class="control-label">기타 요청사항</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <textarea id="ckeditor" name="other_requests" class="form-control control-12-rows" placeholder="Enter text ...">
                                            {{ $new_course_request->other_requests }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-footer text-right">
                                    <button type="submit" type="button" class="btn btn-success">승인하기</button>
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop