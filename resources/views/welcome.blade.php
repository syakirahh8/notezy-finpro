@extends ('base')

@section ('content')

<section class="welcome">
<div class="container py-5">
    <div class="row align-items-center">
      <!-- Left (Image) -->
      <div class="col-md-6 text-center" data-aos="fade-up">
        <img src="{{ asset('images/eno-gerak.gif') }}" alt="Notezy Mascot" class="mascot-img" />
      </div>

      <!-- Right (Text + Button) -->
      <div class="col-md-6 hero-text" data-aos="fade-up" data-aos-delay="100">
        <h1 class="fw-bold">Hey there!<br>welcome to Notezy</h1>
        <p class="fw-medium">Your personal space for all your notes <br> and plans.</p>
        <a href="{{ route('login') }}" class="btn-login-big fw-semibold">Login</a>
      </div>
    </div>
  </div>


  <!--  why choose us  -->
<div class="container">
  <div class="row g-1">

    <!-- Card 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="why-card bg-pink text-center py-5 px-5 mx-5">
        <i class="bi bi-hand-index-thumb why-icon"></i>
        <div class="why-title">Effortless & Intuitive</div>
        <div class="why-desc fw-medium">Designed for simplicity and ease of use, so you can focus on your notes—not the interface.</div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="why-card bg-blue text-center py-5 px-5 mx-5">
        <i class="bi bi-shield-lock why-icon"></i>
        <div class="why-title">Secure & Reliable</div>
        <div class="why-desc fw-medium">Your data is encrypted and safely stored, giving you peace of mind every time.</div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="why-card bg-yellow text-center py-5 px-5 mx-5">
        <i class="bi bi-lightning-charge why-icon"></i>
        <div class="why-title">Boost Productivity</div>
        <div class="why-desc fw-medium">Packed with smart tools to help you organize, track, and plan effortlessly.</div>
      </div>
    </div>

  </div>
</div>


  </section>
  <!-- end why choose us  -->
@endsection