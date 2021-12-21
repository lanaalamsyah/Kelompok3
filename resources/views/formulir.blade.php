@extends('layouts.main')
@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="alert text-center bg-warning" style=" color:#fff;" role="alert">
            Form Pemesanan 
          </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card" style="background-color: rgb(219, 219, 219);">
                <div class="card-body">
                  <form action="/formulir" method="POST" enctype="multipart/form-data">
                    @csrf
                  <h5 class="card-title" style="color: rgb(46, 45, 45);">Data Pemesan</h5>
                  <hr>
                      
                      <label for="nama" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="" name="nama_lengkap">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="" name="alamat">
                      <label for="no_hp" class="form-label">No Hp</label>
                      <input type="text" class="form-control" id="" name="no_hp">
                      <label for="gambar" class="form-label">Upload Design</label>
                      <input type="file" class="form-control" id="" name="upload_design">
                      
              </div>
            </div>
            </div>
            <div class="col">
              <div class="card" style="background-color: rgb(219, 219, 219);">
                <div class="card-body">
                    <h5 class="card-title" style="color: rgb(46, 45, 45);">Data Pemesanan</h5>
                    <hr>
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          COD - Bayar Langsung Di Tempat pesanan
                        </label>
                    </div> --}}
                    <br>
                    <label for="alamat" class="form-label">Rekening</label>
                      <input type="text" class="form-control" id="" name="rekening">
                      <label for="w3review">Review Pemesanan Anda</label>   
                    <textarea id="w3review" name="w3review" rows="4" cols="50">
                    </textarea>
                    <br>
                   
                    <label for="gambar" class="form-label">Upload bukti pembarayan</label>
                    <input type="file" class="form-control" id="" name="bukti_pembayaran"><br>
                    
                    <button class="btn btn-warning" >Konfirmasi Pembayaran Anda</button>
                    <br>
                    </form>
                    <p>Note: 
                    <br>
                        Apabila tidak dilakukan pembayaran hingga melewati tanggal pesanan maka pemesanan akan dianggap hangus dan otomatis terhapus</p>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
@endsection