<!-- Header -->
  <header class="d-flex justify-content-between align-items-center top-bar">
    <div class="px-5">
    <img src="{{ asset('images/notezy.svg') }}" alt="Notezy Logo" height="98">
  </div>
    <div class="ms-auto d-flex align-items-center">
            @guest
            <a href="{{ route('register') }}" class="btn-register me-2 py-2 px-3">Register</a>
             <a href="{{ route('login') }}" class="btn-login-top py-2 px-3">Login</a>
            @else
                <span class="btn-register me-2 py-2 px-3">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <button class="btn-login-top py-2 px-3">Logout</button>
                </form>
            @endguest

         </div>
  </header>

  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

:root {
    --primary: #5668B0;
    --secondary: #CFD72A;
    --pinky: #EC79A2;
    --blacky: #333;
}
  body {
    background-color: #f3f3f3;
    font-family: 'Segoe UI', sans-serif;
    overflow-x: hidden;
}
.btn-register {
    background-color: var(--secondary);
    color: black;
    font-weight: 600;
    border-radius: 999px;
    text-decoration: none;
}

.btn-login-top {
    background-color: var(--pinky);
    color: black;
    font-weight: 600;
    border-radius: 999px;
    text-decoration: none;

}

.btn-login-big {
    padding: 8px 40px;
    background-color: var(--pinky);
    color: black;
    font-size: 20px;
    border-radius: 999px;
    text-align: center;
    text-decoration: none;
}
  </style>