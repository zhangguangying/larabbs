<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="{{ url('/') }}" class="navbar-brand">
                LaraBBS
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{ route('login') }}">登陆</a></li>
                <li><a href="{{ route('register') }}">注册</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="user-avatar pull-left" style="margin-right: 8px; margin-top: -5px;">
                            <img src="{{ Auth::user()->avatar }}" width="30px" height="30xp" alt="" class="img-responsive img-circle">
                        </span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a href="{{ route('users.edit', Auth::id()) }}">编辑资料</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">退出登录</a>

                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</div>