<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use DB;
use Auth; 
use Carbon\Carbon;
use App\Bencana;
use App\Barang;
use App\Donasi;
use App\DonasiDonatur;
use App\User;
use App\BarangDonasiDonatur;
use App\Realisasi;
use App\KriteriaKebutuhan;
use App\Kebutuhan;
use Alert;

class BpbdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('bpbd');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function tampilMenu()
    {
        return view('menubpbd');
    }

//////////////////////////////////////////////////BENCANA/////////////////////////////////////////////////

    public function tampilBencana()
    {
        return view('updatebencana');
    }

    public function tambahBencana(Request $request)
    {
        $id_sebelumnya = Bencana::whereRaw('id = (select max(`id`) from bencanas)')->get();

        foreach ($id_sebelumnya as $id) 
        {
            $id_yang_disimpan_buat_nama_gambar = $id->id + 1; 
        }

        $nama_gambar_bencana = $request->file_upload->storeAs('bencana', 'bencana-'.$id_yang_disimpan_buat_nama_gambar.'.'. $request->file_upload->extension(), 'public');

        $bencana = Bencana::create([
            'nama' => $request->namaBencana,
            'tanggal' => $request->tanggalBencana,
            'lokasi' => $request->lokasiBencana,
            'jml_korban' => $request->jumlahKorban,
            'gambar_bencana' => $nama_gambar_bencana
        ]);

        $bencana->donasis()->create([
            'open' => $request->bukaDonasi,
            'close' => $request->tutupDonasi
        ]);
        
        foreach ($request->kebutuhan as $i => $kebutuhan) 
        {
            $kebutuhans[] = [
                'nama_kebutuhan' => $request->kebutuhan[$i],
                'satuan' => $request->satuan[$i],
                'jumlah' => $request->jumlah[$i]
            ];

            if(Barang::whereNotIn('nama_barang',$kebutuhans))
            {
                Barang::create([
                    'nama_barang' => $request->kebutuhan[$i],
                    'satuan' => $request->satuan[$i],
                    'harga'=> '0',
                    'gambar'=> "belum ada"
                ]);
            }
        }

        $bencana->kebutuhans()->createMany($kebutuhans);

        $id_bencananya = $id_yang_disimpan_buat_nama_gambar;

        $kriteria = KriteriaKebutuhan::create([
            'bencana_id' => $id_bencananya,
            'beras' => 0,
            'bubur' => 0,
            'air' => 0,
            'pembalut' => 0,
            'popok' => 0
        ]);

        $kebutuhan_bencanas = Kebutuhan::where('bencana_id',$id_bencananya)->get();
        foreach ($kebutuhan_bencanas as $kebutuhan) 
        {
            if($kebutuhan->nama_kebutuhan == "beras" || $kebutuhan->nama_kebutuhan == "Beras")
            {
                $kriteria->beras = $kebutuhan->jumlah;
                $kriteria->save();
            }
            else if($kebutuhan->nama_kebutuhan == "air" || $kebutuhan->nama_kebutuhan == "Air")
            {
                $kriteria->air = $kebutuhan->jumlah;
                $kriteria->save();
            }
            else if($kebutuhan->nama_kebutuhan == "bubur" || $kebutuhan->nama_kebutuhan == "Bubur")
            {
                $kriteria->bubur = $kebutuhan->jumlah;
                $kriteria->save();
            }
            else if($kebutuhan->nama_kebutuhan == "pembalut" || $kebutuhan->nama_kebutuhan == "Pembalut")
            {
                $kriteria->pembalut = $kebutuhan->jumlah;
                $kriteria->save();
            }
            else if($kebutuhan->nama_kebutuhan == "obat" || $kebutuhan->nama_kebutuhan == "Obat")
            {
                $kriteria->obat = $kebutuhan->jumlah;
                $kriteria->save();
            }
        }

        Alert::success('Update bencana sukses dilakukan', 'Sukses')->autoclose(3000);
        
        return redirect('/menubpbd');
    }

