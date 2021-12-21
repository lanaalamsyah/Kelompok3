@extends('layouts.main')
@section('container')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($pesanan as $pesanans)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{ $pesanans->tanggal }}</td>
                                <td>
                                    @if($pesanans->status == 1)
                                    Sudah Dibayar
                                    @else
                                    Belum dibayar
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($pesanans->jumlah_harga+$pesanans->kode) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $pesanans->id }}" class="btn btn-warning"><i class="fa fa-info"></i> Detail</a>
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
@endsection
