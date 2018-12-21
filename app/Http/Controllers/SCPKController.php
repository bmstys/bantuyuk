<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon;
use Alert;
use App\Bencana;
use App\Kebutuhan;
use App\Barang;
use App\Donasi;
use App\DonasiDonatur;

class SCPKController extends Controller
{
    public function inputanDonatur(Request $request)
    {
    	$validasi_form = false;

    	$this->validate($request,[
            'budget' => 'required|string',
            'beras' => 'required|integer|between:0,100',
            'air' => 'required|integer|between:0,100',
            'obat' => 'required|integer|between:0,100',
            'bubur' => 'required|integer|between:0,100',
            'pembalut' => 'required|integer|between:0,100',
        ]);

        $validasi_form = true;

    	// Validasi total bobot yang di inputkan //
    	if ($validasi_form == true) 
    	{
    		// Hitung jumlah inputan
    		$jumlah_bobot = $request->beras + $request->air + $request->obat + $request->bubur + $request->pembalut;

    		// Cek jumlah inputannya
    		if($jumlah_bobot > 100 || $jumlah_bobot < 100) // Jika lebih dari 100 atau kurang dari 100
    		{
    			// Munculin alert
    			Alert::error('Jumlah bobot yang dimasukan harus 100%', 'Gagal')->autoclose(5000);

    			// Ngirim error untuk dipakai cek javascript
    			$error = array('jumlah' => 'Jumlah bobot yang dimasukan harus 100%');
                return redirect()->back()->withErrors($error, 'gagal'); // Balik ke halaman tadi
    		}
    		else // Kondisi jumlah_bobot = 100 %
    		{
		    	// Penginisiasian Bobot (total 200)
		        $Bobot1 = 60;  // Jumlah Pengungsi
		        // $Bobot2 = 40;  // Tanggal Bencana
		        $Bobot3 = $request->beras;  // Beras
		        $Bobot4 = $request->air;  // Air
		        $Bobot5 = $request->obat;  // Obat
		        $Bobot6 = $request->bubur;  // Bubur
		        $Bobot7 = $request->pembalut;  // Pembalut

		        // Ambil data dari table bencana yang belum closed
		        $data_bencana = Bencana::whereHas('donasis', function ($query) 
		        {
		        	$query->whereDate('close', '>', now());
                })->get();

		        // Deklarasi array untuk tiap kolom kriteria
		        $array_kriterias1 = collect([]); // Jumlah Pengungsi
		        // $array_kriterias2 = collect([]); // Tanggal Bencana
		        $array_kriterias3 = collect([]); // Beras
		        $array_kriterias4 = collect([]); // Air
		        $array_kriterias5 = collect([]); // Obat
		        $array_kriterias6 = collect([]); // Bubur
		        $array_kriterias7 = collect([]); // Pembalut

		        // Masukin data data kriteria ke array
		        foreach ($data_bencana as $bencana) 
		        {
		        	$array_kriterias1->put($bencana->id,$bencana->jml_korban);
		        	// $array_kriterias2->put($bencana->id,$bencana->jml_korban);
		        	$array_kriterias3->put($bencana->id,$bencana->kriteria_kebutuhans->beras);
		        	$array_kriterias4->put($bencana->id,$bencana->kriteria_kebutuhans->air);
		        	$array_kriterias5->put($bencana->id,$bencana->kriteria_kebutuhans->obat);
		        	$array_kriterias6->put($bencana->id,$bencana->kriteria_kebutuhans->bubur);
		        	$array_kriterias7->put($bencana->id,$bencana->kriteria_kebutuhans->pembalut);
		        }

		        // Cari benefit dan cost
		        // Jumlah pengungsi => Benefit 	(Kolom 1)
		        // Tanggal bencana => Cost 		(Kolom 2)
		        // Beras => Benefit 			(Kolom 3)
		        // Air => Benefit 				(Kolom 4)
		        // Obat => Benefit 				(Kolom 5)
		        // Bubur => Benefit  			(Kolom 6)
		        // Pembalult => Benefit 		(Kolom 7)

		        $max_kriteria1 = $array_kriterias1->max();
		        // $max_kriteria2 = $array_kriterias2->min();
		        $max_kriteria3 = $array_kriterias3->max();
		        $max_kriteria4 = $array_kriterias4->max();
		        $max_kriteria5 = $array_kriterias5->max();
		        $max_kriteria6 = $array_kriterias6->max();
		        $max_kriteria7 = $array_kriterias7->max();

		        // Hitung tiap nilai dibagi angka max di kolom nya
		        $array_kriterias1->transform
		        (
		        	function($nilai,$id)use($max_kriteria1,$Bobot1)
		        	{
		        		return ($nilai / $max_kriteria1 * $Bobot1);
		        	}
		        );
		        // $array_kriterias2->transform
		        // (
		        // 	function($nilai,$id)use($max_kriteria2,$Bobot2)
		        // 	{
		        // 		return ($nilai / $max_kriteria2 * $Bobot2);
		        // 	}
		        // );
		        $array_kriterias3->transform
		        (
		        	function($nilai,$id)use($max_kriteria3,$Bobot3)
		        	{
		        		return ($nilai / $max_kriteria3 * $Bobot3);
		        	}
		        );
		        $array_kriterias4->transform
		        (
		        	function($nilai,$id)use($max_kriteria4,$Bobot4)
		        	{
		        		return ($nilai / $max_kriteria4 * $Bobot4);
		        	}
		        );
		        $array_kriterias5->transform
		        (
		        	function($nilai,$id)use($max_kriteria5,$Bobot5)
		        	{
		        		return ($nilai / $max_kriteria5 * $Bobot5);
		        	}
		        );
		        $array_kriterias6->transform
		        (
		        	function($nilai,$id)use($max_kriteria6,$Bobot6)
		        	{
		        		return ($nilai / $max_kriteria6 * $Bobot6);
		        	}
		        );
    			$array_kriterias7->transform
		        (
		        	function($nilai,$id)use($max_kriteria7,$Bobot7)
		        	{
		        		return ($nilai / $max_kriteria7 * $Bobot7);
		        	}
		        );

		        foreach($data_bencana as $bencana)
		        {
		        	$jumlah_pengungsi = $array_kriterias1->get($bencana->id);
		        	// $tanggal_bencana = $array_kriterias2->get($bencana->id);
		        	$beras = $array_kriterias3->get($bencana->id);
		        	$air = $array_kriterias4->get($bencana->id);
		        	$obat = $array_kriterias5->get($bencana->id);
		        	$bubur = $array_kriterias6->get($bencana->id);
		        	$pembalut = $array_kriterias7->get($bencana->id);
		        	$prioritas = $jumlah_pengungsi+$beras+$air+$obat+$bubur+$pembalut;
		        	$bencana->update(['prioritas' => $prioritas]);
		        }
    		}
    	}

    	$prioritas_bencana = Bencana::whereHas('donasis', function ($query) 
        {
        	$query->whereDate('close', '>', now());
        })->orderBy('prioritas', 'DSC')->get();

    	Alert::success('Halaman ini ditampilkan berdasarkan prioritas', 'Sukses')->autoclose(5000);

        return view('prioritasdonasi', ['prioritas_bencana' => $prioritas_bencana]);
    }

