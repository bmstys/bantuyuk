@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 110px;padding-bottom:40px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Donasi Barang</h3>
        </div>

        <div class="row" style="height: 25px;font-size: 14px;">
            <p style="color: red;padding-left: 15px;margin-bottom: 0px;">Isikan jumlah barang yang ingin Anda donasikan</p>
        </div>
        <div class="row" style="height: 25px;font-size: 14px;">
            <p style="color: red;padding-left: 15px;margin-bottom: 0px;">Kosongkan jumlah barang apabila Anda tidak ingin mendonasikan barang tersebut</p>
        </div>
        <form action="{{ url('/donasi/konfirmasi') }}" method="POST">
            <input type="hidden" name="bencana_id" value="{{ $bencana->id }}">
            <input type="hidden" name="donasi_id" value="{{ $donasi->id }}">
            @csrf
        <div class="row justify-content-center" style="margin-top: 20px;">
            
            @foreach ($dataBarangs as $barang)

            <div class="col-sm-6 col-md-4">
                <div class="card text-center" style="margin-bottom: 20px;">
                  <div class="card-header">
                    {{ $barang->nama_barang }}
                  </div>
                  <div class="card-body">
                    <img src="{{ asset('storage/'.$barang->gambar) }}" alt="Error load image" style="width: 100%;margin-bottom: 10px;height: 215.59px;">
                    <table>
                        <tr>
                            <td class="text-left" valign="top" style="width:100px;">Satuan</i></td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left">{{ $barang->satuan }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Harga</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td data-harga="{{ $barang->harga }}" class="text-left harganya">{{ $barang->harga }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Jumlah </td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left">
                                <input type="checkbox" class="d-none" name="barang[]" value="{{ $barang->id }}">
                                <input type="number" name="jumlah[{{ $barang->id }}]" class="form-control input-jumlah" style="width:200px;padding-top: 5px;padding-bottom: 5px;">
                            </td>
                        </tr>
                    </table>
                  </div>
                  <div class="card-footer text-muted total-harga" data-hargatotal="0">
                    Rp 
                  </div>
                </div>
            </div>

            @endforeach

        </div>

        <div class="row justify-content-end" style="padding-right: 15px;">
                <button type="submit" class="btn" style="background-color: #E32F43;color: white;margin-top: 20px;width: 150px;">Lanjutkan</button>
        </div>
    </form>
    </div>
</div>
@endsection

@section('js')
    <script>
    $(document).ready(function (){
        $('.input-jumlah').on('keyup', function (e) {
            var jumlah = $(this).val();
            var prevtd = $(this).closest('tr').prev().find('.harganya').first();
            var nexttd = $(this).closest('div').next();
            var Rp = "Rp " + ($(this).val() * prevtd.data('harga'));
            if (jumlah > 0) {
                $(this).prev().attr('checked', 'true');
            } else {
                $(this).prev().attr('checked', 'false');
            }
            nexttd.text(Rp);
        });
    });
    </script>
@endsection