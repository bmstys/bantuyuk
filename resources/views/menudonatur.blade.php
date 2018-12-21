@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleMenuDonatur.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 125px;min-height: 720px;background-color: #F5F6FF;z-index: 0;">
    <div class="row justify-content-center">
        <h3 style="color: black;margin-bottom: 40px;color: #AB8DAA;">Menu Utama</h3>
    </div>
    <div class="row" style="margin-right: 40px;margin-left: 40px;">
        <div class="col-sm-4">
            <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
              <div class="card-body" style="padding:0px;">
                <div class="footer-box">
                    <div class="box-icon" style="width:80px;padding-top:5px;margin-bottom: 0px;">
                        <i class="fa fa-user" style="font-size: 60px;"></i>
                    </div>
                </div>
                <p class="card-title">Profil</p>
                <p class="card-text">Demi keamanan akun Anda, silahkan perbarui profil dan password Anda disini.</p>
                <a href="{{ url('/profil') }}">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;">Pilih</button>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
              <div class="card-body" style="padding:0px;">
                <div class="footer-box">
                    <div class="box-icon" style="width:80px;padding-top:7px;margin-bottom: 0px;">
                        <i class="fa fa-gift" style="font-size: 60px;"></i>
                    </div>
                </div>
                <p class="card-title">BantuYuk!</p>
                <p class="card-text">Berikan donasi dan bantuan Anda dengan mudah & cepat disini.</p>
                <a href="{{ url('/donasi') }}">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;">Pilih</button>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
              <div class="card-body" style="padding:0px;">
                <div class="footer-box">
                    <div class="box-icon" style="width:80px;padding-top:12px;margin-bottom: 0px;">
                        <i class="fa fa-history" style="font-size: 55px;"></i>
                    </div>
                </div>
                <p class="card-title">Riwayat</p>
                <p class="card-text">Pantau jejak donasi dan dapatkan informasi riwayat donasi Anda disini.</p>
                <a href="{{ url('/riwayat') }}">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;">Pilih</button>
                </a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection