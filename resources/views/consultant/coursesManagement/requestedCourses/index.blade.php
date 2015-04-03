@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/jquery.dataTables.css?'.strtotime('now')) }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/TableTools.css?'.strtotime('now')) }}" />
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/ColVis/js/ColVis.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/TableTools/media/js/TableTools.min.js') }}"></script>
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
            <li class="active">클래스 개설요청 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 클래스 개설요청 전체보기</h3>
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
                            <header><h5 class="text-light">클래스 개설요청 전체보기</h5></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-vertical-align-middle">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>희망과정</th>
                                        <th>고객사</th>
                                        <th>신청 담당자</th>
                                        <th>희망 상담일</th>
                                        <th>희망 시작</th>
                                        <th>희망 종료</th>
                                        <th style="width:90px">작업</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($new_course_requests as $new_course_request)
                                    <tr>
                                        <td>
                                            @if($new_course_request->status == 'ca')
                                                <span class="label label-success">승인 완료</span>
                                            @elseif($new_course_request->status == 'pa')
                                                <span class="label label-info">승인 중</span>
                                            @else
                                                <span class="label label-danger">승인 반려</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('Consultant/coursesManagement/requestedCourses/show/'.$new_course_request->id) }}">
                                                @foreach($new_course_request->curriculums()->get() as $curriculum)
                                                    {{ $curriculum->name }} <br/>
                                                @endforeach
                                            </a>
                                        </td>
                                        <td>
                                            {{ $new_course_request->company->name }}
                                        </td>
                                        <td>
                                            {{ $new_course_request->hr->user->name_kor }}
                                        </td>
                                        <td>
                                            {{ substr($new_course_request->meeting_datetime, 0, -3) }}
                                        </td>
                                        <td>
                                            {{ substr($new_course_request->start_datetime, 0, -3) }}
                                        </td>
                                        <td>
                                            {{ substr($new_course_request->end_datetime, 0, -3) }}
                                        </td>

                                        <td>
                                            @if($new_course_request->status == 'pa')
                                                <a href="{{ URL::to('Consultant/coursesManagement/requestedCourses/approve/'.$new_course_request->id) }}"
                                                   class="btn btn-xs btn-success btn-equal"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-original-title="승인">
                                                    <i class="fa fa-check"></i>
                                                </a>

                                                <a href="{{ URL::to('Consultant/coursesManagement/requestedCourses/modify/'.$new_course_request->id) }}"
                                                   class="btn btn-xs btn-inverse btn-equal"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-original-title="수정">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="{{ URL::to('Consultant/coursesManagement/requestedCourses/reject/'.$new_course_request->id) }}"
                                                   class="btn btn-xs btn-danger btn-equal"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-original-title="반려">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            @else
                                                -
                                            @endif
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