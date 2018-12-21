@extends('template.utamabpbd')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 110px;padding-bottom:40px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Pilih Bencana dan Lokasi</h3>
        </div>

        <div class="row justify-content-center" style="margin-top: 20px;">

            @foreach($dataBencanas as $bencana)

            <div class="col-sm-6 col-md-4">
                <div class="card text-center" style="margin-bottom: 20px;">
                  <div class="card-header">
                    {{ $bencana->lokasi }}

                    @foreach($bencana->donasis as $donasi)
                        @foreach($donasi->donasiDonaturs as $donasi_donatur)
                            @if( $donasi_donatur->status_id == '3' )

                            <a href="{{ url('/realisasiuploadbukti/'.$bencana->id) }}">
                                <button type="button" class="btn float-right" style="background-color: #E32F43;color: white;;">
                                    <i class="fa fa-upload"></i>
                                </button>
                            </a>

                            @endif
                        @endforeach
                    @endforeach

                  </div>
                  <div class="card-body" style="height: 540px;">
                    <img src="{{ asset('storage/'.$bencana->gambar_bencana) }}" alt="Error load image" style="width: 100%;margin-bottom: 10px; height:216px;">
                    <h4 class="card-title">{{ $bencana->nama }}</h5>
                    <table>
                        <tr>
                            <td class="text-left" valign="top" style="width:100px;">Tanggal <i class="fa fa-calendar"></i></td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">{{ $bencana->tanggal->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Korban <i class="fa fa-user"></td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">{{ $bencana->jml_korban }} korban</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Kebutuhan</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">
                                {{ implode(', ', $bencana->kebutuhans->pluck('nama_kebutuhan')->toArray()) }}
                            </td>
                        </tr>

                        @foreach($bencana->donasis as $donasi)

                        <tr>
                            <td class="text-left" valign="top">Open Donasi</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">{{ $donasi->open->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Close Donasi</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">{{ $donasi->close->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Total Donasi</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">Rp {{ $donasi->total }}</td>
                        </tr>

                        @endforeach
                        
                    </table>
                  </div>

                  @foreach($bencana->donasis as $donasi)

                  <div class="card-footer text-muted">
                    
                    @if( $donasi->close < $now )

                        <button type="button" class="btn" style="background-color: grey;color: white;width: 100%;">Pilih</button>
                  
                    @else

                    <a href="{{ url('/realisasikan/'.$bencana->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;width: 100%;">Pilih</button>
                    </a>

                    @endif

                  </div>

                  @endforeach

                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
