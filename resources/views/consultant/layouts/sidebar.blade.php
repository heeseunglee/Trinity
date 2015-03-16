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
            </ul>
        </li>
    </ul>
</div>