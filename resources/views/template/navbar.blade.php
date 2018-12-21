@guest
<nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
@else
<nav class="mainmenu-area-auth mainmenu-area" data-spy="affix" data-offset-top="200">
@endguest
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @guest
            <a class="navbar-brand" href="{{ url('/') }}">
            @else
            <a class="navbar-brand" href="{{ url('/home') }}">
            @endguest
                <img src="{{asset('images/logobantuyuk.png')}}" alt="Error Load Image">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="primary_menu">
            <ul class="nav navbar-nav mainmenu">
                @guest
                <li class="active"><a href="#home_page" style="font-size: 15px;">Beranda</a></li>
                <li><a href="#about_page" style="font-size: 15px;">Tentang</a></li>
                <li><a href="#testimonial_page" style="font-size: 15px;">Pengembang</a></li>
                <li><a href="#questions_page" style="font-size: 15px;">Pertanyaan</a></li>
                <li><a href="#contact_page" style="font-size: 15px;">Kontak</a></li>
                <li><a href="{{ route('login') }}" class="d-block d-md-none" style="font-size: 15px;">Masuk</a></li>
                <li><a href="{{ route('register') }}" class="d-block d-md-none" style="font-size: 15px;">Buat Akun</a></li>
                @else
                <li class="active"><a href="{{ url('/home') }}" style="font-size: 15px;">Beranda</a></li>
                <li><a href="#" style="font-size: 15px;">Donasi</a></li>
                <li><a href="#" style="font-size: 15px;">Riwayat</a></li>
                <li><a href="#" style="font-size: 15px;">Tentang</a></li>
                <li><a href="#" class="d-block d-md-none" style="font-size: 15px;">Profil</a></li>
                <li>
                    <a href="{{ route('logout') }}" class="d-block d-md-none" style="font-size: 15px;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
            <div class="right-button hidden-xs">
                @guest
                <a href="{{ route('login') }}" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;font-size: 12px;">Masuk</a>
                <a href="{{ route('register') }}" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;font-size: 12px;">Buat Akun</a>
                @else
                <a href="#" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;font-size: 12px;">Profil</a>
                <a href="{{ route('logout') }}" style="padding-right: 15px;padding-left: 15px;padding-bottom: 5px;padding-top: 5px;font-size: 12px;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
    </div>
</nav>