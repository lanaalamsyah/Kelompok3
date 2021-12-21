@extends('layouts.main')
@section('container')
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2><br>
        <p>Melayani rental perlengkapan pendakian. Melayani jasa PRIVATE TRIP. Melayani jasa transportasi pendaki</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Indramayu</h3>
                <p>Blok.1 RT/01 RW/01 Desa Tunggul Payung, Kec.Lelea</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>SahabatPA@gmail.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>0853 2344 6611</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mt-4 mt-md-0">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
  <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="/about" class="nav-link px-2 text-muted">About us</a></li>
        <li class="nav-item"><a href="/contact" class="nav-link px-2 text-muted">Contact</a></li>
        <li class="nav-item"><a href="/categories" class="nav-link px-2 text-muted">Categories</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2021 Sahabat_Petualang</p>
    </footer>
  </div>

@endsection