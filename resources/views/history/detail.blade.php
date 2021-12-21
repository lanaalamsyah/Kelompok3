@extends('layouts.main')
@section('container')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('formulir') }}">Form pemesanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Sukses Check Out</h4>
                    <p>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank MANDIRI Nomer Rekening : 134-00-1482176-2</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></p>
                </div>
            </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5><i class="fa fa-shopping-cart"></i> Detail Pemesanan </h5>
                        @if(!empty($pesanan))
                        <p class="text-right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Id Barang</th>
                                    <th class="text-center">Id Pesanan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Total harga</th>
                                </tr> 
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($pesanan_details as $pesanan_details)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$pesanan_details->barang_id}}</td> 
                                    <td class="text-center">{{$pesanan_details->pesanan_id}}</td>
                                    <td class="text-center">{{$pesanan_details->jumlah}}</td>  
                                    <td class="text-right">Rp. {{ number_format($pesanan_details->jumlah_harga)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
                                    <td class="text-right"><strong> Rp. {{ number_format($pesanan->jumlah_harga) }} </strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Kode Unik :</strong></td>
                                    <td class="text-right"><strong> Rp. {{ number_format($pesanan->kode) }} </strong></td>
                                </tr> 
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total yang harus ditransfer :</strong></td>
                                    <td class="text-right"><strong> Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }} </strong></td>
                                </tr> 
                            </tbody>
                        </table>
                        @endif

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection 