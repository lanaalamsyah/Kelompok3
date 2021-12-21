
  <header class="p-3 bg-warning text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        
        <a class="navbar-brand">
          frenDOT
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="/categories" class="nav-link px-2 text-white">Product</a></li>
          <li><a href="/about" class="nav-link px-2 text-white">About Us</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>
        
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color: white;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1"></i>{{ auth()->user()->name }} 
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <form action="{{ url("/history") }}" method="get">
                @csrf
                <button type="submit" class="dropdown-item">Riwayat pesanan</button>
              </form>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <?php
              $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                if(!empty($pesanan_utama))
                {
                 $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                }
            ?>
            <a class="nav-link" href="{{ url('check-out') }}" style="color: white;">
            <i class="fa fa-shopping-cart"></i>
            @if(!empty($notif))
              <span class="badge badge-danger"> {{ $notif }}</span>
            @endif
            </a>
         </li>
          @else
              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li class="nav-item">
                <a href="/login" style="color: white;" class="nav-link{{("Login")? 'active' : ''}} "><i class=" me-2"></i> Login</a>
              </li>
              <li class="nav-item">
                <a href="/register" style="color: white;"  class="nav-link{{("Register")? 'active' : ''}} "><i class=" me-2"></i>  Register</a>
              </li>
              @endauth
            </ul>
        </ul>
        {{-- <form action="/logout"  method="POST">
          @csrf
       <button type="submit"  class="btn btn-white nav-link px-2 text-white" > Logout</button>
        </form>   --}}

      </div>
    </div>
  </header>