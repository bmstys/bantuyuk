@extends('template.utamabpbd')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 100px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <h3>Konfirmasi Realisasi</h3>
        </div>
        <div class="card text-center">
            <!-- <div class="card-header">
                Featured
            </div> -->

            <div class="card-body">
                <form class="form-pencairan" method="POST" action="{{ url('/realisasi/'.$bencana->id) }}">

                <div class="form-row">
                    
                    @foreach($data_petugas as $petugas)
                    
                    <div class="form-group col-md-6 text-left">
                        <label for="nama" style="color: black;font-weight: 500;">Petugas</label>
                        <input name="nama_petugas" type="text" class="form-control" placeholder="{{ $petugas->nama }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
                    </div>

                    @endforeach
                    
                    <div class="form-group col-md-6 text-left">
                        <label for="nama" style="color: black;font-weight: 500;">Tanggal Realisasi</label>
                        <input name="tanggal_realisasi" type="text" class="form-control" placeholder="{{ $tanggal_sekarang->format('d F Y') }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 text-left">
                        <label for="nama" style="color: black;font-weight: 500;">Nama Bencana</label>
                        <input type="text" class="form-control" placeholder="{{ $bencana->nama }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
                    </div>
                    <div class="form-group col-md-6 text-left">
                        <label for="nama" style="color: black;font-weight: 500;">Lokasi Bencana</label>
                        <input type="text" class="form-control" placeholder="{{ $bencana->lokasi }}" style="padding-top: 5px;padding-bottom: 5px;" readonly>
                    </div>
                </div>


                <div class="form-group text-left">
                    <label for="nominal" style="color: black;font-weight: 500;">Masukkan nominal yang akan anda cairkan (Maksimal {{ $total }})</label> 
                    <input type="number" name="nominal" class="form-control" id="username" placeholder="Contoh: 10000000" style="padding-top: 5px;padding-bottom: 5px;" required autofocus>
                </div>
            </div>
            <div class="card-footer text-muted">
                    @csrf

                  <input type="hidden" name="total_yang_bisa_direalisasikan" value="{{ $total }}">

                  <button type="submit" class="btn" style="background-color: #E32F43;color: white;width: 100%;">Konfirmasi</button>

            </div>
                </form>             
        </div>
    </div>    
</div>
@endsection

@section('js')
    <script>
      $('.form-pencairan').submit(function (e)
      {
        var form = this;
        e.preventDefault();
        swal
        ({
          title: 'Konfirmasi',
          text: "Apa anda yakin ingin mencairkan donasi?",
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