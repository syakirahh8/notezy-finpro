@extends('base')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Notezy</title>

  <!-- Bootstrap 5 & Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      overflow: hidden;
      font-family: "Poppins", sans-serif;
    }

    :root {
      --primary: #5668B0;
      --secondary: #CFD72A;
      --pinky: #EC79A2;
      --blacky: #333;
    }

    .sidebar {
      width: 280px;
      background-color: white;
      border-right: 0.5px solid rgba(0, 0, 0, 0.2);
      padding: 1rem;
    }

    .logo {
      height: 100px;
      display: inline-block;
    }

    .add-btn {
      background-color: var(--primary);
      color: black;
      font-size: 24px;
      border: none;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      text-align: center;
      text-decoration: none;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .button-view {
      background-color: black;
      color: white;
      font-size: 25px;
      border: none;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      text-align: center;
      text-decoration: none;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 3px solid black;
    }

    .button-view:hover {
        border: 3px solid black;
        color: black;
        background-color: transparent;
    }

    .card {
        background-color: var(--pinky);
        color: black;
        
    }

    .card-title {
        font-size: 25px;
        font-weight: 600;
    }

    .note-item {
      background-color: var(--secondary);
      padding: 1rem;
      border-radius: 0.5rem;
    }

    .note-title {
      color: #000;
      display: block;
      font-weight: bold;
    }

    .note-date {
      color: #333333;
      font-size: 0.875rem;
      font-weight: 500;
    }

    .main-content {
      padding: 2rem;
      flex-grow: 1;
      overflow-y: auto;
    }
  </style>
</head>
<body>

<div class="d-flex vh-100">
  <!-- Sidebar -->
  <div class="d-flex flex-column align-items-center sidebar">
  <!-- Tombol Tambah -->
  <div class="text-center mb-4">
    <a href="{{ route('notes.create') }}" class="add-btn"
       style="font-size: 28px; color: #fff; background-color: #5b6ea6; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
      +
    </a>
  </div>

  <!-- List Notes -->
  <div class="d-flex flex-column gap-3 w-100 align-items-center">
    @forelse ($notes as $note)
      <div class="note-item text-start"
           style="width: 200px; height: 80px; background-color: #d6d92a; border-radius: 12px; padding: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <a href="{{ route('notes.show', $note->id) }}"
           class="note-title"
           style="font-weight: bold; text-decoration: underline; color: black;">
           {{ $note->title }}
        </a>
        <br>
        <small class="note-date" style="color: #333;">Created on: {{ $note->created_at->format('d M Y') }}</small>
      </div>
    @empty
      <div class="note-item text-center text-muted">Kamu belum punya catatan</div>
    @endforelse
  </div>
</div>

  <!-- Konten Utama -->
  <div class="main-content w-100">
    <h1 class="fw-semibold">Notes</h1>

    <!-- Notes Content -->
    <div class="row row-cols-1 row-cols-md-3 g-3">
      @foreach ($notes as $note)
        <div class="col">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">{{ $note->title }}</h5>
              <p class="card-text fw-medium" style="font-size: 15px; color: #2b2a2a;">{{ $note->content }}</p>
                <div class="d-flex justify-content-between align-items-center mt-2">
                     <div class="note-date">Created on: {{ $note->created_at->format('d M Y') }}</div>
                    <a href="{{ route('notes.show', $note->id) }}" class="btn button-view"><i class="bi bi-pencil"></i></a>
                </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
