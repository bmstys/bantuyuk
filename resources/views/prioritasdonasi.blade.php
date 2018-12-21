@extends('template.utamaauth')

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
        @foreach($prioritas_bencana as $bencana)
            <div class="col-sm-6 col-md-4">
                <div class="card text-center" style="margin-bottom: 20px;">
                  <div class="card-header">
                    {{ $bencana->lokasi }}
                  </div>
                  <div class="card-body" style="height: 280px;">
                    <img src="{{ asset('storage/'.$bencana->gambar_bencana) }}" alt="Error load image" style="width: 100%;margin-bottom: 10px; height: 215px;">
                    <h4 class="card-title">{{ $bencana->nama }}</h5>
                  </div>
                  <div class="card-footer text-muted">
                    <a href="{{ asset('/scpk/donasi/'.$bencana->donasis->first()->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;width: 100%;">Berikan Donasi</button>
                    </a>
                  </div>
                </div>
            </div>
        @endforeach
        </div>

    </div>
</div>
@endsection

@section('js')
    
    @if (count($errors->gagal->all()) > 0)
        <script>
            $(document).ready(function () {
              $('#exampleModalCenter').modal('show');
            });
        </script>
    @endif

    @if (count($errors->all()) > 0)
        <script>
            $(document).ready(function () {
              $('#exampleModalCenter').modal('show');
            });
        </script>
    @endif

    <script>
      $('.scpk').submit(function (e)
      {
        var form = this;
        e.preventDefault();
        swal
        ({
          title: 'Konfirmasi',
          text: "Anda yakin isian anda?",
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