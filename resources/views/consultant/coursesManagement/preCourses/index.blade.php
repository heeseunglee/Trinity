@extends('consultant.layouts.master')

@section('additional_css_includes')
@stop

@section('additional_js_includes')
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
            };

            namespace.Index = new Index;
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
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Pre 클래스 전체보기</h3>
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
                            <header><h5 class="text-light">Pre 클래스 전체보기</h5></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-vertical-align-middle">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>과정명</th>
                                        <th>등록 학생수</th>
                                        <th>시작일</th>
                                        <th>종료일</th>
                                        <th>남은 일수</th>
                                        <th>담당자</th>
                                        <th>컨설턴트</th>
                                        <th style="width:90px">작업</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pre_courses as $pre_course)
                                        <tr>
                                            <td>
                                                @if($pre_course->status == 'p')
                                                    <span class="label label-success">진행 중</span>
                                                @elseif($pre_course->status == 'c')
                                                    <span class="label label-완료">완료</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('Consultant/coursesManagement/preCourses/show/'.$pre_course->id) }}">
                                                    {{ $pre_course->name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $pre_course->students->count() }} 명
                                            </td>
                                            <td>
                                                {{ explode(' ', $pre_course->start_datetime)[0] }}
                                            </td>
                                            <td>
                                                {{ explode(' ', $pre_course->end_datetime)[0] }}
                                            </td>
                                            <td>
                                                TODO
                                            </td>
                                            <td>
                                                {{ $pre_course->hr->user->name_kor }}
                                            </td>
                                            <td>
                                                {{ $pre_course->hr->consultant->user->name_kor }}
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('Consultant/coursesManagement/preCourses/signUpStudents/'.$pre_course->id) }}"
                                                   class="btn btn-xs btn-success btn-equal"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-original-title="학생 등록">
                                                    <i class="fa fa-user-plus"></i>
                                                </a>

                                                <a href="{{ URL::to('Consultant/coursesManagement/preCourses/removeStudents/'.$pre_course->id) }}"
                                                   class="btn btn-xs btn-danger btn-equal"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-original-title="학생 등록 취소">
                                                    <i class="fa fa-user-times"></i>
                                                </a>
                                            </td>
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