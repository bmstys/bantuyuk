@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="padding-top: 110px;padding-bottom:40px;background-color: #F5F6FF;z-index: 0;min-height: 720px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-10 text-center">
                <h3>Pilih Bencana dan Lokasi</h3>
            </div>
            <div class="col-xs-2">
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #E32F43;color: white;width: 150px;z-index: 10; float: right;">Cari Rekomendasi</button>
            </div>

            <!-- Modal -->
            <form class="scpk" action="{{ url('/scpk') }}" method="POST">
                @csrf
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalCenterTitle" style="font-size: 14px;">Isikan terlebih dahulu</h4>                      
                            </div>
                            <div class="modal-body">
                                
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" style="font-size: 14px;">Berapa budget donasi anda?</label>
                                </div>
                                <div class="form-group row">
                                    <div class="form-check col-sm-4">
                                        <input type="radio" name="budget" value="sedikit" checked>
                                        <label for="exampleRadios1"  style="font-size: 14px;">
                                            < Rp 1.000.000
                                        </label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input type="radio" name="budget" value="sedang">
                                        <label for="exampleRadios2"  style="font-size: 14px;">
                                            Rp 1.000.000 - Rp 3.000.000
                                        </label>
                                    </div>
                                    <div class="form-check col-sm-4">
                                        <input type="radio" name="budget" value="banyak">
                                        <label for="exampleRadios2"  style="font-size: 14px;">
                                            > Rp 3.000.000
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" style="font-size: 14px;">Tentukan prioritas kebutuhan yang akan anda salurkan! (0-100 %)</label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-size: 14px;">Beras</label>
                                    <div class="col-sm-10">
                                        <input name="beras" type="number" class="form-control" style="height: 40px" value="{{ old('beras') }}">

                                        @if ($errors->has('beras'))
                                            <small class="form-text" style="color:red;">{{ $errors->first('beras') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-size: 14px;">Air Mineral</label>
                                    <div class="col-sm-10">
                                        <input name="air" type="number" class="form-control" style="height: 40px" value="{{ old('air') }}">

                                        @if ($errors->has('air'))
                                            <small class="form-text" style="color:red;">{{ $errors->first('air') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-size: 14px;">Obat</label>
                                    <div class="col-sm-10">
                                        <input name="obat" type="number" class="form-control" style="height: 40px" value="{{ old('obat') }}">

                                        @if ($errors->has('obat'))
                                            <small class="form-text" style="color:red;">{{ $errors->first('obat') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-size: 14px;">Bubur Bayi</label>
                                    <div class="col-sm-10">
                                        <input name="bubur" type="number" class="form-control" style="height: 40px" value="{{ old('bubur') }}">

                                        @if ($errors->has('bubur'))
                                            <small class="form-text" style="color:red;">{{ $errors->first('bubur') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="font-size: 14px;">Pembalut</label>
                                    <div class="col-sm-10">
                                        <input name="pembalut" type="number" class="form-control" style="height: 40px" value="{{ old('pembalut') }}">

                                        @if ($errors->has('pembalut'))
                                            <small class="form-text" style="color:red;">{{ $errors->first('pembalut') }}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn" style="background-color: #E32F43;color: white;">Temukan Rekomendasi</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

        <div class="row justify-content-center" style="margin-top: 20px;">
        @foreach($dataBencanas as $bencana)
            <div class="col-sm-6 col-md-4">
                <div class="card text-center" style="margin-bottom: 20px;">
                  <div class="card-header">
                    {{ $bencana->lokasi }}
                  </div>
                  <div class="card-body" style="height: 540px;">
                    <img src="{{ asset('storage/'.$bencana->gambar_bencana) }}" alt="Error load image" style="width: 100%;margin-bottom: 10px; height: 215px;">
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
                            <td class="text-left" valign="top">{{ $bencana->jml_korban }} orang</td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Kebutuhan</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">
                                {{ implode(', ', $bencana->kebutuhans->pluck('nama_kebutuhan')->toArray()) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Open Donasi</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">
                                {{ $bencana->donasis->first()->open->format('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Close Donasi</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">
                                {{ $bencana->donasis->first()->close->format('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" valign="top">Total Donasi</td>
                            <td class="text-left" valign="top" style="padding-left:3px;padding-right:3px;">:</td>
                            <td class="text-left" valign="top">{{ $bencana->donasis->first()->total }}</td>
                        </tr>
                    </table>
                  </div>
                  <div class="card-footer text-muted">
                    <a href="{{ asset('/donasi/jenis/'.$bencana->donasis->first()->id) }}">
                        <button type="button" class="btn" style="background-color: #E32F43;color: white;width: 150px;">Pilih</button>
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