<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\validasi_pesanan;

class LaporanController extends Controller
{
    public function index() {
        $data = array(
            'title' => 'Form Laporan Penjualan',
            'laporan' => validasi_pesanan::all()
        );
        return view('laporan.index', $data);
    }

    public function proses() {
        $data = array('title' => 'Laporan Penjualan');
        return view('laporan.proses', $data);
    }

    public function formulir(Request $request)
    {
        $nama_lengkap = $request->nama_lengkap;
        $alamat = $request->alamat;
        $no_hp = $request->no_hp;
        $rekening = $request->rekening;
        $w3review = $request->w3review;

        if ($request->hasFile('upload_design') && $request->hasFile('bukti_pembayaran')) {
            $ekstensi1 = $request->upload_design->extension();
            $ekstensi2 = $request->bukti_pembayaran->extension();
            $upload_design = time()."_.".$ekstensi1;
            $bukti_pembayaran = time()."_.".$ekstensi2;
            $request->upload_design->storeAs('public/custom/', $upload_design);
            $request->bukti_pembayaran->storeAs('public/pembayaran/', $bukti_pembayaran);
            if ($request->file('upload_design')->isValid() && $request->file('bukti_pembayaran')->isValid()) {
                validasi_pesanan::create([
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'Upload_design' => $upload_design,
                    'rekening' => $rekening,
                    'review_pesanan' => $w3review,
                    'bukti_pembayaranphp' => $bukti_pembayaran,
                ]);
            }
        }

        return redirect('/formulir');
    }
}