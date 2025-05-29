<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notezy Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
        position: relative;
        background-color: #EC79A2;
        padding: 2rem 2.1rem 2rem;
        border-radius: 1rem;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 10px 18px rgba(0, 0, 0, 0.12);
        color: white;
        text-align: center;
    }

    @media (max-width: 768px) {
    .register-container {
         max-width: 90%;
    }
    }
        .mascot-head {
            position: absolute;
            top: -110px;
            left: 280px;
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
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 700;
            text-align: left;
            margin-bottom: 0.3rem;
            margin-top: 0.9rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.55rem 0;
            background: transparent;
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
        }

        .error-message {
            color: #ffd1d1;
            font-size: 0.75rem;
            text-align: left;
            margin-top: 0.2rem;
        }

        .btn-register {
            background-color: #CFD72A;
            color: black;
            font-weight: 700;
            border: none;
            border-radius: 999px;
            padding: 0.6rem 2rem;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
            border: 3px solid #CFD72A;
        }

        .btn-register:hover {
           border: 3px solid #CFD72A;
           color: #CFD72A;
           background-color: transparent;
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
    <div class="register-container mt-2">
        <div class="mascot-head">
            <img src="{{ asset('images/nono-setengah.svg') }}" alt="Mascot Head">
        </div>

        <h2>Create Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="example@gmail.com" value="{{ old('email') }}" required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>

            <button type="submit" class="btn-register">Register</button>

            <div class="links">
                <a href="{{ route('login') }}">Already have an account?</a>
            </div>
        </form>

        <div class="mascot-feet">
            <img src="{{ asset('images/nono-kaki.svg') }}" alt="Mascot Feet" style="height: 80px; width: auto;">
        </div>
    </div>

</body>

</html>