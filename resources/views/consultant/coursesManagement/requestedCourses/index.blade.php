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
                                        <th>수강생 수</th>
                                        <th>클래스 형태</th>
                                        <th>희망 시작</th>
                                        <th>희망 종료</th>
                                        <th>희망 상담일</th>
                                        <th>희망 수강일</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($new_course_requests as $new_course_request)
                                    <tr>
                                        <td>
                                            @if($new_course_request->is_confirmed)
                                                <span class="label label-danger">완료</span>
                                            @else
                                                <span class="label label-success">승인중</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#">
                                                @foreach($new_course_request->curriculums()->get() as $curriculum)
                                                    {{ $curriculum->name }} <br/>
                                                @endforeach
                                            </a>
                                        </td>
                                        <td>
                                            {{ $new_course_request->estimated_size }}명
                                        </td>
                                        <td>
                                            {{ $new_course_request->courseType->name }}
                                        </td>
                                        <td>
                                            {{ substr($new_course_request->start_datetime, 0, -3) }}
                                        </td>
                                        <td>
                                            {{ substr($new_course_request->end_datetime, 0, -3) }}
                                        </td>
                                        <td>
                                            {{ substr($new_course_request->meeting_datetime, 0, -3) }}
                                        </td>
                                        <td>
                                            <?php
                                            $days_array = ['일', '월', '화', '수', '목', '금', '토'];
                                            $running_days_array = explode(', ', $new_course_request->running_days);
                                            $running_days_result_array = array();
                                            foreach($running_days_array as $running_day) {
                                                $running_days_result_array[] = $days_array[$running_day % 7];
                                            }
                                            ?>
                                            {{ implode(', ', $running_days_result_array) }}
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