/////////////////////////////////////////////////////DONASI MASUK////////////////////////////////////////////////////

    public function tampilDonasiMasuk()
    {
        $donasiMasuks = DonasiDonatur::where('status_id','=',1)->get();

        $ga_ada_donasi_masuk = count($donasiMasuks);

        return view('donasimasuk', ['donasiMasuks' => $donasiMasuks, 'ga_ada_donasi_masuk' => $ga_ada_donasi_masuk])->with('no',1);
    }

    public function tampilDetailDonasiMasuk($id)
    {
        $donasiMasuks = DonasiDonatur::where('id','=',$id)->get();
        $donasinyas = BarangDonasiDonatur::where('donasi_donatur_id','=',$id)->get();
        
        $grandTotal = 0;
        foreach ($donasinyas as $donasinya) {
            $grandTotal += $donasinya->barangs->harga * $donasinya->jumlah;
        }

        return view('detaildonasimasuk', ['donasiMasuks' => $donasiMasuks, 'donasinyas' => $donasinyas, 'grandTotal' => $grandTotal])->with('no',1);
    }

    public function terimaDonasi(Request $request,$id)
    {
        $terima_donasinya = DonasiDonatur::find($id);

            $terima_donasinya->status_id = '2';

        $terima_donasinya->save();

        Alert::success('Donasi diterima', 'Sukses')->autoclose(3000);

        return redirect('/donasimasuk');
    }

/////////////////////////////////////////////// REALISASI /////////////////////////////////////////////////////////

    public function tampilRealisasi()
    {
        // Tampil hanya yang belum close
        // $dataBencanas = Bencana::whereHas('donasis', function ($query) {
        //                             $query->whereDate('close', '>', now());
        //                         })->get();

        $dataBencanas = Bencana::all();
        $now = Carbon::now();

        return view('realisasi', ['dataBencanas' => $dataBencanas,'now' => $now]);
    }

    public function tampilRealisasikan($id)
    {
        $dataBencanas = Donasi::where('bencana_id','=',$id)->get();

        $donasi = Donasi::where('bencana_id','=',$id)->get()->first();
        $donasi_id = $donasi->id;

        $data_donasi_donatur = BarangDonasiDonatur::with('donasiDonaturs')->whereHas('donasiDonaturs', function($query)
            {
                $query->where('status_id','!=',1);
            })->groupBy('barang_id')->selectRaw('*, SUM(jumlah) as jumlahnya')->where('donasi_id','=',$donasi_id)->get();

        // $sudah_direliasasikan = DonasiDonatur::selectRaw('SUM(realisasi) as sudah_realisasikan')->all();
        $sudah_direliasasikan = DonasiDonatur::where('donasi_id', $id)->get()->sum('realisasi');

        return view('realisasikan', ['data_donasi_donatur' => $data_donasi_donatur, 'dataBencanas' => $dataBencanas, 'sudah_realisasi' => $sudah_direliasasikan])->with('no',1);
    }

    public function tampilKonfirmasiPencairan(Request $request,$id,$tot)
    {
        $data_petugas = User::where('id',Auth::user()->id)->get();

        $total = $request->total_yang_bisa_direalisasikan;

        $tanggal_sekarang = Carbon::now();

        $data_bencana = Bencana::find($id);

        return view('realisasikonfirmasi', ['data_petugas' => $data_petugas,'tanggal_sekarang' => $tanggal_sekarang,'bencana' => $data_bencana, 'total' => $total]);
    }

    public function tampilKonfirmasi(Request $request,$id,$tot)
    {
        $data_petugas = User::where('id',Auth::user()->id)->get();

        $total = $tot;

        $tanggal_sekarang = Carbon::now();

        $data_bencana = Bencana::find($id);

        return view('realisasikonfirmasi', ['data_petugas' => $data_petugas,'tanggal_sekarang' => $tanggal_sekarang,'bencana' => $data_bencana, 'total' => $total]);
    }

    public function konfirmasiPencairan(Request $request, $id)
    {
        $total = $request->total_yang_bisa_direalisasikan;
        $realisasi = $request->nominal;

        if($realisasi > $total)
        {
            Alert::error('Jumlah uang yang anda realisasikan melebihi jumlah yang bisa direalisasikan', 'Gagal')->autoclose(5000);

            // return redirect('/konfirmasipencairan/'.$id)->withInput();
            return redirect()->back()->withInput();
        }
        else if($realisasi <= 0)
        {
            Alert::error('Jumlah uang yang anda isikan tidak boleh bernilai dibawah 0', 'Gagal')->autoclose(5000);

            // return redirect('/konfirmasipencairan/'.$id)->withInput();
            return redirect()->back()->withInput();
        }
        else
        {
            $data_realisasi = Realisasi::where('donasi_id', $id)->get();
            foreach($data_realisasi as $realisasi_data)
            {
                $jumlah_realisasi_sebelumnya = $realisasi_data->jumlah_realisasi;
            }

            $ada = count($data_realisasi) > 0;
            
            if($ada)
            {
                Realisasi::where('donasi_id',$id)->update([
                    'nama_petugas' => Auth::user()->nama,
                    'tanggal_realisasi' => Carbon::now(),
                    'donasi_id' => $id,
                    'jumlah_realisasi' => $realisasi + $jumlah_realisasi_sebelumnya
                ]);
            }
            else
            {
                Realisasi::create([
                    'nama_petugas' => Auth::user()->nama,
                    'tanggal_realisasi' => Carbon::now(),
                    'donasi_id' => $id,
                    'jumlah_realisasi' => $realisasi
                ]);
            }

            $donasiDonatur = DonasiDonatur::where('status_id','=',2)->where('donasi_id', $id)->orderBy('created_at')->get();
            foreach ($donasiDonatur as $donasi) 
            {
                if ($donasi->nominal == $donasi->realisasi) 
                {
                    continue;
                }
                elseif ($realisasi >= ($donasi->nominal - $donasi->realisasi))
                {
                    $realisasi -= ($donasi->nominal - $donasi->realisasi);
                    $donasi->realisasi = $donasi->nominal;
                    $donasi->status_id = 3;
                    $donasi->save();
                } 
                elseif ($realisasi <= 0) 
                {
                    break;
                } 
                else 
                {
                    $donasi->realisasi += $realisasi;
                    $realisasi -= $donasi->realisasi;
                    $donasi->save();
                }
            }
            Alert::success('Donasi berhasil dicairkan, silahkan lakukan pencairan di bank atau atm terdekat', 'Sukses')->autoclose(4000);

            return redirect('/realisasi'); 
        }
    }

