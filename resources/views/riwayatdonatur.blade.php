@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 125px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="row justify-content-center">
        <h3>Riwayat Donasi Anda</h3>
    </div>
    <table class="table table-hover table-striped table-bordered table-condensed" style="margin-top: 15px;margin-bottom: 50px;">
        <thead>
            <tr>
                <th class="text-center" width="20px">No</th>
                <th class="text-center" width="40px">ID</th>
                <th class="text-center" width="150px">Bencana</th>
                <th class="text-center" width="150px">Lokasi</th>
                <th class="text-center" width="150px">Jenis</th>
                <th class="text-center" width="40px">Aksi</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($dataDonasis as $donasi)

            <tr>
                <td class="text-center" style="padding:10px;">{{ $no++ }}</td>
                <td class="text-center" style="padding:10px;">{{ $donasi->id }}</td>
                <td style="padding:10px;">{{ $donasi->donasi->bencana->nama }}</td>
                <td style="padding:10px;">{{ $donasi->donasi->bencana->lokasi }}</td>
                <td style="padding:10px;">{{ $donasi->jenis }}</td>
                <td class="text-center">
                    <a href="{{ url('/detail/'.$donasi->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;">Detail</button>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @if($ga_ada_riwayat < 1)

    <div class="alert alert-danger" role="alert"  style="margin-top:407px;height: 60px;">
        <div class="text-left">
            <b>Anda belum memiliki riwayat donasi</b>
        </div>
    </div>

    @endif

</div>
@endsection