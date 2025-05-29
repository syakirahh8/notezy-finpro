<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     {{-- Bootstrap Icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
 <!-- welcome -->
  <!-- Header -->
  <header class="d-flex justify-content-between align-items-center ">
  <div class="px-5 py-2">
    <img src="{{ asset('images/notezy.svg') }}" alt="Notezy Logo" height="98">
  </div>
  <div>
    <a href="{{ route('register') }}" class="btn-register me-2 py-2 px-3">Register</a>
    <a href="{{ route('login') }}" class="btn-login-top py-2 px-3 me-5">Login</a>
  </div>
</header>

<section class="welcome">
<div class="container py-5">
    <div class="row align-items-center">
      <!-- Left (Image) -->
      <div class="col-md-6 text-center">
        <img src="{{ asset('images/eno.svg') }}" alt="Notezy Mascot" class="mascot-img" />
      </div>

      <!-- Right (Text + Button) -->
      <div class="col-md-6 hero-text">
        <h1 class="fw-bold">Hey there!<br>welcome to Notezy</h1>
        <p>Your personal space for all your notes <br> and plans.</p>
        <a href="{{ route('login') }}" class="btn-login-big fw-semibold">Login</a>
      </div>
    </div>
  </div>
</section>

  <!--  why choose us  -->
  <div class="row g-1">

    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="why-card bg-pink text-center py-5 px-5 mx-5">
        <i class="bi bi-hand-index-thumb why-icon"></i>
        <div class="why-title">Effortless & Intuitive</div>
        <div class="why-desc">Designed for simplicity and ease of use, so you can focus on your notes—not the interface.
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="why-card bg-blue text-center py-5 px-5 mx-5">
        <i class="bi bi-shield-lock why-icon"></i>
        <div class="why-title">Secure & Reliable</div>
        <div class="why-desc">Your data is encrypted and safely stored, giving you peace of mind every time.</div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="why-card bg-yellow text-center py-5 px-5 mx-5">
        <i class="bi bi-lightning-charge why-icon"></i>
        <div class="why-title">Boost Productivity</div>
        <div class="why-desc">Packed with smart tools to help you organize, track, and plan effortlessly.</div>
      </div>
    </div>

  </div>
  </div>
  <!-- end why choose us  -->

  <!-- footer -->
  <div class="footer-bg  d-flex justify-content-between align-items-center flex-wrap">
    <div class="text-start">
      <div class="footer-title fw-bold mb-2">Notezy</div>
      <p class="footer-lead lead mb-3">
        Got ideas? Plans? Random thoughts? Jot them all down with Notezy <br>your friendly space to think, write, and
        create.
      </p>

      <div class="d-flex gap-3 mb-3 fs-4">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-whatsapp"></i>
        <i class="bi bi-instagram"></i>
        <i class="bi bi-linkedin"></i>
      </div>
      <div class="copyright">copyright@2025</div>
    </div>
    <div class="col-md-6 text-end">
      <img src="{{ asset('images/nono.svg') }}" alt="eno.pink" class="img-fluid eno-img">
    </div>
  </div>
  <!-- end footer -->

</body>
</html>