@extends('instructor.layouts.master')

@section('additional_css_includes')
    <link rel="stylesheet" href="{{ asset('/css/theme-default/libs/jquery-timepicker/jquery.timepicker.css') }}"/>
@stop

@section('additional_js_includes')
    <script src="{{ asset('/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('/js/libs/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
    <script>
        (function(namespace, $) {
            "use strict";

            var FirstLogin = function() {
                // Create reference to this instance
                var o = this;
                // Initialize app when document is ready
                $(document).ready(function() {
                    o.initialize();
                });

            };
            var p = FirstLogin.prototype;

            // =========================================================================
            // INIT
            // =========================================================================

            p.initialize = function() {
                this._initEvents();
                this._initInputMask();
                this._initCKEditor();
                this._initTimepicker();
            };

            // =========================================================================
            // EVENTS
            // =========================================================================

            p._initEvents = function() {
                $('#certificate').on('click', function(e) {
                    window.open($(location).attr('origin') + '/firstLogin/Instructor/popups/certificate',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });
                $("input[name=other_certificate_name_1], input[name=other_certificate_detail_1]," +
                "input[name=other_certificate_name_2], input[name=other_certificate_detail_2]," +
                "input[name=other_certificate_name_3], input[name=other_certificate_detail_3]").on('click', function(e) {
                    window.open($(location).attr('origin') + '/firstLogin/Instructor/popups/otherCertificate',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });

                $("#curriculum").on('click', function(e) {
                    window.open($(location).attr('origin') + '/firstLogin/Instructor/popups/curriculum',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });

                $("#preferred_area").on('click', function(e) {
                    window.open($(location).attr('origin') + '/firstLogin/Instructor/popups/preferredArea',
                            'popup',
                            'width=800px, height=600px, left=0, top=0, resizeable=false');
                });


            };

            // =========================================================================
            // INPUTMASK
            // =========================================================================

            p._initInputMask = function() {
                $(":input").inputmask();
            };

            // =========================================================================
            // CKEDITOR
            // =========================================================================

            p._initCKEditor = function() {
                $('#ckeditor').ckeditor();
            };

            // =========================================================================
            // TIMEPICKER
            // =========================================================================

            p._initTimepicker = function() {
                $('.input-timepicker').timepicker({
                    'timeFormat': 'H:i'
                });
            }

            namespace.FirstLogin = new FirstLogin;
        }(this.boostbox, jQuery)); // pass in (namespace, jQuery):
    </script>
@stop

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li class="active">첫 로그인 페이지</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 환영합니다!</h3>
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
                            <header><h5 class="text-light">첫 로그인 페이지</h5></header>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['action' => 'Instructor\FirstLoginController@update',
                            'class' => 'form-horizontal form-validate',
                            'role' => 'form',
                            'files' => true]) !!}

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="password" class="control-label">비밀번호</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="password" id="password" required="" data-rule-minlength="6" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="password_confirmation">비밀번호 확인</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required="" data-rule-equalto="#password" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="name_eng">영문 이름</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name_eng" id="name_eng" required="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="name_chn">중문 이름</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name_chn" id="name_chn" required="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="phone_number">개인 연락처</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="phone_number" id="phone_number" required="" data-inputmask="'mask': '99999999999'" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="date_of_birth">생년월일</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="date_of_birth" placeholder="" data-inputmask="'mask': 'y-m-d'" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="bank_id">계좌 정보</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <select class="form-control" name="bank_id" id="bank_id" required>
                                            <option value="">선택하세요</option>
                                            @foreach(App\Bank::all() as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="bank_account_number" id="bank_account_number" required placeholder="계좌번호 (숫자만 입력해 주세요)"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="gender">성별</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="M" required> 남성
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="F" required> 여성
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="instructor_visa_type_id">국적</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select class="form-control" name="instructor_visa_type_id" id="instructor_visa_type_id" required>
                                            <option value="">선택하세요</option>
                                            @foreach(\App\InstructorVisaType::all() as $visa_type)
                                                <option value="{{ $visa_type->id }}">{{ $visa_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label" for="profile_image">프로필 이미지</label>
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::file('profile_image') !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="certificate">자격증</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input class="form-control" type="text" name="certificate" id="certificate" placeholder="" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="other_certificate_name_1">기타 자격증 (3개 등록 가능)</label>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-4">
                                        <input class="form-control" type="text" name="other_certificate_name_1" placeholder="" readonly/>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <input class="form-control" type="text" name="other_certificate_detail_1" placeholder="" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-4">
                                        <input class="form-control" type="text" name="other_certificate_name_2" placeholder="" readonly/>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <input class="form-control" type="text" name="other_certificate_detail_2" placeholder="" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-4">
                                        <input class="form-control" type="text" name="other_certificate_name_3" placeholder="" readonly/>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <input class="form-control" type="text" name="other_certificate_detail_3" placeholder="" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="academic_background_id">학력</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <select class="form-control" name="academic_background_id" id="academic_background_id" required>
                                            <option value="">선택하세요</option>
                                                @foreach(\App\AcademicBackground::all() as $academic_background)
                                                    <option value="{{ $academic_background->id }}">{{ $academic_background->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6">
                                        <input class="form-control" type="text" name="academic_background_detail", id="academic_background_id" required="" placeholder="학교명 : 서울대학교 (대졸 이하 '없음' 기입)"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="major" class="control-label">전공 과목</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" name="major" id="major" class="form-control" placeholder="상세히 기술해 주세요" value="" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="years_of_stay_in_china" class="control-label">중국 체류 기간</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select name="years_of_stay_in_china" id="years_of_stay_in_china" class="form-control" required="">
                                            <option value="">선택하세요 / 1년 이하 없음</option>
                                            <option value="0">없음</option>
                                            <option value="1">1년 이상</option>
                                            <option value="2">2년 이상</option>
                                            <option value="3">3년 이상</option>
                                            <option value="4">4년 이상</option>
                                            <option value="5">5년 이상</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_years" class="control-label">강의 경력 년수</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <select name="career_years" id="career_years" class="form-control" required="">
                                            <option value="">선택하세요</option>
                                            <option value="0">없음</option>
                                            <option value="1">1년 이상</option>
                                            <option value="2">2년 이상</option>
                                            <option value="3">3년 이상</option>
                                            <option value="4">4년 이상</option>
                                            <option value="5">5년 이상</option>
                                            <option value="6">6년 이상</option>
                                            <option value="7">7년 이상</option>
                                            <option value="8">8년 이상</option>
                                            <option value="9">9년 이상</option>
                                            <option value="10">10년 이상</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="curriculum">특화 분야</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" class="form-control" name="curriculum" id="curriculum" readonly required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="preferred_area">선호 지역</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input type="text" class="form-control" name="preferred_area" id="preferred_area" readonly required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="available_morning_from">강의 가능 시간 (오전)</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" class="form-control input-timepicker" name="available_morning_from" id="available_morning_from" data-min-time="06:00" data-max-time="12:00"/>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" class="form-control input-timepicker" name="available_morning_to" id="available_morning_to" data-min-time="06:00" data-max-time="12:00"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="available_afternoon_from">강의 가능 시간 (오후)</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" class="form-control input-timepicker" name="available_afternoon_from" id="available_afternoon_from" data-min-time="12:00" data-max-time="18:00"/>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" class="form-control input-timepicker" name="available_afternoon_to" id="available_afternoon_to" data-min-time="12:00" data-max-time="18:00"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label class="control-label" for="available_night_from">강의 가능 시간 (심야)</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" class="form-control input-timepicker" name="available_night_from" id="available_night_from" data-min-time="18:00" data-max-time="00:00"/>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-3">
                                        <input type="text" class="form-control input-timepicker" name="available_night_to" id="available_night_to" data-min-time="18:00" data-max-time="00:00"/>
                                    </div>
                                </div>

                                <div class="form-group text-center style-warning">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="" class="control-label" style="color: black; font-weight: bolder;">강의 경력 사항 (옵션 : 없으면 입력하지 마세요)</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_1_company_name" class="control-label" style="padding-bottom: 7px;">경력 #1</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_1_company_name" id="career_detail_1_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_1_type" id="career_detail_1_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_1_description" id="career_detail_1_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_1_period" id="career_detail_1_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_2_company_name" class="control-label" style="padding-bottom: 7px;">경력 #2</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_2_company_name" id="career_detail_2_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_2_type" id="career_detail_2_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_2_description" id="career_detail_2_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_2_period" id="career_detail_2_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control" data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_3_company_name" class="control-label" style="padding-bottom: 7px;">경력 #3</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_3_company_name" id="career_detail_3_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_3_type" id="career_detail_3_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_3_description" id="career_detail_3_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_3_period" id="career_detail_3_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_4_company_name" class="control-label" style="padding-bottom: 7px;">경력 #4</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_4_company_name" id="career_detail_4_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_4_type" id="career_detail_4_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_4_description" id="career_detail_4_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_4_period" id="career_detail_4_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_5_company_name" class="control-label" style="padding-bottom: 7px;">경력 #5</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_5_company_name" id="career_detail_5_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_5_type" id="career_detail_5_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_5_description" id="career_detail_5_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_5_period" id="career_detail_5_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_6_company_name" class="control-label" style="padding-bottom: 7px;">경력 #6</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_6_company_name" id="career_detail_6_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_6_type" id="career_detail_6_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_6_description" id="career_detail_6_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_6_period" id="career_detail_6_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_7_company_name" class="control-label" style="padding-bottom: 7px;">경력 #7</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_7_company_name" id="career_detail_7_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_7_type" id="career_detail_7_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_7_description" id="career_detail_7_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_7_period" id="career_detail_7_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_8_company_name" class="control-label" style="padding-bottom: 7px;">경력 #8</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_8_company_name" id="career_detail_8_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_8_type" id="career_detail_8_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_8_description" id="career_detail_8_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_8_period" id="career_detail_8_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_9_company_name" class="control-label" style="padding-bottom: 7px;">경력 #9</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_9_company_name" id="career_detail_9_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_9_type" id="career_detail_9_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_9_description" id="career_detail_9_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_9_period" id="career_detail_9_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="career_detail_10_company_name" class="control-label" style="padding-bottom: 7px;">경력 #10</label>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <input name="career_detail_10_company_name" id="career_detail_10_company_name" type="text" placeholder="근무처 : 예) 삼성전자" class="form-control">
                                        <input name="career_detail_10_type" id="career_detail_10_type" type="text" placeholder="교육 형태 : 예) 이그제큐티브 교육, 그룹 교육" class="form-control">
                                        <input name="career_detail_10_description" id="career_detail_10_description" type="text" placeholder="교육 내용 : 예) 삼성전자 사장님 교육" class="form-control">
                                        <input name="career_detail_10_period" id="career_detail_10_period" type="text" placeholder="교육 기간 : 예) 2014-05-16 ~ 2014-07-15" class="form-control"  data-inputmask="'mask': 'y-m-d ~ y-m-d'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <label for="resume" class="control-label">자기소개서</label>
                                    </div>
                                    <div class="col-lg-9 col-md-10 col-sm-9">
                                        <textarea id="ckeditor" name="resume" class="form-control control-12-rows" placeholder="Enter text ..."></textarea>
                                    </div>
                                </div>

                                <div class="form-footer text-right">
                                    <button type="submit" type="button" class="btn btn-primary">양식 전송하기</button>
                                </div>

                            {!! Form::close() !!}
                        </div><!--end .col-lg-3 -->
                        <!-- END HEADER XS BOX -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop