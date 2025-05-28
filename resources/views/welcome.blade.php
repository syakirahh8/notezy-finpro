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
</head>
<body>
     <!-- Header -->
  <header class="d-flex justify-content-between align-items-center top-bar">
    <div class="fs-4 fw-bold">Notezy</div>
    <div>
      <a href="{{ route('register') }}" class="btn-register me-2 py-2 px-3">Register</a>
      <a href="{{ route('login') }}" class="btn-login-top py-2 px-3">Login</a>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container py-5">
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
  </main>
</body>
</html>