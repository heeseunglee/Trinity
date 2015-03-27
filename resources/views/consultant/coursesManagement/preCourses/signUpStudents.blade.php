@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link rel="stylesheet" href="{{ asset('/css/theme-default/libs/multi-select/multi-select.css') }}"/>
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/multi-select/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var SignUpStudents = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = SignUpStudents.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._enableEvents();
                this._initMultiSelect();
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
                $('.btn-student-add').on('click', function(e) {
                    o._handleStudentAdd(e);
                });
                $('.btn-student-remove').on('click', function(e){
                    o._handleStudentRemove(e);
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

            p._handleStudentAdd = function(e) {
                $("#existing_students").removeAttr("required");
                var number_of_students = Number($("input[name=number_of_students]").val());
                number_of_students++;
                $("input[name=number_of_students]").val(number_of_students);
                var row = "<div class='form-group'><div class='col-lg-3 col-md-2 col-sm-3'><label for='name_kor_"+number_of_students+"' class='control-label'>학생 이름 "+number_of_students+"</label></div><div class='col-lg-9 col-md-10 col-sm-9'><input type='text' name='name_kor_"+number_of_students+"' id='name_kor_"+number_of_students+"' class='form-control' placeholder='학생 이름 "+number_of_students+"' data-rule-minlength='2' required=''></div></div><div class='form-group'><div class='col-lg-3 col-md-2 col-sm-3'><label for='email_"+number_of_students+"' class='control-label'>학생 이메일 "+number_of_students+"</label></div><div class='col-lg-9 col-md-10 col-sm-9'><input type='email' name='email_"+number_of_students+"' id='email_"+number_of_students+"' class='form-control' placeholder='학생 이메일 "+number_of_students+"' required=''></div></div>";
                $("#last_line").before(row);
            };

            p._handleStudentRemove = function(e) {
                var number_of_students = Number($("input[name=number_of_students]").val());
                var min_number_of_students = Number($("input[name=min_number_of_students]").val());
                if(number_of_students == 1) {
                    $("#existing_students").prop("required", "required");
                }
                if(number_of_students == min_number_of_students) {
                    return false;
                }
                number_of_students--;
                $("input[name='number_of_students").val(number_of_students);
                $(".form-group").last().remove();
                $(".form-group").last().remove();
            };

            // =========================================================================
            // MultiSelect
            // =========================================================================

            p._initMultiSelect = function() {
                if (!$.isFunction($.fn.multiSelect)) {
                    return;
                }
                $('#existing_students').multiSelect({selectableOptgroup: true});
            };

            namespace.SignUpStudents = new SignUpStudents;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Consultant/coursesManagement/index') }}">클래스 관리</a></li>
            <li class="active">Pre 클래스 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Pre 클래스 학생등록</h3>
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
                            <header><h5 class="text-light">Pre 클래스 정보</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table text-center table-vertical-align-middle table-condensed table-banded">
                                <tbody>
                                    <tr>
                                        <td>과정명</td>
                                        <td>{{ $pre_course->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>담당자</td>
                                        <td>{{ $pre_course->hr->user->name_kor }}</td>
                                    </tr>
                                    <tr>
                                        <td>고객사</td>
                                        <td>{{ $pre_course->company->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>컨설턴트</td>
                                        <td>{{ $pre_course->hr->consultant->user->name_kor }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 형태</td>
                                        <td>{{ $pre_course->courseType->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 시작일</td>
                                        <td>{{ explode(' ', $pre_course->start_datetime)[0] }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 종료일</td>
                                        <td>{{ explode(' ', $pre_course->end_datetime)[0] }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 시작시간</td>
                                        <td>{{ substr(explode(' ', $pre_course->start_datetime)[1], 0, -3) }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 종료시간</td>
                                        <td>{{ substr(explode(' ', $pre_course->end_datetime)[1], 0, -3) }}</td>
                                    </tr>
                                    <tr>
                                        <td>수강 요일</td>
                                        <td>
                                            <?php
                                                $days_array = ['일', '월', '화', '수', '목', '금', '토'];
                                                $running_days_array = explode(', ', $pre_course->running_days);
                                                $running_days_result_array = array();
                                                foreach($running_days_array as $running_day) {
                                                    $running_days_result_array[] = $days_array[$running_day % 7];
                                                }
                                            ?>
                                            {{ implode(', ', $running_days_result_array) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>교육 장소</td>
                                        <td>{{ $pre_course->location }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- START HEADER XS BOX -->
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head box-head-xs style-primary">
                            <header><h5 class="text-light">Pre 클래스 학생등록</h5></header>
                            <div class="tools" style="float: none;">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-student-add"><i class="fa fa-plus-square style-support3"></i></a>
                                    <a class="btn btn-equal btn-sm btn-student-remove"><i class="fa fa-minus-square style-support5"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['class' => 'form-horizontal form-validate text-center',
                                            'role' => 'form']) !!}
                                <?php
                                    $already_signed_up_student_ids_array = array();
                                    foreach($pre_course->students as $student) {
                                        $already_signed_up_student_ids_array[] = $student->id;
                                    }
                                    $already_signed_up_students = \App\Student::whereNotIn('id', $already_signed_up_student_ids_array)->get();
                                ?>
                                @if($already_signed_up_students->count())
                                    <input name="min_number_of_students" type="hidden" value="0"/>
                                    <input name="number_of_students" type="hidden" value="0"/>
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label class="control-label" for="existing_students">기존 학생 등록</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <select multiple="multiple" id="existing_students" name="existing_students[]" required="">
                                                @foreach($already_signed_up_students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->user->name_kor }} ( {{ $student->user->email }} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <input name="min_number_of_students" type="hidden" value="1"/>
                                    <input name="number_of_students" type="hidden" value="1"/>
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="name_kor_1" class="control-label">학생 이름 1</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input type="text" name="name_kor_1" id="name_kor_1" class="form-control" placeholder="학생 이름" data-rule-minlength="2" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-2 col-sm-3">
                                            <label for="email_1" class="control-label">학생 이메일 1</label>
                                        </div>
                                        <div class="col-lg-9 col-md-10 col-sm-9">
                                            <input type="email" name="email_1" id="email_1" class="form-control" placeholder="학생 이메일" required="">
                                        </div>
                                    </div>
                                @endif

                                <div id="last_line"></div>

                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-primary">등록하기</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop