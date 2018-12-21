@extends('template.utamaregister')

@section('css')
<link rel="stylesheet" href="{{asset('/css/styleLogin.css')}}">
@endsection

@section('content')
<header id="home_page" style="padding-top: 125px;background-color: #F5F6FF;">
    <div class="container" style="height: 595px;">
	    <div class="row justify-content-center">
	        <h3 style="color: black;margin-bottom: 25px;"><b>Masuk</b></h3>
	    </div>
        <div class="row justify-content-center">
            <form action="{{ route('login') }}" class="form-registrasi justify-content-center" style="width: 710px;padding-left: 20px;padding-right: 20px;" method="POST">
			@csrf

	            <div class="form-group">
                  	<label for="username" style="color: black;font-weight: 500;">Username</label>
                  	<input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Username akun anda" style="padding-top: 5px;padding-bottom: 5px;" value="{{ old('username') }}" required autofocus>

	                @if ($errors->has('username'))
                    	<span class="invalid-feedback">
                        	<strong>{{ $errors->first('username') }}</strong>
                    	</span>
                	@endif
	            </div>
				
	            <div class="form-group">
	                <label for="password" style="color: black;font-weight: 500;">Password</label>
	                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password akun anda" style="padding-top: 5px;padding-bottom: 5px;">

	                @if ($errors->has('password'))
                    	<span class="invalid-feedback">
                        	<strong>{{ $errors->first('password') }}</strong>
                    	</span>
                	@endif
	            </div>


	            <button type="submit" class="btn" style="float: right;background-color: #E32F43;color: white;margin-bottom: 40px;">Masuk</button>
	        </form>
        </div>
    </div>
</header>
@endsection
