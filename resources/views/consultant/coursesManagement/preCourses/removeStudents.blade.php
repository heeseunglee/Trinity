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

            var RemoveStudents = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = RemoveStudents.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._enableEvents();
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

            namespace.RemoveStudents = new RemoveStudents;
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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Pre 클래스 학생등록 취소</h3>
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
                            <header><h5 class="text-light">Pre 클래스 등록 학생 목록</h5></header>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['class' => 'form-horizontal form-validate text-center',
                                            'role' => 'form']) !!}

                                @foreach($pre_course->students as $student)
                                    <div class="form-group">
                                        <div class="col-lg-2 col-md-2 col-sm-2">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="{{ $student->id }}" name="students[]">
                                            </label>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5">
                                            <label class="control-label" for="">
                                                {{ $student->user->name_kor }} {{ $student->position }}
                                            </label>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5">
                                            <label class="control-label" for="">
                                                {{ $student->user->email }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-primary">등록 취소하기</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop