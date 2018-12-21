<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use DB;
use Auth; 
use App\Bencana;
use App\RiwayatDonasi;
use App\Barang;
use App\BarangDonasiDonatur;
use App\Donasi;
use App\DonasiDonatur;
use App\User;
use App\Kebutuhan;
use App\StatusDonasi;
use Carbon\Carbon;
use Hash;
use Redirect;
use Alert;

class DonaturController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function tampilHome()
    {
        return view('homedonatur');
    }

    public function tampilMenu()
    {
        return view('menudonatur');
    }

    public function tampilProfil()
    {
        return view('profildonatur');
    }

//////////////////////////////////////////// TAMPIL RIWAYAT /////////////////////////////////////////////////////////////

    public function tampilRiwayat()
    {
        $id_user = Auth::user()->id;
        $dataDonasis = DonasiDonatur::where('user_id','=',$id_user)->get();

        $ga_ada_riwayat = count($dataDonasis);

        return view('riwayatdonatur', ['dataDonasis' => $dataDonasis, 'ga_ada_riwayat' => $ga_ada_riwayat])->with('no',1);
    }

    public function tampilDetailRiwayat($id)
    {
        $dataDonasi = DonasiDonatur::where('id','=',$id)->first();

        // dd($dataDonasi->id,$dataDonasi->riwayatDonasi->toArray());
        return view('detailriwayatdonatur', ['donasi' => $dataDonasi])->with('no',1);
    }

///////////////////////////////////////////////////// DONASI //////////////////////////////////////////////////////////////

    public function tampilDonasi()
    {
        $dataBencanas = Bencana::whereHas('donasis', function ($query) {
                                    $query->whereDate('close', '>', now());
                                })->get();
        return view('donasi', ['dataBencanas' => $dataBencanas]);
    }

    public function tampilJenisDonasi($id)
    {
        $dataBencanas = Bencana::where('id','=',$id)->with(['donasis','kebutuhans'])->get();

        return view('jenisdonasi', ['dataBencanas' => $dataBencanas]);
    }

////////////////////////////////////////////////// DONASI UANG ////////////////////////////////////////////////////////////////

    public function tampilDonasiUang($id)
    {
        $dataBencanas = Bencana::where('id','=',$id)->with(['donasis','kebutuhans'])->get();

        return view('donasiuang', ['dataBencanas' => $dataBencanas]);
    }

    public function donasiUang(Request $request, $id)
    {
        $this->validate($request,[
            'nominal' => 'required',
        ]);

        // $donasiDonatur = DonasiDonatur::create([
        //     'user_id' => Auth::user()->id,
        //     'donasi_id' => $id,
        //     'status_id' => '1',
        //     'jenis' => $request->jenis,
        //     'nominal' => $request->nominal
        // ]);

        $donasiDonatur = auth()->user()->donasiDonaturs()->create([
            'donasi_id' => $id,
            'status_id' => '1',
            'jenis' => $request->jenis,
            'nominal' => $request->nominal
        ]);

        // $donasiuang = BarangDonasiDonatur::create([
        //     'donasi_donatur_id' => $id,
        //     'barang_id' => '1',
        //     'jumlah' => '1'
        // ]);

        $barangs = [];
        $jumlahBarang = $request->nominal;
        $idBarang = '1';
        $donasi_id = $id;

        $barangs[$idBarang] = ['jumlah' => $jumlahBarang,'donasi_id' => $donasi_id];

        // foreach ($dataDonasiBarang['jumlah'] as $idBarang => $jumlahBarang) 
        // {
        //     if ($jumlahBarang) 
        //     {
        //         $barangs[$idBarang] = ['jumlah' => $jumlahBarang];
        //     }
        // }

        $donasiDonatur->barangs()->attach($barangs);

        Alert::success('Donasi uang sukses dilakukan, silahkan transfer donasi Anda ke ATM Mandiri Syariah BPBD Peduli Bencana dalam tenggat waktu 2x24 jam.', 'Sukses')->autoclose(6000);

        return redirect('/donasi');
    }

