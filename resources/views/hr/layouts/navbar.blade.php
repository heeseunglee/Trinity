<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        {{-- Mobile navigation items --}}
    </div>
    <div class="collapse navbar-collapse" id="header-navbar-collapse">
        <ul class="nav navbar-nav">
            {{-- Left aligned navigation items --}}
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="javascript:void(0);" class="navbar-profile dropdown-toggle text-bold" data-toggle="dropdown">
                    <?php
                        $current_user = Auth::user();
                    ?>
                    {{ $current_user->name_kor }}
                    <i class="fa fa-fw fa-angle-down"></i>
                    {{--{{ HTML::image('user/profileImage/small/'.$current_user->id,--}}
                                    {{--'',--}}
                                    {{--array('class' => 'img-circle')) }}--}}
                </a>
                <ul class="dropdown-menu animation-slide">
                    <li class="dropdown-header">프로필 영역</li>
                    <li><a href="{{ URL::to('auth/logout') }}">로그 아웃</a></li>
                </ul><!--end .dropdown-menu -->
            </li>
        </ul>
    </div>
</nav>