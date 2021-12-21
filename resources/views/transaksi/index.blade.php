@extends('dashboard.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <span type="create" class="btn btn-sm btn-primary">Tambah</span>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input wire:model="search" type="search" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                  <th width="10%">No</th>
                  <th>Id User</th>
                  <th>Tanggal Pesan</th>
                  <th>Status</th>
                  <th>Kode Unik</th>
                  <th>Jumlah Harga</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($checkout as $c)
              <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $c->user_id }}</td> 
                  <td class="text-center">{{ $c->tanggal }}</td>
                  <td class="text-center">{{ $c->status }}</td>  
                  <td class="text-center">{{ $c->kode }}</td>
                  <td class="text-center">{{ $c->jumlah_harga }}</td>
                  <td class="text-center">
                    @if($c->status == 1)
                    Sudah Bayar
                    @elseif($c->status == 0)
                    <form action="{{ url('/confirm_bayar') }}" class="d-inline" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $c->id }}">
                      <button class="btn btn-success btn-sm">
                        Bayar
                      </button>
                    </form>
                    @endif
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
@endsection