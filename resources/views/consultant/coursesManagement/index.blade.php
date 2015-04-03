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
                this._initDataTables();
            };

            // =========================================================================
            // DATATABLES
            // =========================================================================

            p._initDataTables = function() {
                if (!$.isFunction($.fn.dataTable)) {
                    return;
                }
                $('.table-dynamic').dataTable({
                    "sPaginationType": "full_numbers",
                    "oLanguage": {
                        "sLengthMenu": '_MENU_ entries per page',
                        "sSearch": '<i class="fa fa-search"></i>',
                        "oPaginate": {
                            "sPrevious": '<i class="fa fa-angle-left"></i>',
                            "sNext": '<i class="fa fa-angle-right"></i>'
                        }
                    }
                });
            }

            namespace.Register = new Index;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Hr/coursesManagement/index') }}">클래스 관리</a></li>
            <li class="active">전체 보기</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 전체 보기</h3>
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
                            <header><h5 class="text-light">클래스 현황</h5></header>
                        </div>
                        <div class="box-body">
                            <table class="table table-dynamic">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>고객사</th>
                                        <th>클래스 명</th>
                                        <th>요일</th>
                                        <th>시작일</th>
                                        <th>종료일</th>
                                        <th>시작시간</th>
                                        <th>종료시간</th>
                                        <th>장소</th>
                                        <th>학생수</th>
                                        <th>진행도</th>
                                        <th>교수진</th>
                                        <th class="text-right" style="width:90px">보기</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>
                                                @if($course->status == 'r')
                                                    <span class="label label-warning">준비</span>
                                                @elseif($course->status == 'p')
                                                    <span class="label label-success">진행</span>
                                                @else
                                                    <span class="label label-danger">완료</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $course->company->name }}
                                            </td>
                                            <td>
                                                {{ $course->name }}
                                            </td>
                                            <?php
                                                $days_array = ['월', '화', '수', '목', '금', '토', '일'];
                                                $running_days_array = array();
                                                foreach(explode(', ', $course->running_days) as $day) {
                                                    $running_days_array[] = $days_array[$day % 7];
                                                }
                                            ?>
                                            <td>
                                                {{ implode(', ', $running_days_array) }}
                                            </td>
                                            <td>
                                                {{ explode(' ', $course->start_datetime)[0] }}
                                            </td>
                                            <td>
                                                {{ explode(' ', $course->end_datetime)[0] }}
                                            </td>
                                            <td>
                                                {{ substr(explode(' ', $course->start_datetime)[1], 0, -3) }}
                                            </td>
                                            <td>
                                                {{ substr(explode(' ', $course->end_datetime)[1], 0, -3) }}
                                            </td>
                                            <td>
                                                {{ $course->location }}
                                            </td>
                                            <td>
                                                {{ $course->students()->count() }}
                                            </td>
                                            <td>
                                                TODO
                                            </td>
                                            <td>
                                                {{ $course->instructor->user->name_kor }}
                                            </td>
                                            <td class="text-right" style="width:90px">
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Copy row"><i class="fa fa-copy"></i></button>
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!--end .col-lg-12 -->
                        <!-- END HEADER XS BOX -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop