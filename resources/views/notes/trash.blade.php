@extends('base')

@section('content')

{{-- bootstrap css --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- google font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
  :root {
    --primary: #5668B0;
    --secondary: #CFD72A;
    --pinky: #EC79A2;
    --blacky: #333;
  }

  .trash-container {
    max-width: 600px;
    margin: 2rem auto;
  }

  .trash-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }

  .btn-back {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: var(--primary);
    color: white;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .btn-back:hover {
    background-color: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
  }

  .trash-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--primary);
  }

  .trash-title i {
    font-size: 1.6rem;
  }

  .trash-card {
    background-color: var(--pinky);
    border-radius: 10px;
    margin-bottom: 1rem;
    padding: 1rem;
    color: black;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }

  .trash-card h5 {
    margin: 0;
    font-weight: 600;
  }

  .trash-card p {
    margin: 0.2rem 0;
  }

  .note-date {
    color: #666;
    font-size: 0.8rem;
    font-style: italic;
  }

  .trash-buttons .btn {
    border-radius: 20px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .btn-restore {
   background-color: var(--secondary);
   color: black;
   border: 2px solid var(--secondary);
   transition: all 0.3s ease;
  }
  .btn-restore:hover {
   background-color: transparent;
   color: var(--secondary);
   border: 2px solid var(--secondary);
 }

  .btn-delete {
   background-color: var(--blacky);
   color: white;
   border: 2px solid var(--blacky);
   transition: all 0.3s ease;
  }
  .btn-delete:hover {
   background-color: transparent;
   color: var(--blacky);
   border: 2px solid var(--blacky);
  }


  .empty-message {
    color: #999;
    font-style: italic;
  }

  .container-fluid {
  padding: 0 2rem; /* Biar ga nempel banget sama pinggir layar */
}

.trash-card {
  width: 100%;
  border-radius: 10px;
  margin: 1rem 0;
  background-color: var(--pinky);
  color: black;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  padding: 1rem;
}

</style>

<div class="container-fluid py-4">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <a href="{{ route('dashboard') }}" class="btn-back">
      <i class="bi bi-arrow-left"></i>
    </a>
    <div class="trash-title d-flex align-items-center gap-2">
      <i class="bi bi-trash3"></i>
      <span>Trash</span>
    </div>
  </div>

  <!-- List Trash Full Width -->
  @forelse ($trashedNotes as $note)
    <div class="trash-card">
      <h5>{{ $note->title }}</h5>
      <p>{{ $note->content }}</p>

      @php
        $deletedAt = \Carbon\Carbon::parse($note->deleted_at);
        $expireAt = $deletedAt->addDays(30);
        $daysLeftDecimal = now()->floatDiffInDays($expireAt, false);
        $daysLeft = floor($daysLeftDecimal);
      @endphp

      <p class="note-date text-white">
        Deleted at: {{ $note->deleted_at->format('d M Y') }}<br>
        @if($daysLeft > 0)
          Akan dihapus permanen dalam {{ $daysLeft }} hari lagi.
        @else
          Catatan ini akan segera dihapus permanen.
        @endif
      </p>

      <div class="d-flex gap-2 trash-buttons">
        <a href="{{ route('notes.restore', $note->id) }}" class="btn btn-restore btn-sm">
          <i class="bi bi-arrow-clockwise"></i> Restore
        </a>
        <form action="{{ route('notes.forceDelete', $note->id) }}" method="POST" onsubmit="return confirm('Hapus permanen catatan ini?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-delete btn-sm">
            <i class="bi bi-trash-fill"></i> Hapus Permanen
          </button>
        </form>
      </div>
    </div>
  @empty
    <p class="empty-message text-center">Trash is empty. Kamu belum punya catatan yang dihapus.</p>
  @endforelse
</div>


@endsection
