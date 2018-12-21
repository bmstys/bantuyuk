@extends('template.utama')

@section('content')
<!-- Home-Area -->
<header class="home-area overlay" id="home_page">
    <div class="container" style="height: 562px;">
        <div class="row">
            <div class="col-xs-12 col-md-7">
                <div class="space-80 hidden-xs"></div>
                <h1 class="wow fadeInUp" data-wow-delay="0.4s">Peduli sesama</h1>
                <div class="space-20"></div>
                <div class="desc wow fadeInUp" data-wow-delay="0.6s" style="font-size: 27px;">
                    <p>Yuk salurkan bantuan anda sebagai tali kasih sesama manusia</p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Home-Area-End -->

<!-- About-Area -->
<section class="section-padding" id="about_page" style="padding-top:250px;padding-bottom: 250px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="page-title text-center">
                    <h5 class="title" style="font-size: 25px;" ;>Apa itu "BantuYuk!" ?</h5>
                    <div class="space-20"></div>
                    <img src="{{asset('/images/logobantuyuk.png')}}" alt="About Logo" style="width: 100px;margin-bottom: 10px;">
                    <div class="space-30"></div>
                    <h3 class="blue-color" style="color: #AB8DAA; font-size: 20px;">BantuYuk! adalah sebuah layanan satu pintu yang membantu penyaluran donasi dan bantuan untuk bencana-bencana yang terjadi diseluruh pelosok Indonesia. Dapatkan kabar kebutuhan terkini dari suatu bencana yang terjadi di Indonesia dan layanan ini siap membantu menyalurkan bantuan Anda.</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About-Area-End -->

<!-- Testimonial-Area -->
<section class="download-area testimonial-area overlay" id="testimonial_page" style="padding-top:150px;padding-bottom: 150px; margin-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title text-center">
                    <h5 class="title" style="color: white; font-size: 25px;">Team Member Im Possible</h5>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="team-slide">
                    <div class="team-box">
                        <div class="team-image">
                            <img src="{{asset('/images/niky.jpg')}}" alt="">
                        </div>
                        <h4 style="color: white;">Niky Ayu Lestari</h4>
                        <h6 class="position">16523232</h6>
                        <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                    </div>
                    <div class="team-box">
                        <div class="team-image">
                            <img src="{{asset('images/Bama.jpg')}}" alt=""> 
                        </div>
                        <h4 style="color: white;">Bamasatya Hendraprasta</h4>
                        <h6 class="position">16523177</h6>
                        <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                    </div>
                    <div class="team-box">
                        <div class="team-image">
                            <img src="{{asset('/images/Dana.jpg')}}" alt="">
                        </div>
                        <h4 style="color: white;">Nurdana Ahmad Fadil</h4>
                        <h6 class="position">16523172</h6>
                        <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                    </div>
                    <div class="team-box">
                        <div class="team-image">
                            <img src="{{asset('/images/Rasyid.jpg')}}" alt="">
                        </div>
                        <h4 style="color: white;">Muhammad Rasyid Shadiq</h4>
                        <h6 class="position">16523183</h6>
                        <p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial-Area-End -->

