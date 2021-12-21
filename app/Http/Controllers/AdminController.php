<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // mengambil data dari table alat
    $barangs = DB::table('barangs') -> get();
    // mengirim data alat ke view daftar
    return view('alat.index', ['barangs' => $barangs]);
    }

    public function create() 
    {
        // memanggil view create
        return view('alat.tambah');
    }

    public function store(Request $request)
    {
    // untuk validasi form
    $this->validate($request, [
    'nama_barang' => 'required',
    'harga' => 'required',
    'gambar' => 'required',
    'stok'=> 'required',
    'keterangan'=>'required',
    ]);
    DB::table('barangs')->insert([
    'nama_barang' => $request->nama_barang,
    'harga' => $request->harga,
    'gambar' => $request->gambar,
    'stok' => $request->stok,
    'keterangan' => $request->keterangan,
    ]);
    return redirect('/alat')->with('status', 'Data alat Berhasil Ditambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $barangs = DB::table('barangs')->where('id', $id)->first();
    return view('alat.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    $this->validate($request, [
        'nama_barang' => 'required',
        'harga' => 'required',
        'gambar' => 'required',
        'stok'=> 'required',
        'keterangan'=>'required',
    ]);
    DB::table('barangs')->where('id', $request->id)->update([
    'nama_barang' => $request->nama_barang,
    'harga' => $request->harga,
    'gambar' => $request->gambar,
    'stok'=> $request->stok,
    'keterangan'=> $request->keterangan,
    ]);
    return redirect('/alat')->with('status', 'Data Alat Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    DB::table('barangs')->where('id', $id)->delete();
    return redirect('/alat')->with('status', 'Data Alat Berhasil DiHapus');
    }
}
