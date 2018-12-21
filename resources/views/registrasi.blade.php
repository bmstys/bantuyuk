@extends('template.utamaregister')

@section('css')
<link rel="stylesheet" href="{{asset('/css/styleRegistrasi.css')}}">
@endsection

@section('content')
<header id="home_page" style="padding-top: 125px;background-color: #F5F6FF;z-index: 0;">
    <div class="container" style="min-height: 595px;">
	    <div class="row justify-content-center">
	        <h3 style="color: black;margin-bottom: 25px;"><b>Registrasi</b></h3>
	    </div>
        <div class="row">
            <form action="{{ route('register') }}" class="form-registrasi justify-content-center" style="padding-left: 20px;padding-right: 30px;" method="POST">
            @csrf

            	<div class="form-row">
            		<div class="form-group col-md-6">
		                <label for="nik" style="color: black;font-weight: 500;">NIK</label>
		                <input type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" id="nik" placeholder="NIK 16 digit" style="padding-top: 5px;padding-bottom: 5px;" name="nik" value="{{ old('nik') }}" autofocus>

		                @if ($errors->has('nik'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('nik') }}</strong>
                            </span>
                        @endif
		            </div>
		            <div class="form-group col-md-6">
		                <label for="username" style="color: black;font-weight: 500;">Username</label>
		                <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Username akun anda" style="padding-top: 5px;padding-bottom: 5px;" name="username" value="{{ old('username') }}">

		                @if ($errors->has('username'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
		            </div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col-md-6   ">
                        <label for="password" style="color: black;font-weight: 500;">Password</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Minimal 6 digit" style="padding-top: 5px;padding-bottom: 5px;" name="password" value="{{ old('password') }}">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
		            <div class="form-group col-md-6	">
		                <label for="password" style="color: black;font-weight: 500;">Konfirmasi Password</label>
		                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password-confirm" placeholder="Tulis ulang password anda" style="padding-top: 5px;padding-bottom: 5px;" name="password_confirmation">
		            </div>
            	</div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama" style="color: black;font-weight: 500;">Nama Lengkap</label>
                        <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" placeholder="Nama lengkap anda" style="padding-top: 5px;padding-bottom: 5px;" name="nama" value="{{ old('nama') }}">

                        @if ($errors->has('nama'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            	<div class="form-row">
            		<div class="form-group col-md-6">
		                <label for="alamat" style="color: black;font-weight: 500;">Alamat</label>
	                  	<input type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" placeholder="Alamat rumah anda" style="padding-top: 5px;padding-bottom: 5px;" name="alamat" value="{{ old('alamat') }}">

		                @if ($errors->has('alamat'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
		            </div>
		            <div class="form-group col-md-6	">
		                <label for="noHp" style="color: black;font-weight: 500;">Nomor Handphone</label>
	                  	<input type="number" class="form-control{{ $errors->has('noHp') ? ' is-invalid' : '' }}" id="noHp" placeholder="8-12 digit nomor anda" style="padding-top: 5px;padding-bottom: 5px;" name="noHp" value="{{ old('noHp') }}">

		                @if ($errors->has('noHp'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('noHp') }}</strong>
                            </span>
                        @endif
		            </div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col-md-6">
		                <label for="noRek" style="color: black;font-weight: 500;">Nomor Rekening</label>
	                  	<input type="number" class="form-control{{ $errors->has('noRek') ? ' is-invalid' : '' }}" id="noRek" placeholder="Nomor rekening ATM anda" style="padding-top: 5px;padding-bottom: 5px;" name="noRek" value="{{ old('noRek') }}">

		                @if ($errors->has('noRek'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('noRek') }}</strong>
                            </span>
                        @endif
		            </div>
		            <div class="form-group col-md-6	">
		                <label for="namaRek" style="color: black;font-weight: 500;">Nama Rekening</label>
	                  	<input type="text" class="form-control{{ $errors->has('namaRek') ? ' is-invalid' : '' }}" id="namaRek" placeholder="Nama rekening ATM anda" style="padding-top: 5px;padding-bottom: 5px;" name="namaRek" value="{{ old('namaRek') }}">

		                @if ($errors->has('namaRek'))
                            <span class="invalid-feedback align-items-center" style="height: 20px;">
                                <strong>{{ $errors->first('namaRek') }}</strong>
                            </span>
                        @endif
		            </div>
            	</div>

	            <button type="submit" class="btn" style="float: right;background-color: #E32F43;color: white;margin-bottom: 40px;">Buat Akun</button>
	        </form>
        </div>
    </div>
</header>
@endsection