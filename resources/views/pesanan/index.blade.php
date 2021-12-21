
@extends('layouts.main')

@section('container')
<div class="container"><br>
    <div class="row"><br>
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('images/frendot') }}/{{ $barang->gambar }}" class="rounded mx-auto d-block" width="100%" alt=""> 
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $barang->nama_barang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga)}}</td>
                                      </tr>
                                    {{-- <tr>
                                        <td>Your Design</td>
                                        <td>
                                            <form action="#" method="post" enctype="multipart/form-data">
                                                <div>
                                                    <input type="file" name="foto"><br><br>
                                                    <button>Upload</button>
                                                </div>
                                        </td>
                                    </tr>  --}}
                                    <tr>
                                        <td>Jumlah</td>
                                        <td>:</td>
                                        <td>
                                            <form method="post" action="{{ url ('pesanan') }}/{{ $barang->id}}">  
                                                @csrf
                                                <input type="text" name="jumlah_pesan" maxlength="2" class="form-control" required="">
                                                <button type="submit" class=" btn btn-warning mt-2 md-4">Masukkan Keranjang</button>
                                                </form>
                                        </td>
                                    </tr>
                                   
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 