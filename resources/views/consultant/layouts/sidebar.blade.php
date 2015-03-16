<div class="sidebar-back"></div>
<div class="sidebar-content">
    <div class="nav-brand">
        <a class="main-brand" href="{{ URL::to('Consultant/index') }}">
            <h1 class="text-light text-white text-left" style="margin-left: 65px;">
                <i id="icon-thecorp_svg" class="icon-thecorp_svg" style="font-size: 60px;"></i>
                <span style="position: absolute; font-size: 15px; margin-left: 3px;"><strong>The</strong></span>
                <span style="position: absolute; font-size: 15px; margin-left: 3px; margin-top: 16px;"><strong>Mandarin</strong></span>
                <span style="position: absolute; font-size: 15px; margin-left: 3px; margin-top: 32px;"><strong>Integration</strong></span>
                <span style="position: absolute; font-size: 15px; margin-left: 3px; margin-top: 48px;"><strong>Platform</strong></span>
            </h1>
        </a>
    </div>
    <ul class="main-menu">
        <?php
        $current_url = Request::url();
        ?>
        <li @if(strpos($current_url, 'coursesManagement')) class = "active expanded" @endif>
            <a href="javascript:void(0);">
                <i class="fa fa-file fa-fw"></i><span class="title">클래스 관리</span> <span class="expand-sign">+</span>
            </a>
            <ul>
                <li><a href="{{ URL::to('Consultant/coursesManagement/index') }}"
                    @if(strpos($current_url, 'coursesManagement/index')) class = "active" @endif>전체 보기</a></li>
                <li><a href="{{ URL::to('Consultant/coursesManagement/preCourses') }}"
                    @if(strpos($current_url, 'coursesManagement/preCourses')) class = "active" @endif>Pre 클래스 관리</a></li>
                <li><a href="{{ URL::to('Consultant/coursesManagement/newCourseRequests') }}"
                    @if(strpos($current_url, 'coursesManagement/newCourseRequests')) class = "active" @endif>신규 클래스 요청현황</a></li>
            </ul>
        </li>

        <li @if(strpos($current_url, 'usersManagement')) class = "active expanded" @endif>
            <a href="javascript:void(0);">
                <i class="fa fa-file fa-fw"></i><span class="title">사용자 관리</span> <span class="expand-sign">+</span>
            </a>
            <ul>
                <li><a href="{{ URL::to('Consultant/usersManagement/index') }}"
                    @if(strpos($current_url, 'usersManagement/index')) class = "active" @endif>사용자 전체보기</a></li>

                <li @if(strpos($current_url, 'students')) class = "active expanded" @endif>
                    <a href="javascript:void(0);">
                        <span class="expand-sign">+</span> <span class="title">학생 관리</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ URL::to('Consultant/usersManagement/students/index') }}"
                            @if(strpos($current_url, 'usersManagement/students/index')) class = "active" @endif>학생 전체보기</a></li>
                        <li><a href="{{ URL::to('Consultant/usersManagement/students/register') }}"
                            @if(strpos($current_url, 'usersManagement/students/register')) class = "active" @endif>학생 등록</a></li>
                    </ul>
                    <!--end /submenu -->
                </li>

                <li @if(strpos($current_url, 'instructors')) class = "active expanded" @endif>
                    <a href="javascript:void(0);">
                        <span class="expand-sign">+</span> <span class="title">교수진 관리</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ URL::to('Consultant/usersManagement/instructors/index') }}"
                            @if(strpos($current_url, 'usersManagement/instructors/index')) class = "active" @endif>교수진 전체보기</a></li>
                        <li><a href="{{ URL::to('Consultant/usersManagement/instructors/register') }}"
                            @if(strpos($current_url, 'usersManagement/instructors/register')) class = "active" @endif>교수진 등록</a></li>
                    </ul>
                    <!--end /submenu -->
                </li>

                <li @if(strpos($current_url, 'hrs')) class = "active expanded" @endif>
                    <a href="javascript:void(0);">
                        <span class="expand-sign">+</span> <span class="title">인사담당자 관리</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ URL::to('Consultant/usersManagement/hrs/index') }}"
                            @if(strpos($current_url, 'usersManagement/hrs/index')) class = "active" @endif>인사담당자 전체보기</a></li>
                        <li><a href="{{ URL::to('Consultant/usersManagement/hrs/register') }}"
                            @if(strpos($current_url, 'usersManagement/hrs/register')) class = "active" @endif>인사담당자 등록</a></li>
                    </ul>
                    <!--end /submenu -->
                </li>

                <li @if(strpos($current_url, 'consultants')) class = "active expanded" @endif>
                    <a href="javascript:void(0);">
                        <span class="expand-sign">+</span> <span class="title">컨설턴트 관리</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ URL::to('Consultant/usersManagement/consultants/index') }}"
                            @if(strpos($current_url, 'usersManagement/consultants/index')) class = "active" @endif>컨설턴트 전체보기</a></li>
                        <li><a href="{{ URL::to('Consultant/usersManagement/consultants/register') }}"
                            @if(strpos($current_url, 'usersManagement/consultants/register')) class = "active" @endif>컨설턴트 등록</a></li>
                    </ul>
                    <!--end /submenu -->
                </li>
            </ul>
        </li>

        <li @if(strpos($current_url, 'companiesManagement')) class = "active expanded" @endif>
            <a href="{{ URL::to('Consultant/companiesManagement/index') }}"
                @if(strpos($current_url, 'companiesManagement/index')) class = "active" @endif>
                <i class="fa fa-home fa-fw"></i><span class="title">고객사 관리</span>
            </a>
        </li>
    </ul>
</div>