<!--Questions-Area -->
<section id="questions_page" class="questions-area section-padding" style="padding-top: 120px;padding-bottom: 120px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title text-center">
                    <h5 class="title" style="font-size: 25px;">Pertanyaan Yang Sering Muncul</h5>
                    <div class="space-30"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="toggole-boxs">

                    <h3>Siapa saja yang bisa menjadi donatur di bantuyuk.com?</h3>
                    <div>
                        <p>Semua orang berbagai kalangan bisa menjadi donatur.</p>
                    </div>

                    <h3>Siapa saja yang berhak memberikan bantuan di bantuyuk.com?</h3>
                    <div>
                        <p>Semua orang berhak memberikan bantuan sebagai rasa empati kepada sesama.</p>
                    </div>
                    
                    <h3>Siapa pengelola website bantuyuk.com?</h3>
                    <div>
                        <p>Website bantuyuk.com secara resmi di kelola oleh pihak Badan Penanggulangan Bencana Daerah.</p>
                    </div>

                    <h3>Apakah donatur dapat melihat trakcing dari donasi yang diberikan?</h3>
                    <div>
                        <p>Tentu saja dapat, karna trasnparansi bagi kami adalah hal yang utama.</p>
                    </div>

                    <h3>Bantuan seperti apa yang di terima oleh bantuyuk.com?</h3>
                    <div>
                        <p>BantuYuk! menerima bantuan berupa uang</p>
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="space-20 hidden visible-xs"></div>
                <div class="toggole-boxs">

                    <h3>Apakah bantuyuk.com aman dan dapat diercaya?</h3>
                    <div>
                        <p>BantuYuk! aman dan dapat dipercaya dengan surat legal dan izin dari pihak berwenang sehingga donatur tidak perlu khawatir dengan penipuan.</p>
                    </div>

                    <h3>Bagaimana cara menjadi donatur di bantuyuk.com?</h3>
                    <div>
                        <p>Dengan registrasi akun dengan mengisikan data diri Valid lalu anda sudah bisa menjadi donatur dengan memilih fitur 'Donasi'.</p>
                    </div>

                    <h3>Apakah bantuyuk.com legal dan mendapat izin dari pihak berwenang untuk menggalang dana?</h3>
                    <div>
                        <p>BantuYuk! legal dan telah mendapatkan izin dari Penggalangan Uang Barang (PUB) dari Kemensos dengan SK Menteri No 123/ABC-AB/2018.</p>
                    </div>
                    
                    <h3>Lalu bagaimana saya bisa memberikan donasi berupa barang?</h3>
                    <div>
                        <p>Tidak perlu khawatir, bantuyuk.com hadir dengan fitur yang memudahkan donatur untuk memberikan bantuan berupa barang. Donatur hanya perlu memilih fitur donasi berupa barang yang kemudian donatur dapat membeli barang barang melalui website kami.</p>
                    </div>

                    <h3>Barang barang yang ada di bantuyuk.com apakah sudah sesuai dengan kebutuhan para pengungsi?</h3>
                    <div>
                        <p>Barang yang ada di bantuyuk.com sudah melalui suatu proses filtering berdasarkan prioritas yang dibutuhkan oleh korban bencana, sehingga donatur langsung disuguhkan dengan barang barang yang urgensi nya tinggi bagi korban bencana.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Questions-Area-End -->

<!-- Footer-Contact-Area -->
<footer class="footer-area" id="contact_page" style="padding-top: 20px;padding-bottom: 0px;">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title" style="font-size: 25px;">Kontak Kami</h5>
                        <h3 class="dark-color" style="font-size: 20px;">Kontak kami melalui detail di bawah ini</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 mb-md-5">
                    <div class="footer-box">
                        <div class="box-icon">
                            <!-- <span class="lnr lnr-map-marker"></span> -->
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p>@bantuyuk_id</p>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-sm-4 mb-md-5">
                    <div class="footer-box">
                        <div class="box-icon">
                            <!-- <span class="lnr lnr-phone-handset"></span> -->
                            <i class="fa fa-facebook"></i>
                        </div>
                        <p>BantuYuk!ID</p>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-sm-4 mb-md-5">
                    <div class="footer-box">
                        <div class="box-icon">
                            <!-- <span class="lnr lnr-envelope"></span> -->
                            <i class="fa fa-instagram"></i>
                        </div>
                        <p>@bantuyuk_id</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <p>bantuyuk_id@gmail.com</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <!-- <span class="lnr lnr-envelope"></span> -->
                            <i class="fa fa-phone"></i>
                        </div>
                        <p>(0274) 123456 <br> 08123456789</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <p>Jalan Kaliurang km 14,5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Contact-Area-End -->
@endsection