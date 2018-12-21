@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleMenuJenis.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 125px;min-height: 720px;background-color: #F5F6FF;z-index: 0;">
    <div class="row justify-content-center">
        <h3 style="color: black;margin-bottom: 40px;color: #AB8DAA;">Pilih Jenis Donasi</h3>
    </div>
    
    @foreach ($dataBencanas as $bencana)
    <div class="container">
        <div class="row" style="margin-right: 40px;margin-left: 40px;">
            <div class="col-sm-6">
                <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
                  <div class="card-body" style="padding:0px;">
                    <div class="footer-box">
                        <div class="box-icon" style="width:80px;padding-top:10px;margin-bottom: 0px;">
                            <i class="fa fa-dollar" style="font-size: 50px;"></i>
                        </div>
                    </div>
                    <p class="card-title" style="margin-bottom: 10px;">Uang</p>
                    <p class="card-text">Donasi berupa uang dengan nominal angka yang Anda inginkan.</p>
                    <a href="{{ url('/donasi/jenis/uang/'.$bencana->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;">Pilih</button>
                    </a>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="menu-utama card text-center bg-light mb-3 rounded" style="width: 100%;min-height: 300px;padding:30px;background-color: #FCFCFC;margin-bottom: 0px;">
                  <div class="card-body" style="padding:0px;">
                    <div class="footer-box">
                        <div class="box-icon" style="width:80px;padding-top:11px;margin-bottom: 0px;">
                            <i class="fa fa-shopping-cart" style="font-size: 50px;"></i>
                        </div>
                    </div>
                    <p class="card-title" style="margin-bottom: 10px;">Barang</p>
                    <p class="card-text">Donasi uang sejumlah harga barang yang dibutuhkan korban bencana.</p>
                    <a href="{{ url('/donasi/jenis/barang/'.$bencana->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;">Pilih</button>
                    </a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection