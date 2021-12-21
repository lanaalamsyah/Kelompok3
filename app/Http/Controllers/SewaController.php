<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$barang = Barang::where('id', $id)->first();

    	return view('pesanan.index', compact('barang'));
    }
    public function pesanan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
        //note: jika jumlah pesenan melebihi stok maka tidak bisa
        if($request->jumlah_pesan > $barang->stok)
        {
            return redirect('pesanan/' .$id);
        }

        //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //simpan ke database pesanan
        if(empty($cek_pesanan)) //dengan catatan kalau data pesanan sudah ada tidak usah dibuat
        {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id; //yang sedang login kita ambil id nya
            $pesanan->tanggal = $tanggal; //kita memanfaatkan fasilitas laravel yang namanya carbon
            $pesanan->status = 0; //jadi masuk kekeranjang itu 0 dan setelah kita checkout itu makan akan berubah 1
            $pesanan->jumlah_harga = 0; //karena belum menghitung pesanan detail
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }
        //simpan ke database pesanan detail
        //pesanan baru kita membuat variable baru dan ambil pesanan baru yang sudah tersimpan di database
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek pesanan detail
        //menambahkan pesanan (create) 
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id',$pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id =$pesanan_baru->id;    //pesanan_id kita diklarisikan 
            $pesanan_detail->jumlah = $request->jumlah_pesan;   //kita dapet dari request pesanan/index.blade.php di line 49
            $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;  //jumlah harga dapet dari harga x jumlah pesan
            $pesanan_detail->save();
        }else
        {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id',$pesanan_baru->user_id)->first();
            
    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;  //kita dapet dari request pesanan/index.blade.php di line 49
            
            //buat variabel baru utk menghitung jumlah harga update
            $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru; //jumlah harga dapet dari harga x jumlah pesan
            $pesanan_detail->update();
        }

        //total jumlah pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
    	$pesanan->update();
    	
        Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
    	return redirect('check-out');
    }
    //checkout
    public function check_out()
    {
    $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	$pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        }
        
        return view('pesan\check_out', compact('pesanan', 'pesanan_details'));
    }
    public function delete(Request $request)
    {
        $pesanan_detail = PesananDetail::where('id', $request->id)->first();


        $pesanan_detail->delete();

        Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect("/home");
    }
    public function konfirmasi($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        
        if(empty($user->alamat))
        {
            Alert::error('Identitas Harap dilengkapi', 'error');
            return redirect('profil');
        }
        if(empty($user->nohp))
        {
            Alert::error('Identitas Harap dilengkapi', 'error');
            return redirect('profil');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->first();
        $pesanan_id = $id;
        // dd($pesanan_id);
        $pesanan->status = 1;
        $pesanan->update();
        
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_details)
        {
            $barang = Barang::where('id', $pesanan_details->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_details->jumlah;
            $barang->update();
        }
        
        Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('history/'.$pesanan_id);
    }
    public function validasi_pesanan()
    {
        
    }

}

