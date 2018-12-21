@extends('template.utamabpbd')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 100px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Cek Kebutuhan</h3>
        </div>

        @foreach($dataBencanas as $bencana)

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Nama Bencana</label>
                <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $bencana->bencana->nama }}">
            </div>
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Lokasi Bencana</label>
                <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $bencana->bencana->lokasi }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Tanggal Bencana</label>
                <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $bencana->bencana->tanggal->format('d F Y') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="nama" style="color: black;font-weight: 500;">Jumlah Korban</label>
                <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $bencana->bencana->jml_korban }}">
            </div>
        </div>

        <table class="table table-hover table-striped table-bordered table-condensed" style="margin-top: 15px;">
            <thead>
                <tr>
                    <th class="text-center" width="20px">No</th>
                    <th class="text-center" width="150px">Jenis Kebutuhan</th>
                    <th class="text-center" width="50px">Satuan</th>
                    <th class="text-center" width="20px">Jumlah</th>
                    <th class="text-center" width="80px">Harga</th>
                    <th class="text-center" width="80px">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandtotalnya = 0; 
                @endphp

                @foreach($data_donasi_donatur as $kebutuhan_yang_ada)

                <tr>


                        @if( $kebutuhan_yang_ada->donasiDonaturs->jenis == 'Barang' )
                        

                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $kebutuhan_yang_ada->barangs->nama_barang }}</td>
                            <td class="text-center">{{ $kebutuhan_yang_ada->barangs->satuan }}</td>
                            <td class="text-center">{{ $kebutuhan_yang_ada->jumlahnya }}</td>
                            <td class="text-center">{{ rupiah($kebutuhan_yang_ada->barangs->harga) }}</td>
                            <td class="text-center">{{ rupiah($totalnya = $kebutuhan_yang_ada->jumlahnya * $kebutuhan_yang_ada->barangs->harga) }}</td>

                        @else

                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $kebutuhan_yang_ada->barangs->nama_barang }}</td>
                            <td class="text-center">{{ $kebutuhan_yang_ada->barangs->satuan }}</td>
                            <!-- <td class="text-center">{{ rupiah($kebutuhan_yang_ada->donasiDonaturs->nominal) }}</td> -->
                            <td class="text-center">{{ rupiah($kebutuhan_yang_ada->jumlahnya) }}</td>
                            <td class="text-center">{{ $kebutuhan_yang_ada->barangs->harga }}</td>
                            <!-- <td class="text-center">{{ $totalnya = $kebutuhan_yang_ada->donasiDonaturs->nominal }}</td> -->
                            <td class="text-center">{{ rupiah($totalnya = $kebutuhan_yang_ada->jumlahnya * $kebutuhan_yang_ada->barangs->harga) }}</td>


                        @endif

                    @php    
                        $grandtotalnya += $totalnya;
                    @endphp
                </tr>

                @endforeach

            </tbody>
        </table>
        <div class="row">
            <p style="color: red;padding-left: 15px;font-size: 15px;margin-bottom: 0px;">Total Kebutuhan yang bisa direalisasikan {{ rupiah($grandtotalnya-$sudah_realisasi)}}</p>

        </div>
        <div class="row">
            <p style="color: red;padding-left: 15px;font-size: 15px;margin-bottom: 0px;">Total Kebutuhan yang sudah direalisasikan {{ rupiah($sudah_realisasi)}}</p>
        </div>
        <div class="row justify-content-end" style="padding-right: 15px;margin-bottom: 25px;">

            @if($grandtotalnya-$sudah_realisasi <= 0)

            <button type="button" class="btn" style="background-color: grey;color: white;">Realisasikan</button>

            @else

            @php $tot = $grandtotalnya-$sudah_realisasi @endphp

            <form action="{{ url('/konfirmasipencairan/'.$bencana->bencana->id.'/'.$tot) }}" method="POST">
                @csrf
                <input type="hidden" name="total_yang_bisa_direalisasikan" value="{{ $grandtotalnya-$sudah_realisasi }}">
                <button type="submitt" class="btn" style="background-color: #E32F43;color: white;">Realisasikan</button>
            </form>

            @endif
        </div>

        @endforeach

    </div>    
</div>
@endsection