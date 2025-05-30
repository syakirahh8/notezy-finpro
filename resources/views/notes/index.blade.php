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
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
<div class="d-flex">
 <!-- Sidebar -->
  <div class="d-flex flex-column align-items-center sidebar">
  <!-- Tombol Tambah -->
 <div class="text-center" data-aos="fade-up">
    <a href="{{ route('notes.create') }}" class="add-note-btn">
      <i class="fa-solid fa-plus"></i>
    </a>
  </div>

   {{-- Tombol Favorite --}}
  <div class="text-center" data-aos="fade-up" data-aos-delay="200">
  <a href="{{ route('notes.favorites') }}" class="fav-btn">
    <i class="bi bi-heart-fill"></i>
  </a>
</div>


  <!-- Tombol Trash di Sidebar -->
  <div class="text-center" data-aos="fade-up" data-aos-delay="300">
  <a href="{{ route('notes.trash') }}" class="trash-btn">
    <i class="bi bi-trash3-fill"></i>
  </a>
</div>

  <!-- List Notes -->
  <div class="d-flex flex-column gap-3 w-100 align-items-center" data-aos="fade-up" data-aos-delay="400">
    @forelse ($latestNotes as $note)
      <div class="card note-item text-start border-0 text-white">
        <a href="{{ route('notes.show', $note->id) }}"
           class="note-title">
           {{ $note->title }}
        </a>
        <br>
        <small class="note-date">Created on: {{ $note->created_at->format('d M Y') }}</small>
      </div>
    @empty
      <div class="text-center text-muted pt-5">You don't have any notes yet</div>
    @endforelse
  </div>
</div>

  <!-- Konten Utama -->
  <div class="main-content w-100">
    <h1 class="fw-semibold pb-5" data-aos="fade-up" data-aos-delay="200">Notes</h1>

    <!-- Notes Content -->
    <div class="row row-cols-1 row-cols-md-3 g-3" data-aos="fade-up" data-aos-delay="300">
      @foreach ($allNotes as $note)
    <div class="col">
      <div class="card border-0 shadow-sm">
        <div class="card-body" data-aos="fade-up" >
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title text-white mb-0">{{ $note->title }}</h5>
            <form action="{{ route('notes.toggleFavorite', $note->id) }}" method="POST">
              @csrf
            <button type="submit" class="love-btn-no-bg">
            @if($note->favorite)
            <i class="bi bi-heart-fill text-danger"></i> {{-- Kalau favorite, icon fill warna merah --}}
            @else
            <i class="bi bi-heart text-white"></i> {{-- Kalau bukan favorite, icon kosong --}}
          @endif
            </button>
        </form>

          </div>
          <p class="card-text fw-medium text-white mt-2" style="font-size: 15px;">{{ $note->content }}</p>
          <div class="d-flex justify-content-between align-items-center mt-2">
            <div class="note-date">
              <p class="text-white">Created on: {{ $note->created_at->format('d M Y') }}</p>
            </div>
            <a href="{{ route('notes.show', $note->id) }}" class="button-view">
              <i class="fa-solid fa-pencil"></i>
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