///////////////////////////////////////////////////////// DONASI BARANG ////////////////////////////////////////////////////////

    public function tampilDonasiBarang($id)
    {
        $dataBarangs = Barang::where('id','!=','1')->get();
        $donasi = Donasi::find($id);
        $bencana = $donasi->bencana;
        // $bencana = Bencana::where('id','=',$id)->with(['donasis','kebutuhans'])->get()->first();

        return view('donasibarang', [
            'dataBarangs' => $dataBarangs, 
            'bencana' => $bencana,
            'donasi' => $donasi
        ]);
    }

    public function konfirmasiBarang(Request $request)
    {
        $dataDonasiBarang = $request->all();

        $dataBarang = Barang::whereIn('id', $dataDonasiBarang['barang'])->get();
        
        $grandTotal = 0;
        foreach ($dataBarang as $barang) {
            $grandTotal += $barang->harga * $dataDonasiBarang['jumlah'][$barang->id];
        }
        $dataDonasiBarang['grandTotal'] = $grandTotal;
        
        $request->session()->put('dataDonasiBarang', $dataDonasiBarang);

        return redirect('/donasi/jenis/barang/konfirmasi/'.$request->donasi_id);
    }

    public function tampilKonfirmasiBarang(Request $request,$id)
    {
        $dataDonasiBarang = session('dataDonasiBarang');

        $dataBarang = Barang::whereIn('id', $dataDonasiBarang['barang'])->get();

        $bencana = Bencana::where('id',$id)->get();

        return view('konfirmasibarang', [
            'bencana' => $bencana,
            'dataBarang' => $dataBarang,
            'jumlahBarang' => $dataDonasiBarang['jumlah'],
            'grandTotal' => $dataDonasiBarang['grandTotal']

        ]);
    }

    public function konfirmasi(Request $request)
    {
        $dataDonasiBarang = $request->session()->pull('dataDonasiBarang');

        // $donasiDonatur = auth()->user()->donasiDonaturs()->create([
        //     'donasi_id' => $dataDonasiBarang['donasi_id'],
        //     'status_id' => 1,
        //     'jenis' => 'Barang',
        //     'nominal' => $dataDonasiBarang['grandTotal']
        // ]);

        $donasiDonatur = DonasiDonatur::create([
            'user_id' => Auth::user()->id,
            'donasi_id' => $dataDonasiBarang['donasi_id'],
            'status_id' => '1',
            'jenis' => 'Barang',
            'nominal' => $dataDonasiBarang['grandTotal']
        ]);

        $barangs = [];
        foreach ($dataDonasiBarang['jumlah'] as $idBarang => $jumlahBarang) 
        {
            if ($jumlahBarang) 
            {
                $barangs[$idBarang] = ['jumlah' => $jumlahBarang, 'donasi_id' => $dataDonasiBarang['donasi_id']];
            }
        }

        $donasiDonatur->barangs()->attach($barangs);

        session()->forget('dataDonasiBarang');

        Alert::success('Donasi barang sukses dilakukan, silahkan transfer donasi Anda ke ATM Mandiri Syariah BPBD Peduli Bencana dalam tenggat waktu 2x24 jam.', 'Sukses')->autoclose(6000);

        return redirect('donasi');
    }

///////////////////////////////////////////////// EDIT PROFILE ////////////////////////////////////////////////////////////

    public function editProfile(Request $request, $id)
    {
        $this->validate($request,[
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|min:16',
            'alamat' => 'required|string|max:255',
            'noHp' => 'required|string|max:12|min:8',
            'noRek' => 'required|string|max:255',
            'namaRek' => 'required|string|max:255',
        ]);

        $user = User::find($id);

            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->alamat = $request->alamat;
            $user->nik = $request->nik;
            $user->noHp = $request->noHp;
            $user->noRek = $request->noRek;
            $user->namaRek = $request->namaRek;

        $user->save();

        Alert::success('Update profil sukses dilakukan', 'Sukses')->autoclose(3000);

        return redirect('/profil');
    }

    private function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Field current password harus di isi',
        'password.required' => 'Mohon isikan password anda',
      ];

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|string|min:6|confirmed', 
      ], $messages);

      return $validator;
    }

    public function editPassword(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                // return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
                return redirect()->back()->withErrors($validator, 'editPwd');
            }
            else
            {  
                $current_password = Auth::User()->password;
                $sesuai = Hash::check($request_data['current-password'], $current_password);  
                if($sesuai)
                {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save(); 

                    Alert::success('Ubah password sukses dilakukan', 'Sukses')->autoclose(3000);

                    $id = Auth::user()->id;
                    return redirect('/profil');
                }
                else
                {           
                    $error = array('current-password' => 'Password lama tidak sesuai');
                    return redirect()->back()->withErrors($error, 'editPwd');  
                }
            }        
        }
        else
        {
            return redirect('/menu');
        }    
    }

    ///////////////////////////////////////////////////// UNTUK ALERT ///////////////////////////////////////

    public function AlertLoginDonatur()
    {
        Alert::success('Anda Berhasil Login', 'Sukses')->autoclose(3000);

        return redirect('/home');
    }
    
}
