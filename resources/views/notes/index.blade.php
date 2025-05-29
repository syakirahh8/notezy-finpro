@extends('base')
@section('content')
<body>
  {{-- bootstrap css --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- google font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
{{-- Tambahin Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
{{-- css sendiri --}}
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<div class="d-flex">
  <!-- Sidebar -->
  <div class="d-flex flex-column align-items-center sidebar">
  <!-- Tombol Tambah -->
 <div class="text-center">
    <a href="{{ route('notes.create') }}" class="add-btn"
       style="font-size: 28px; color: #fff; background-color: #5b6ea6; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
      +
    </a>
  </div>

  <!-- Tombol Trash di Sidebar -->
  <div class=" text-center mb-4">
  <a href="{{ route('notes.trash') }}" class="add-btn"
     style="font-size: 28px; color: #fff; background-color: var(--secondary); border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
    <i class="bi bi-trash3-fill"></i>
  </a>
</div>

  <!-- List Notes -->
  <div class="d-flex flex-column gap-3 w-100 align-items-center">
    @forelse ($notes as $note)
      <div class="card note-item text-start border-0">
        <a href="{{ route('notes.show', $note->id) }}"
           class="note-title">
           {{ $note->title }}
        </a>
        <br>
        <small class="note-date" style="color: #666;">Created on: {{ $note->created_at->format('d M Y') }}</small>
      </div>
    @empty
      <div class="text-center text-muted pt-5">You don't have any notes yet</div>
    @endforelse
  </div>
</div>

  <!-- Konten Utama -->
  <div class="main-content w-100">
    <h1 class="fw-semibold pb-5">Notes</h1>

    <!-- Notes Content -->
    <div class="row row-cols-1 row-cols-md-3 g-3">
      @foreach ($notes as $note)
        <div class="col">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">{{ $note->title }}</h5>
              <p class="card-text fw-medium" style="font-size: 15px; color: #2b2a2a;">{{ $note->content }}</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <div class="note-date">
                  <p>Created on: {{ $note->created_at->format('d M Y') }}</p>
                </div>
                <a href="{{ route('notes.show', $note->id) }}" class="btn button-view">
                  <i class="bi bi-pencil"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection