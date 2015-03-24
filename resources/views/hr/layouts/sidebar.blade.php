<div class="sidebar-back"></div>
<div class="sidebar-content">
    <div class="nav-brand">
        <a class="main-brand" href="{{ URL::to('Hr/index') }}">
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
                <li><a href="{{ URL::to('Hr/coursesManagement/index') }}"
                    @if(strpos($current_url, 'coursesManagement/index')) class = "active" @endif>전체 보기</a></li>

                <li @if(strpos($current_url, 'newCourses')) class = "active expanded" @endif>
                    <a href="javascript:void(0);">
                        <span class="expand-sign">+</span> <span class="title">신규 클래스 관리</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ URL::to('Hr/coursesManagement/newCourses/index') }}"
                            @if(strpos($current_url, 'coursesManagement/newCourses/index')) class = "active" @endif>신규 클래스 전체보기</a></li>
                        <li><a href="{{ URL::to('Hr/coursesManagement/newCourses/register') }}"
                            @if(strpos($current_url, 'coursesManagement/newCourses/register')) class = "active" @endif>신규 클래스 등록</a></li>
                    </ul>
                    <!--end /submenu -->
                </li>

            </ul>
        </li>
    </ul>
</div>