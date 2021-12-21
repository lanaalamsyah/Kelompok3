@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Kategori</h3>
          <div class="card-tools">
            <a href="/alat/index" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="/alat/store" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label for="nama_barang">Nama Produk</label>
              <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" id="nama_barang" placeholder="Masukkan Nama barang"> @error('nama_barang')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" id="harga" placeholder="Masukkan Harga"> @error('harga')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="stok">Jumlah</label>
              <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" id="stok" placeholder="Masukkan Jumlah "> @error('stok')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}" id="gambar" placeholder="Masukkan Gambar"> @error('gambar')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="keterangan">keterangan</label>
              <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" id="keterangan" placeholder="Masukkan keterangan"> @error('keterangan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection