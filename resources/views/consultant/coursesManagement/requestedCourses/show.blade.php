@extends('consultant.layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var Show = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = Show.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._initCKEditor();
            };

            // =========================================================================
            // CKEDITOR
            // =========================================================================

            p._initCKEditor = function() {
                $('#ckeditor').ckeditor();
            };

            namespace.Modify = new Show;
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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 개설요청</h3>
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
                            <header><h5 class="text-light">클래스 개설요청</h5></header>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['url' => '#',
                            'class' => 'form-horizontal form-validate',
                            'role' => 'form']) !!}

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">희망과정 선택</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <?php
                                            $curriculums_array = array();
                                            foreach($new_course_request->curriculums()->get() as $curriculum) {
                                                $curriculums_array[] = $curriculum->name;
                                        }
                                        ?>
                                        <label for="" class="control-label">{{ implode(', ', $curriculums_array) }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 형태</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">{{ \App\CourseType::find($new_course_request->course_type_id)->name }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">예상 수강생 수</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">{{ $new_course_request->estimated_size - 10 }} - {{ $new_course_request->estimated_size }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">희망 강사 국적</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">{{ \App\InstructorVisaType::find($new_course_request->instructor_visa_type_id)->name }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">희망 강사 성별</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">@if($new_course_request->instructor_gender == 'M') 남성 @else 여성 @endif</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">희망 강사 경력</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">@if($new_course_request->instructor_career == 0) 상관 없음 @else {{ $new_course_request->instructor_career }} 년 이상 @endif</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 희망 시작일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <label for="" class="control-label">{{ explode(' ', $new_course_request->start_datetime)[0] }}</label>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 희망 종료일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <label for="" class="control-label">{{ explode(' ', $new_course_request->end_datetime)[0] }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 희망 시작시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <label for="" class="control-label">{{ substr(explode(' ', $new_course_request->start_datetime)[1], 0, -3) }}</label>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 희망 종료시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <label for="" class="control-label">{{ substr(explode(' ', $new_course_request->end_datetime)[1], 0, -3) }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">상담 희망일</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <label for="" class="control-label">{{ explode(' ', $new_course_request->meeting_datetime)[0] }}</label>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="meeting_time" class="control-label">상담 희망 시간</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <label for="" class="control-label">{{ substr(explode(' ', $new_course_request->meeting_datetime)[1], 0, -3) }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 희망 요일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <?php
                                            $days_array = ['일', '월', '화', '수', '목', '금', '토'];
                                            $running_days_array = explode(', ', $new_course_request->running_days);
                                            $running_days_result_array = array();
                                            foreach($running_days_array as $running_day) {
                                                $running_days_result_array[] = $days_array[$running_day % 7];
                                            }
                                        ?>
                                        <label for="" class="control-label">{{ implode(', ', $running_days_result_array) }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">클래스 희망 장소</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">{{ $new_course_request->location }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="" class="control-label">레벨 테스트 유무</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <label for="" class="control-label">@if($new_course_request->is_lvl_test) 예 @else 아니오 @endif</label>
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

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop