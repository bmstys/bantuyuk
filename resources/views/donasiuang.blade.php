@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 100px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Donasi Uang</h3>
        </div>

        @foreach ($dataBencanas as $bencana)
        
        <form action="{{ url('/donasiuang/'.$bencana->id) }}" class="form-registrasi justify-content-center form-donasi-uang" style="padding-left: 20px;padding-right: 30px;" method="POST">
        @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama" style="color: black;font-weight: 500;">Nama Donatur</label>
                    <input name="nama" type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" value="{{ Auth::user()->nama }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama" style="color: black;font-weight: 500;">Jenis Donasi</label>
                    <input name="jenis" type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" value="Uang" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama" style="color: black;font-weight: 500;">Bencana</label>
                    <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" value="{{ $bencana->nama }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama" style="color: black;font-weight: 500;">Lokasi</label>
                    <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" value="{{ $bencana->lokasi }}" readonly>
                </div>
            </div>
            <div class="row">
                <p style="color: red;padding-left: 15px;padding-right: 15px;">Isikan nominal yang ingin Anda donasikan.
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <input name="nominal" type="text" class="form-control" placeholder="Rp." style="padding-top: 5px;padding-bottom: 5px;height: 35.64px;">
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn" style="background-color: #E32F43;color: white;width: 100%;">Pilih</button>
                </div>
            </div>
        @endforeach
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.form-donasi-uang').submit(function (e)
        {
            var form = this;
            e.preventDefault();
            swal
            ({
                title: 'Konfirmasi',
                text: "Apa anda yakin ingin mendonasikan bantuan dalam bentuk uang?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Tidak'
            }, 
            function (result) 
            {
                if (result) 
                {
                    form.submit();
                }
            });
        });
    </script>
@endsection