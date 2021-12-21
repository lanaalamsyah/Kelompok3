@extends('templates/base')
@section('title','Daftar Alat')
@section('container')
<div class="container mt-4">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
</ol>
</nav>
</div>
<div class="container">
<div class="row">
<div class="my-4 col-12">
<h1 class="float-left">Daftar Produk</h1>
<a class="btn btn-primary float-right mt-2" href="/daftar/tambah" role="button">Tambah Produk</a>
</div>

<!-- ditulis setelah tag </div> penutup Daftar siswa -->
<div class="col-6">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    
    </div>
    <!-- ditulis sebelum tag <div> pembuka tabel -->


<div class="col-12">
<table class="table table-stripped">
<thead class="thead-primary">
<tr>
<th class="text-center">No</th>
<th>Nama Produk</th>
<th>Harga Produk</th>
<th>Gambar</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php $i = 1; ?>@foreach($alat as $alat)
    <tr>
    <td class="text-center">{{$loop->iteration}}</td>
    <td>{{$alat->nama_alat}}</td>
    <td>{{$alat->harga_produk}}</td>
    <td class="text-center">{{$alat->gambar}}</td>
    <td>
    <a href="/daftar/edit/{{ $alat->id_alat }}" class="btn btn-xs btn-primary">Edit</a>
    <a href="/daftar/destroy/{{$alat->id_alat}}" class="btn btn-xs btn-danger" onclick="return confirm('yakin?');">Delete</a>
    </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection