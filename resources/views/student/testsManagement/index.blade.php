@extends('student.layouts.master')

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

            namespace.Index = new Index;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li class="active">테스트 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 테스트 전체보기</h3>
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
                            <header><h5 class="text-light">진행중 테스트</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-vertical-align-middle table-dynamic">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>시험명</th>
                                        <th>시험 가능기간</th>
                                        <th>듣기 테스트</th>
                                        <th>객관식 테스트</th>
                                        <th>필기 테스트</th>
                                        <th>말하기 테스트</th>
                                        <th style="width: 90px;">작업</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($in_progress_tests as $test)
                                        <tr>
                                            <td><span class="label label-success">진행중</span></td>
                                            <td>
                                                {{ $test->course->name }} 레벨 테스트
                                            </td>
                                            <td>
                                                {{ $test->start_date }} ~ {{ $test->end_date }}
                                            </td>
                                            <td>
                                                NA
                                            </td>
                                            <td>
                                                <?php
                                                    $mc_status = $test->lvlTestMc->status;
                                                ?>
                                                @if($mc_status == 'r')
                                                    <span class="label label-default">준비</span>
                                                @elseif($mc_status == 'p')
                                                    <span class="label label-success">진행중</span>
                                                @elseif($mc_status == 'pa')
                                                    <span class="label label-warning">일시정지</span>
                                                @elseif($mc_status == 'c')
                                                    <span class="label label-danger">완료</span>
                                                @endif
                                            </td>
                                            <td>
                                                NA
                                            </td>
                                            <td>
                                                NA
                                            </td>
                                            <td>
                                                <?php
                                                    $encrypted_test_id = \Crypt::encrypt($test->id);
                                                ?>
                                                <a type="button"
                                                   href="{{ URL::to('Student/testsManagement/participate/'.$encrypted_test_id) }}"
                                                   id="{{ $encrypted_test_id }}"
                                                   class="btn btn-xs btn-success btn-equal participate"
                                                   data-toggle="tooltip"
                                                   data-placement="테스트 참여">
                                                    <i class="fa fa-pencil"></i>
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

            <div class="row">
                <!-- START HEADER XS BOX -->
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head box-head-xs style-primary">
                            <header><h5 class="text-light">대기중 테스트</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-vertical-align-middle table-dynamic">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>시험명</th>
                                        <th>시험 가능기간</th>
                                        <th>시험 시간</th>
                                        <th>문항수</th>
                                        <th>레벨</th>
                                        <th>진행도</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($waiting_tests as $test)
                                        <tr>
                                            <td><span class="label label-warning">대기</span></td>
                                            <td>
                                                {{ $test->course->name }} 레벨 테스트
                                            </td>
                                            <td>
                                                TODO
                                            </td>
                                            <td>
                                                TODO
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="progress no-margin">
                                                    <div class="progress-bar progress-bar-warning" style="width: 100%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
                            <header><h5 class="text-light">완료 테스트</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover table-vertical-align-middle table-dynamic">
                                <thead>
                                    <tr>
                                        <th>상태</th>
                                        <th>시험명</th>
                                        <th>시험 가능기간</th>
                                        <th>시험 시간</th>
                                        <th>문항수</th>
                                        <th>레벨</th>
                                        <th>진행도</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($completed_tests as $test)
                                        <tr>
                                            <td><span class="label label-danger">완료</span></td>
                                            <td>
                                                {{ $test->course->name }} 레벨 테스트
                                            </td>
                                            <td>
                                                TODO
                                            </td>
                                            <td>
                                                TODO
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="progress no-margin">
                                                    <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                                                </div>
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