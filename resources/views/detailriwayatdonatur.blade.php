@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 100px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="row justify-content-center">
        <h3>Detail</h3>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama" style="color: black;font-weight: 500;">ID Donasi</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi->donasi_id }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nama" style="color: black;font-weight: 500;">Jenis Donasi</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi->jenis }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama" style="color: black;font-weight: 500;">Bencana</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi->donasi->bencana->nama }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nama" style="color: black;font-weight: 500;">Lokasi</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi->donasi->bencana->lokasi }}">
        </div>
    </div>
    <table class="table table-hover table-striped table-bordered table-condensed" style="margin-top: 15px;margin-bottom: 50px;">
        <thead>
            <tr>
                <th class="text-center" width="20px">No</th>
                <th class="text-center" width="150px">Tanggal Progress</th>
                <th class="text-center" width="150px">Status</th>
                <th class="text-center" width="150px">Keterangan</th>
            </tr>
        </thead>
        <tbody>

            @foreach($donasi->riwayatDonasi as $riwayat)

            <tr>
                <td class="text-center" style="padding:10px;">{{ $no++ }}</td>
                <td class="text-center" style="padding:10px;">{{ $riwayat->created_at->format('d F Y') }}</td>
                <td class="text-center" style="padding:10px;">{{ $riwayat->status->nama_status }}</td>
                <td class="text-center" style="padding:10px;">{{ $riwayat->status->keterangan }}</td>
            </tr>

            @endforeach

        </tbody>
    </table>


</div>
@endsection