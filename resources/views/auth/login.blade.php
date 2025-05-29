
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notezy Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      position: relative;
      background-color: #EC79A2;
      padding: 4rem 3rem 3rem;
      border-radius: 1rem;
      width: 350px;
      color: white;
      text-align: center;
      max-width: 400px;
    }

    .mascot-head {
      position: absolute;
      top: -110px;
      left: 100;
      right: 0;
      display: flex;
      justify-content: center;
      padding-top: 2rem;
    }

    .mascot-head img {
      height: 100px;
    }

    .mascot-feet {
      position: absolute;
      bottom: -85px;
      left: 20px;
    }

    h2 {
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 2rem;
    }

    label {
      display: block;
      font-weight: 700;
      text-align: left;
      margin-bottom: 0.2rem;
      margin-top: 1rem;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.6rem 0;
      background-color: transparent !important;
      border: none;
      color: white;
      font-size: 1rem;
      outline: none;
      font-weight: 600;
    }

    input:-webkit-autofill {
    transition: background-color 9999s ease-in-out 0s;
    -webkit-text-fill-color: white !important;
}

    input::placeholder {
      color: rgba(255, 255, 255, 0.7);
      background-color: transparent;
    }

    .btn-login {
      background-color: #CFD72A;
      color: black;
      font-weight: 700;
      border: none;
      border-radius: 999px;
      padding: 0.7rem 2rem;
      cursor: pointer;
      font-size: 1.2rem;
      width: 100%;
      margin-top: 0.5rem;
      transition: all 0.3s ease;
      border: 3px solid #CFD72A;
    }

    .btn-login:hover {
      color: #CFD72A;
      background-color: transparent;
      border: 3px solid #CFD72A;
    }

    .links {
      margin-top: 1rem;
      font-size: 0.85rem;
      font-weight: 600;
      color: rgba(255, 255, 255, 0.85);
    }

    .links a {
      color: inherit;
      text-decoration: underline;
      margin: 0 0.3rem;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <!-- Maskot di atas -->
    <div class="mascot-head">
      <img src="{{ asset('images/nono-setengah.svg')}}" alt="Mascot Head">
    </div>

    <h2>Welcome Back!</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="example@gmail.com" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password"  placeholder="••••••••" required>

      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn-login">
                {{ __('Login') }}
            </button>

      <div class="links">
        <a href="{{ route('register') }}">Don't have an account?</a>
      </div>
    </form>

    <!-- Kaki maskot -->
    <div class="mascot-feet">
      <img src="{{ asset('images/nono-kaki.svg')}}" alt="Mascot Feet" style="height: 80px; width: auto;">
    </div>
  </div>

</body>

</html>

