@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
  <!-- table kategori -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Produk</h4>
          <div class="card-tools">
            <a href="/alat/tambah" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama Produk</th>
                  <th>Harga Produk</th>
                  <th>Jumlah</th>
                  <th class="text-center">Gambar </th>
                  <th>Keterangan</th>
                  <th>Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>@foreach($barangs as $barangs)
                <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td>{{$barangs->nama_barang}}</td>
                <td class="text-right">Rp.{{$barangs->harga}}</td>
                <td class="text-center">{{$barangs->stok}}</td>
                <td>{{$barangs->gambar}}</td>
                <td>{{$barangs->keterangan}}</td>
                <td>
                <a href="/alat/edit/{{ $barangs->id }}" class="btn btn-xs btn-primary">Edit</a>
                <a href="/alat/destroy/{{$barangs->id}}" class="btn btn-xs btn-danger" onclick="return confirm('yakin?');">Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection