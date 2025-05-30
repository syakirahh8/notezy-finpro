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
                <span class="btn-user me-2 py-2 px-3">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <button class="btn-login-top py-2 px-3">Logout</button>
                </form>
            @endguest

         </div>
  </header>