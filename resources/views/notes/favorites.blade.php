@extends('base')

@section('content')

{{-- bootstrap css --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- google font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
{{-- css --}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="container-fluid py-4">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('dashboard') }}" class="btn-back" data-aos="fade-up">
      <i class="fa-solid fa-arrow-left"></i>
    </a>
    <div class="trash-title d-flex align-items-center gap-2">
      <i class="bi bi-heart-fill" data-aos="fade-up" data-aos-delay="200"></i>
      <span data-aos="fade-up" data-aos-delay="300">Favorite</span>
    </div>
  </div>

  <!-- List Favorites -->
  @forelse ($favorites as $note)
    <div class="trash-card" data-aos="fade-up" data-aos-delay="400">
      <h5>{{ $note->title }}</h5>
      <p class="fw-medium">{{ $note->content }}</p>

      <p class="note-date text-white">
        Created on: {{ $note->created_at->format('d M Y') }}
      </p>

      <div class="d-flex gap-2 pt-3">
        <a href="{{ route('notes.show', $note->id) }}" class="btn btn-restore btn-sm">
          View
        </a>
      </div>
    </div>
  @empty
    <p class="empty-message text-center">You haven't favorited any notes yet.</p>
  @endforelse
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
