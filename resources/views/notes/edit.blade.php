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
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 20px;
    background-color: var(--primary);
    color: white;
    text-decoration: none;
    font-weight: bold;
  }

  .back-btn:hover {
    background-color: var(--secondary);
    color: black;
  }
</style>

{{-- Tombol Back --}}
<a href="{{ route('dashboard') }}" class="back-btn">❌</a>

<div class="container-fluid">
  <div class="note-wrapper">
    <form action="{{ route('notes.update', $note->id) }}" method="POST" class="note-card">
      @csrf
      @method('PUT')

      <input type="text" name="title" value="{{ old('title', $note->title) }}" placeholder="Title" required/>
      <textarea name="content" placeholder="Put anything here">{{ old('content', $note->content) }}</textarea>

      <button type="submit" class="save-btn">Update</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
