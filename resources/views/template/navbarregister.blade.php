<nav class="mainmenu-area-register mainmenu-area" data-spy="affix" data-offset-top="200">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/images/logobantuyuk.png')}}" alt="Error Load Image">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="primary_menu">
            <ul class="nav navbar-nav mainmenu">
                <li><a href="{{ url('/') }}" style="font-size: 15px;">Beranda</a></li>
                <li><a href="{{ url('/') }}" style="font-size: 15px;">Tentang</a></li>
                <li><a href="{{ url('/') }}" style="font-size: 15px;">Pengembang</a></li>
                <li><a href="{{ url('/') }}" style="font-size: 15px;">Pertanyaan</a></li>
                <li><a href="{{ url('/') }}" style="font-size: 15px;">Kontak</a></li>
                <li class="active"><a href="{{ route('login') }}" class="d-block d-md-none" style="font-size: 15px;">Masuk</a></li>
                <li><a href="{{ route('register') }}" class="d-block d-md-none" style="font-size: 15px;">Buat Akun</a></li>
            </ul>
            <div class="right-button hidden-xs">
                <a href="{{ route('login') }}" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;">Masuk</a>
                <a href="{{ route('register') }}" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;">Buat Akun</a>
            </div>
        </div>
    </div>
</nav>