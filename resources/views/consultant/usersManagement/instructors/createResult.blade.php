@extends('consultant.layouts.master')

@section('main_content')
    <section>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('index') }}">메인 페이지</a></li>
            <li><a href="{{ URL::to('Consultant/usersManagement/index') }}">사용자 관리</a></li>
            <li class="active">교수진 관리</li>
        </ol>
        <div class="section-header">
            <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> 교수진 등록 결과</h3>
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
                            <header><h5 class="text-light"> <strong>교수진</strong> 등록 결과</h5></header>
                            <div class="tools">
                                <div class="btn-group btn-group-transparent">
                                    <a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    <a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-condensed table-hover no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>이름</th>
                                        <th>이메일</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($result_array as $key => $result)
                                        <?php $instructor = \App\Instructor::find($key); ?>
                                        <tr @if($result) class="success" @else class="danger" @endif>
                                            <td>{{ $count }}</td>
                                            <td>{{ $instructor->user->name_kor }}</td>
                                            <td>{{ $instructor->user->email }}</td>
                                        </tr>
                                        <?php $count++; ?>
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