    public function donasiScpk($id)
    {
    	$kebutuhan_bencanas = Kebutuhan::where('bencana_id',$id)->get();
    	$kebutuhannya = [];
    	foreach ($kebutuhan_bencanas as $kebutuhan) 
    	{
    		$kebutuhannya[] = $kebutuhan->nama_kebutuhan;
    	}

    	$dataBarangs = Barang::whereIn('nama_barang',$kebutuhannya)->get();

        $donasi = Donasi::find($id);
        $bencana = $donasi->bencana;

        return view('prioritasdonasibarang', [
            'dataBarangs' => $dataBarangs, 
            'bencana' => $bencana,
            'donasi' => $donasi,
            'kebutuhan_bencanas' => $kebutuhan_bencanas
        ])->with('no',1);;
    }

    public function konfirmasiScpk(Request $request)
    {
    	$dataDonasiBarang = $request->all();

        $dataBarang = Barang::whereIn('id', $dataDonasiBarang['barang'])->get();
        
        $grandTotal = 0;
        foreach ($dataBarang as $barang) {
            $grandTotal += $barang->harga * $dataDonasiBarang['jumlah'][$barang->id];
        }
        $dataDonasiBarang['grandTotal'] = $grandTotal;
        
        $request->session()->put('dataDonasiBarang', $dataDonasiBarang);

        return redirect('/scpk/donasi/konfirmasi/'.$request->donasi_id);
    }

    public function konfirmasiBarangScpk(Request $request,$id)
    {
        $dataDonasiBarang = session('dataDonasiBarang');

        $dataBarang = Barang::whereIn('id', $dataDonasiBarang['barang'])->get();

        $bencana = Bencana::where('id',$id)->get();

        return view('prioritasdonasibarangkonfirmasi', [
            'bencana' => $bencana,
            'dataBarang' => $dataBarang,
            'jumlahBarang' => $dataDonasiBarang['jumlah'],
            'grandTotal' => $dataDonasiBarang['grandTotal']
        ]);
    }

    public function konfirmasiScpkAkhir(Request $request)
    {
        $dataDonasiBarang = $request->session()->pull('dataDonasiBarang');

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
}


