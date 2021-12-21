@extends('templates/base')
@section('title','Edit Alat')
@section('container')
<div class="container mt-4">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{url('/daftar')}}">Daftar Alat</a></li>
<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
</ol>
</nav>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 mt-3">
<h3>Form Edit Alat</h3>
<form action="/daftar/update" method="post">
    {{csrf_field()}}
    <div class="form-group">
    <input class="form-control" type="hidden" name="id" id="id" value="{{ $alat->id_alat}}">
    <label for="nama_alat">Nama Alat</label>
    <input class="form-control @error('nama_alat') is-invalid @enderror" type="text" name="nama_alat" value="{{ $alat->nama_alat }}" id="nama_alat" placeholder="Masukkan Nama Siswa"> @error('nama_alat')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
    <label for="harga_produk">Harga produk</label>
    <input class="form-control @error('harga_produk') is-invalid @enderror" type="text" name="harga_produk" value="{{ $alat->harga_produk }}" id="harga_produk" placeholder="Masukan Harga produk">
    @error('harga_produk')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
    <label for="gambar">Gambar</label>
    <input class="form-control @error('gambar') is-invalid @enderror" type="text" name="gambar" value="{{ $alat->gambar }}" id="gambar" placeholder="Masukan Gambar">
    @error('gambar')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group float-right">
    <button class="btn btn-lg btn-danger" type="reset">Reset</button>
    <button class="btn btn-lg btn-primary" type="submit">Submit</button>
    </div>
    </form>
</div>
</div>
</div>
@endsection