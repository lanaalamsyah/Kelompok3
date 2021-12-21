@extends('layouts.main')
@section('container')<br>
<div class="container">
    <div class="row justify-content-center">
      @foreach($barangs as $barang)
        <div class="col-md-4  ">
            <div class="card" style="width: 18rem;">
                <img src="{{ url('images/frendot') }}/{{$barang->gambar}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$barang->nama_barang}}</h5>
                  <p class="card-text">
                        <strong>Harga :</strong> Rp. {{ number_format($barang->harga)}} <br>
                        <strong>Stok :</strong> {{ $barang->stok }} <br>
                        <br>
                        <strong>Keterangan :</strong> <br>
                        {{ $barang->keterangan}}
                    </p>
                  <a href="{{ url("pesanan") }}/{{ $barang->id }}" class="btn btn-dark"><i class="fa fa-shopping-cart"></i> pesanan</a>
                </div>
              </div>
              <br>
        </div>
        @endforeach
    </div>
</div>
@endsection
