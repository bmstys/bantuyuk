<nav class="mainmenu-area-register mainmenu-area" data-spy="affix" data-offset-top="200">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/menubpbd') }}">
                <img src="{{asset('/images/logobantuyuk.png')}}" alt="Error Load Image">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="primary_menu">
            <ul class="nav navbar-nav mainmenu">
                <li class="{{ Request::is('menubpbd') ? ' active' : ''}}">
                    <a href="{{ url('/menubpbd') }}" style="font-size: 15px;">Menu Utama</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="d-block d-md-none" style="font-size: 15px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <div class="right-button hidden-xs">
                <a href="{{ route('logout') }}" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>