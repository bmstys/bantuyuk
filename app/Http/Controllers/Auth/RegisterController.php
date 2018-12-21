<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/proses_registrasi';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|min:16',
            'alamat' => 'required|string|max:255',
            'noHp' => 'required|string|max:12|min:8',
            'noRek' => 'required|string|max:255',
            'namaRek' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'nik' => $data['nik'],
            'alamat' => $data['alamat'],
            'noHp' => $data['noHp'],
            'noRek' => $data['noRek'],
            'namaRek' => $data['namaRek'],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('registrasi');
    }
}
