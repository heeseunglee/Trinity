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

            namespace.Show = new Show;
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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Pre 클래스 보기</h3>
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
                <div class="col-lg-6">
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
                                </tbody>
                            </table>
                            {!! Form::open(['class' => 'form-horizontal']) !!}
                                <div class="form-footer text-right">
                                    <button type="submit" class="btn btn-success">Pre 클래스 완료</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-head box-head-xs style-primary">
                            <header><h5 class="text-light">클래스 요청 정보</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                            $new_course_request = $pre_course->newCourseRequest;
                        ?>
                        <div class="box-body">
                            <table class="table text-center table-vertical-align-middle table-condensed table-banded">
                                <tbody>
                                    <tr>
                                        <td>교육 형태</td>
                                        <td>{{ $new_course_request->courseType->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 시작일</td>
                                        <td>{{ explode(' ', $new_course_request->start_datetime)[0] }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 종료일</td>
                                        <td>{{ explode(' ', $new_course_request->end_datetime)[0] }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 시작시간</td>
                                        <td>{{ substr(explode(' ', $new_course_request->start_datetime)[1], 0, -3) }}</td>
                                    </tr>
                                    <tr>
                                        <td>교육 종료시간</td>
                                        <td>{{ substr(explode(' ', $new_course_request->end_datetime)[1], 0, -3) }}</td>
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
                                    <tr>
                                        <td>기타 요청사항</td>
                                        <td>
                                            <textarea id="ckeditor" name="other_requests" class="form-control control-12-rows" placeholder="Enter text ...">
                                                {{ $new_course_request->other_requests }}
                                            </textarea>
                                        </td>
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
                            <table class="table table-vertical-align-middle table-condensed">
                                <thead>
                                    <tr>
                                        <th>학생명</th>
                                        <th>이메일</th>
                                        <th>연락처</th>
                                        <th>입과테스트 진행여부</th>
                                        <th>입과테스트 결과</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pre_course->students as $student)
                                        <tr>
                                            <td>{{ $student->user->name_kor }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>{{ $student->user->phone_number }}</td>
                                            <?php
                                                $lvl_test = $student->lvlTests()->where('course_id', $pre_course->id)->first();
                                            ?>
                                            <td>
                                                @if($lvl_test->status == 'w')
                                                    <span class="label label-warning">대기</span>
                                                @elseif($lvl_test->status == 'p')
                                                    <span class="label label-success">진행 중</span>
                                                @else
                                                    <span class="label label-danger">완료</span>
                                                @endif
                                            </td>
                                            <td>{{ floatval($lvl_test->lvl_test_mc_result) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop