@extends('base')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  

<style>
  :root {
    --primary: #5668B0;
    --secondary: #CFD72A;
    --pinky: #EC79A2;
    --blacky: #333;
  }

  body {
      font-family: "Poppins", sans-serif;
    }

    .note-wrapper {
      background-color: #fff;
      /* padding: 3rem; */
      /* border-radius: 10px; */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 50px);
    }

    .note-card {
      background-color: var(--pinky);
      border-radius: 15px;
      padding: 2.5rem;
      margin-top: -10rem;
      width: 100%;
      max-width: 1000px;
      min-height: 400px;
      position: relative;
    }

    .note-card input,
    .note-card textarea {
      background-color: transparent;
      border: none;
      outline: none;
      width: 100%;
      transition: color 0.2s;
    }

    .note-card input {
      font-size: 2.8rem;
      font-weight: 700;
    }

    .note-card textarea {
      font-size: 1.6rem;
      font-weight: 400;
      resize: none;
      height: 140px;
      margin-top: 1rem;
    }

    .note-card input::placeholder,
    .note-card textarea::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .note-card input,
    .note-card textarea {
      color: rgba(255, 255, 255, 0.5);
    }

    .note-card input.filled,
    .note-card textarea.filled {
      color: #000;
    }

    .save-btn {
      background-color: var(--secondary);
      border: 3px solid var(--secondary);
      color: black;
      border-radius: 2rem;
      padding: 0.7rem 2rem;
      position: absolute;
      bottom: 1.5rem;
      right: 1.5rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .save-btn:hover {
      background-color: transparent;
      border: 3px solid var(--secondary);
      color: var(--secondary);
    }

    .back-btn {
      display: inline-block;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin: 20px;
      background-color: var(--primary);
      padding: 8px 16px;
      color: white;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }
</style>

{{-- Tombol Back --}}
  <a href="{{ route('dashboard') }}" class="back-btn">x</a>

  <div class="container-fluid">
    <div class="note-wrapper">
      <form action="{{ route('notes.store') }}" method="POST" class="note-card">
        @csrf
        <input type="text" name="title" placeholder="Title" class="form-control-plaintext" required/>
        <textarea name="content" placeholder="Put anything here" class="form-control-plaintext" required></textarea>
        <button type="submit" class="save-btn">Save</button>
      </form>
    </div>
  </div>

  <script>
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach((input) => {
      input.addEventListener('input', () => {
        if (input.value.trim() !== '') {
          input.classList.add('filled');
        } else {
          input.classList.remove('filled');
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
