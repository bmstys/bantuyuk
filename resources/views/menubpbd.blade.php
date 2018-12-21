@extends('template.utamabpbd')

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
              <div class="card-body" style="padding:20px;">
                <div class="footer-box">
                    <div class="box-icon" style="width:80px;padding-top:13px;padding-left:4px;margin-bottom: 0px;">
                        <i class="fa fa-edit" style="font-size: 50px;"></i>
                    </div>
                </div>
                <p class="card-title">Update Bencana</p>
                <p class="card-text">Update bencana terbaru disini.</p>
                <a href="{{ url('/bencana') }}">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;width: 150px;">Pilih</button>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
              <div class="card-body" style="padding:20px;">
                <div class="footer-box">
                    <div class="box-icon" style="width:80px;padding-top:9px;margin-bottom: 0px;">
                        <i class="fa fa-handshake-o" style="font-size: 45px;"></i>
                    </div>
                </div>
                <p class="card-title">Realisasikan</p>
                <p class="card-text">Realisasikan bantuan dari donatur disini.</p>
                <a href="{{ url('/realisasi') }}">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;width: 150px;">Pilih</button>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
              <div class="card-body" style="padding:20px;">
                <div class="footer-box">
                    <div class="box-icon" style="width:80px;padding-top:9px;padding-left:1px;margin-bottom: 0px;">
                        <i class="fa fa-list-alt" style="font-size: 40px;"></i>
                    </div>
                </div>
                <p class="card-title">Donasi Masuk</p>
                <p class="card-text">Lihat daftar donasi masuk disini.</p>
                <a href="{{ url('/donasimasuk') }}">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;width: 150px;">Pilih</button>
                </a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection