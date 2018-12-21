@extends('template.utamabpbd')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 125px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="row justify-content-center">
        <h3>Donasi Masuk</h3>
    </div>
    <table class="table table-hover table-striped table-bordered table-condensed" style="margin-top: 15px;margin-bottom: 50px;">
        <thead>
            <tr>
                <th class="text-center" width="20px">No</th>
                <th class="text-center" width="40px">ID Donasi</th>
                <th class="text-center" width="150px">Nama Donatur</th>
                <th class="text-center" width="150px">Tanggal Donasi</th>
                <th class="text-center" width="150px">Bencana</th>
                <th class="text-center" width="150px">Lokasi</th>
                <th class="text-center" width="150px">Jenis</th>
                <th class="text-center" width="40px">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($donasiMasuks as $donasi_masuk)

            <tr>
                <td class="text-center" style="padding:10px;">{{ $no++ }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi_masuk->id }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi_masuk->user->nama }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi_masuk->created_at->format('d F Y') }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi_masuk->donasi->bencana->nama }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi_masuk->donasi->bencana->lokasi }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi_masuk->jenis }}</td>
                <td class="text-center">
                    <a href="{{ url('/detaildonasimasuk/'.$donasi_masuk->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;">Detail</button>
                    </a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    @if($ga_ada_donasi_masuk < 1)

    <div class="alert alert-danger" role="alert"  style="margin-top:407px;height: 60px;">
        <div class="text-left">
            <b>Belum ada donasi yang disalurkan oleh donatur</b>
        </div>
    </div>

    @endif

</div>
@endsection