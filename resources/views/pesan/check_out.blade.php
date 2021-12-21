@extends('layouts.main')
@section('container')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                <li class="breadcrumb-item"><a href="{{ url('/history') }}">History</a></li>
                
              </ol>
            </nav>
        </div>
        <div class="col md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fa fa-shopping-cart"></i> Check Out </h4>
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
                                    <th class="tect-center">Aksi</th>
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
                                    <td class="text-left">Rp. {{ number_format($pesanan_details->jumlah_harga)}}</td>
                                    <td>
                                        <form action="{{ url('check-out') }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id" value="{{ $pesanan_details->id }}">
                                            <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                               <tr>
                                <td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
                                <td><strong> Rp. {{ number_format($pesanan->jumlah_harga) }} </strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}/{{$pesanan_details->pesanan_id}}" class="btn btn-warning" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="fa fa-shopping-cart"></i> Check Out</a>
                                </td>
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