@extends('template.utamabpbd')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 100px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="row justify-content-center">
        <h3>Detail Donasi</h3>
    </div>

    @foreach($donasiMasuks as $donasi_masuk)

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id_donasi" style="color: black;font-weight: 500;">ID Donasi</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi_masuk->id }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nama" style="color: black;font-weight: 500;">Nama Donatur</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi_masuk->user->nama }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="bencana" style="color: black;font-weight: 500;">Bencana</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi_masuk->donasi->bencana->nama }}">
        </div>
        <div class="form-group col-md-6">
            <label for="lokasi" style="color: black;font-weight: 500;">Lokasi</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi_masuk->donasi->bencana->lokasi }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="namaRek" style="color: black;font-weight: 500;">Nama Rekening</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi_masuk->user->namaRek }}">
        </div>
        <div class="form-group col-md-6">
            <label for="noRek" style="color: black;font-weight: 500;">No Rekening</label>
            <input type="text" class="form-control" style="padding-top: 5px;padding-bottom: 5px;" readonly value="{{ $donasi_masuk->user->noRek }}">
        </div>
    </div>
    
    <table class="table table-hover table-striped table-bordered table-condensed" style="margin-top: 15px;margin-bottom: 8px;">
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

            @foreach($donasinyas as $donasinya)

            <tr>

                @if( $donasinya->donasiDonaturs->jenis == 'Barang' )
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $donasinya->barangs->nama_barang }}</td>
                    <td class="text-center">{{ $donasinya->barangs->satuan }}</td>
                    <td class="text-center">{{ rupiah($donasinya->barangs->harga) }}</td>
                    <td class="text-center">{{ $donasinya->jumlah }}</td>
                    <td class="text-center">{{ rupiah($donasinya->barangs->harga * $donasinya->jumlah) }}</td>
                @else
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $donasinya->barangs->nama_barang }}</td>
                    <td class="text-center">{{ $donasinya->barangs->satuan }}</td>
                    <td class="text-center">-</td>
                    <td class="text-center">{{ rupiah($donasi_masuk->nominal) }}</td>
                    <td class="text-center">{{ rupiah($donasi_masuk->nominal) }}</td>
                @endif

            </tr> 

            @endforeach

        </tbody>
    </table>

    <div class="row">
        <p style="color: red;padding-left: 15px;font-size: 15px;margin-bottom: 0px;">Total Donasi adalah {{ rupiah($grandTotal)}}</p>
    </div>
    <div class="row justify-content-end" style="padding-right: 15px;margin-bottom: 25px;">

        <form class="form-terima" action="{{ url('/terimadonasi/'.$donasi_masuk->id) }}" method="POST">
        @csrf
            <button type="submit" class="btn" style="background-color: #E32F43;color: white;">Terima</button>
        <input type="hidden" name="_method" value="PUT">
        </form>

    </div>

    @endforeach

</div>
@endsection

@section('js')
    @foreach($donasiMasuks as $donasi_masuk)
        <script>
          $('.form-terima').submit(function (e)
          {
            var form = this;
            e.preventDefault();
            swal
            ({
              title: 'Konfirmasi',
              text: "Apa anda yakin akan menerima donasi dari {{ $donasi_masuk->user->nama }}?",
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
    @endforeach
@endsection