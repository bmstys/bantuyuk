<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class AlertController extends Controller
{
	public function AlertRegistrasi()
	{
     	Alert::success('Anda Berhasil Registrasi Akun', 'Sukses')->autoclose(3000);

		return redirect('/home');
	}
}
