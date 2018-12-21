@extends('template.utamaauth')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/styleRegistrasi.css') }}">
@endsection

@section('content')
<header id="home_page" style="padding-top: 125px;background-color: #F5F6FF;z-index: 0;">
    <div class="container" style="min-height: 595px;">
        <div class="row justify-content-center">
            <h3 style="color: black;margin-bottom: 25px;"><b>Profil</b></h3>
        </div>
        <div class="row">
            <form class="form-registrasi justify-content-center form-edit-profil" style="padding-left: 20px;padding-right: 30px;" action="{{ url('/profil/'.Auth::user()->id) }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nik" style="color: black;font-weight: 500;">NIK</label>
                        <input name="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" id="nik" placeholder="Nomor Induk Kependudukan" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->nik}}">

                        @if($errors->has('nik'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('nik') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username" style="color: black;font-weight: 500;">Username</label>
                        <input name="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Username akun anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->username}}">

                        @if($errors->has('username'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('username') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama" style="color: black;font-weight: 500;">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" placeholder="Nama lengkap anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->nama}}">

                        @if($errors->has('nama'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('nama') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="alamat" style="color: black;font-weight: 500;">Alamat</label>
                        <input name="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" placeholder="Alamat rumah anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->alamat}}">

                        @if($errors->has('alamat'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('alamat') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="noHp" style="color: black;font-weight: 500;">Nomor Handphone</label>
                        <input name="noHp" type="number" class="form-control{{ $errors->has('noHp') ? ' is-invalid' : '' }}" id="noHp" placeholder="Nomor handphone anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->noHp}}">

                        @if($errors->has('noHp'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('noHp') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="noRek" style="color: black;font-weight: 500;">Nomor Rekening</label>
                        <input name="noRek" type="number" class="form-control{{ $errors->has('noRek') ? ' is-invalid' : '' }}" id="noRek" placeholder="Nomor rekening ATM anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->noRek}}">

                        @if($errors->has('noRek'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('noRek') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="namaRek" style="color: black;font-weight: 500;">Nama Rekening</label>
                        <input name="namaRek" type="text" class="form-control{{ $errors->has('namaRek') ? ' is-invalid' : '' }}" id="namaRek" placeholder="Nama rekening ATM anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{Auth::user()->namaRek}}">

                        @if($errors->has('namaRek'))
                            <div class="invalid-feedback">
                                @foreach($errors->get('namaRek') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <button type="button" class="btn" style="float: left;background-color: #E32F43;color: white;margin-bottom: 40px;" data-toggle="modal" data-target="#exampleModal">Ubah Password</button>
                <button type="submit" class="btn" style="float: right;background-color: #E32F43;color: white;margin-bottom: 40px;">Perbarui Akun</button>
                <input type="hidden" name="_method" value="PUT">
            </form>



            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header justify-content-center" style="padding:10px;">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form class="form-edit-password" action="{{ url('/profile/password') }}" method="POST">
                  @csrf
                  
                    <div class="modal-body text-left spesialisasi-background" style="padding-top: 25px;">
                      <!-- Password Edit -->
                      <div class="card-body" style="padding:0;">
                        <div class="form-group row">
                          <label for="current-password" class="col-sm-4 col-form-label">Password Lama</label>
                          <div class="col-sm-8">
                            <input name="current-password" type="password" class="form-control{{ $errors->editPwd->has('current-password') ? ' is-invalid' : '' }}" placeholder="Masukkan pasword lama anda">
                            @if ($errors->editPwd->has('current-password'))
                              <small class="form-text" style="color:red;">{{ $errors->editPwd->first('current-password') }}</small>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                          <div class="col-sm-8">
                            <input name="password" type="password" class="form-control{{ $errors->editPwd->has('password') ? ' is-invalid' : '' }}" placeholder="Masukkan pasword baru anda">
                            @if ($errors->editPwd->has('password'))
                              <div class="invalid-feedback">
                                {{ $errors->editPwd->first('password') }}
                              </div>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="password_confirmation" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                          <div class="col-sm-8">
                            <input name="password_confirmation" type="password" class="form-control{{ $errors->editPwd->has('password') ? ' is-invalid' : '' }}" placeholder="Masukkan konfirmasi pasword lama anda">
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="modal-footer spesialisasi-background-title" style="padding:5px;">
                    <button type="button" class="btn" style="background-color: #E32F43;color: white;" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn" style="background-color: #E32F43;color: white;">Ubah Password</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>
</header>
@endsection

@section('js')

    @if (count($errors->editPwd->all()) > 0)
        <script>
            $(document).ready(function () {
              $('#exampleModal').modal('show');
            });
        </script>
    @endif

    <script>
      $('.form-edit-profil').submit(function (e)
      {
        var form = this;
        e.preventDefault();
        swal
        ({
          title: 'Konfirmasi',
          text: "Apa anda yakin ingin mengubah profil anda?",
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

    <script>
      $('.form-edit-password').submit(function (e)
      {
        var form = this;
        e.preventDefault();
        swal
        ({
          title: 'Konfirmasi',
          text: "Apa anda yakin ingin mengubah password anda?",
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