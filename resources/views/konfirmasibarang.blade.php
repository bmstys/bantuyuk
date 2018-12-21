@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 100px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Konfirmasi Donasi Anda</h3>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Nama Donatur</label>
                <input type="text" class="form-control" placeholder="{{ auth()->user()->nama }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Jenis Donasi</label>
                <input type="text" class="form-control" placeholder="Barang" style="padding-top: 5px;padding-bottom: 5px;" readonly>
            </div>
        </div>

        @foreach($bencana as $bencana)

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Bencana</label>
                <input type="text" class="form-control" placeholder="{{ $bencana->nama }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Lokasi</label>
                <input type="text" class="form-control" placeholder="{{ $bencana->lokasi }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
            </div>
        </div>

        @endforeach

        <table class="table table-hover table-striped table-bordered table-condensed" style="margin-top: 15px;">
            <thead>
                <tr>
                    <th class="text-center" width="20px">No</th>
                    <th class="text-center" width="150px">Nama Barang</th>
                    <th class="text-center" width="50px">Satuan</th>
                    <th class="text-center" width="80px">Harga</th>
                    <th class="text-center" width="20px">Jumlah</th>
                    <th class="text-center" width="80px">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataBarang as $i => $barang)
                    <tr>
                        <td class="text-center">{{ $i + 1 }}</td>
                        <td class="text-center">{{ $barang->nama_barang }}</td>
                        <td class="text-center">{{ $barang->satuan }}</td>
                        <td class="text-center">{{ rupiah($barang->harga) }}</td>
                        <td class="text-center">{{ $jumlahBarang[$barang->id] }}</td>
                        <td>{{ rupiah($barang->harga * $jumlahBarang[$barang->id]) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <p style="color: red;padding-left: 15px;font-size: 15px;margin-bottom: 0px;">Total Donasi Anda adalah {{ rupiah($grandTotal)}}</p>
        </div>
        <div class="row justify-content-end" style="padding-right: 15px;margin-bottom: 25px;">
            <form class="form-donasi-barang" action="{{ url('/konfirmasi') }}" method="POST">
                @csrf
                <button type="submit" class="btn" style="background-color: #E32F43;color: white;">Konfirmasi</button>
            </form>
        </div>
    </div>    
</div>
@endsection

@section('js')
    <script>
        $('.form-donasi-barang').submit(function (e)
        {
            var form = this;
            e.preventDefault();
            swal
            ({
                title: 'Konfirmasi',
                text: "Apa anda yakin ingin mendonasikan bantuan dalam bentuk barang?",
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