///////////////////////////////////////////////// UPLOAD BUKTI ///////////////////////////////////////////////////////

    public function tampilRealisasiUploadBukti($id)
    {
        $data_petugas = User::where('id',Auth::user()->id)->get();

        $tanggal_sekarang = Carbon::now();

        $data_bencana = Bencana::find($id);

        return view('realisasiuploadbukti', ['data_petugas' => $data_petugas,'tanggal_sekarang' => $tanggal_sekarang,'bencana' => $data_bencana]);
    }

    public function uploadBukti(Request $request, $id)
    {
        // upload
        $fileName = $request->file_upload->storeAs('bukti', 'bukti-cair-'.$id.'.'. $request->file_upload->extension(), 'public');

        // save nama gambar
        $donasi = Realisasi::where('donasi_id',$id)->get()->first();
        $donasi->bukti = $fileName;
        $donasi->save();

        // ngubah status donasidonatur dari 3 -> 4
        DonasiDonatur::where('donasi_id', $id)->where('status_id', 3)->update([
            'status_id' => 4
        ]);

        Alert::success('Bukti  pencairan berhasil di upload, silahkan lakukan penyaluran bantuan dari donatur', 'Sukses')->autoclose(4000);

        return redirect('/realisasi');
        // return redirect('/coba/'.$id);
    }

    /////////////////////////////////////// UNTUK ALERT //////////////////////////////////////////////////////////

    public function AlertLoginBpbd()
    {
        Alert::success('Anda Berhasil Login', 'Sukses')->autoclose(3000);

        return redirect('/menubpbd');
    }
    
}

