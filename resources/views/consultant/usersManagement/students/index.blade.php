@extends('consultant.layouts.master')

@section('additional_css_includes')
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/jquery.dataTables.css?'.strtotime('now')) }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/theme-default/libs/DataTables/TableTools.css?'.strtotime('now')) }}" />
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/ColVis/js/ColVis.min.js') }}"></script>
    <script src="{{ asset('/js/libs/DataTables/extras/TableTools/media/js/TableTools.min.js') }}"></script>
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <script src="//cdn.poesis.kr/post/popup.min.js"></script>
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
                this._initPostCodify();
                this._initInputMask();
                this._enableEvents();
                this._initButtonStates();
                this._initDataTables();
            };

            // =========================================================================
            // POSTCODIFY
            // =========================================================================

            p._initPostCodify = function() {
                $("#postcodify_search_button").postcodifyPopUp();
                $("input[name='postcode_1']").postcodifyPopUp();
                $("input[name='postcode_2']").postcodifyPopUp();
                $("#address_1").postcodifyPopUp();
            };

            // =========================================================================
            // INPUTMASK
            // =========================================================================

            p._initInputMask = function() {
                $(":input").inputmask();
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
                var number_of_students = Number($("input[name='number_of_students']").val());
                number_of_students++;
                $("input[name='number_of_students").val(number_of_students);
                var row = "<div class='form-group'><div class='col-lg-3 col-md-2 col-sm-3'><label for='name_kor_"+number_of_students+"' class='control-label'>학생 이름 "+number_of_students+"</label></div><div class='col-lg-9 col-md-10 col-sm-9'><input type='text' name='name_kor_"+number_of_students+"' id='name_kor_"+number_of_students+"' class='form-control' placeholder='학생 이름 "+number_of_students+"' data-rule-minlength='2' required=''></div></div><div class='form-group'><div class='col-lg-3 col-md-2 col-sm-3'><label for='email_"+number_of_students+"' class='control-label'>학생 이메일 "+number_of_students+"</label></div><div class='col-lg-9 col-md-10 col-sm-9'><input type='email' name='email_"+number_of_students+"' id='email_"+number_of_students+"' class='form-control' placeholder='학생 이메일 "+number_of_students+"' required=''></div></div>";
                $("#last_line").before(row);
            };

            p._handleStudentRemove = function(e) {
                var number_of_students = Number($("input[name='number_of_students']").val());
                if(number_of_students == 1) {
                    return false;
                }
                number_of_students--;
                $("input[name='number_of_students").val(number_of_students);
                $(".form-group").last().remove();
                $(".form-group").last().remove();
            };

            // =========================================================================
            // BUTTON STATES (LOADING)
            // =========================================================================

            p._initButtonStates = function() {
                $('.btn-loading-state').click(function() {
                    var btn = $(this);
                    btn.button('loading');
                    setTimeout(function() {
                        btn.button('reset');
                    }, 3000);
                });
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

            // =========================================================================
            namespace.Index = new Index;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Consultant/usersManagement/index') }}">사용자 관리</a></li>
            <li class="active">학생 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 학생 전체보기</h3>
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
                            <header><h5 class="text-light"> <strong>학생</strong> 목록</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-dynamic">
                                <thead>
                                    <tr>
                                        <th>이름</th>
                                        <th>직급</th>
                                        <th>부서</th>
                                        <th>고객사</th>
                                        <th>이메일</th>
                                        <th>연락처</th>
                                        <th>진행중 과정</th>
                                        <th class="text-right" style="width:90px">보기</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->user->name_kor }}</td>
                                            <td>{{ $student->position }}</td>
                                            <td>{{ $student->deputy }}</td>
                                            <td>{{ $student->company->name }}</td>
                                            <td><a href="mailto:{{ $student->user->email }}">{{ $student->user->email }}</a></td>
                                            <td>{{ $student->user->phone_number }}</td>
                                            <td>TODO</td>
                                            <td class="text-right" style="width:90px">
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Copy row"><i class="fa fa-copy"></i></button>
                                                <button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end .col-lg-3 -->
                <!-- END HEADER XS BOX -->
            </div>
        </div>
    </section>
@stop
