@extends('dashboard.dashboard')
@section('content')
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <span type="create" class="btn btn-sm btn-primary">Tambah Laporan</span>
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
          <table class="table table-hover text-nowrap" id="dataTable">
            <thead>
              <tr>
                  <th width="10%">No</th>
                  <th>Id</th>
                  <th>Alamat</th>
                  <th>No Hp</th>
                  <th>Upload Design</th>
                  <th>Rekening</th>
                  <th>Review Pesanan</th>
                  <th>Bukti Pembayaran</th>
                  <th>Tanggal Pesanan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($laporan as $l)
              <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $l->id }}</td>
                  <td class="text-center">{{ $l->alamat }}</td>
                  <td class="text-center">{{ $l->no_hp }}</td>
                  <td class="text-center"><img width="100" src="/storage/custom/{{ $l->Upload_design }}" alt="" srcset=""></td>
                  <td class="text-center">{{ $l->rekening }}</td>
                  <td class="text-center">{{ $l->review_pesanan }}</td>
                  <td class="text-center"><img width="100" src="/storage/pembayaran/{{ $l->bukti_pembayaranphp }}" alt="" srcset=""></td>
                  <td class="text-center">{{ $l->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>

@endsection