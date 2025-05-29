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
    color: black;
  }

  .note-card h2 {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .note-card p {
    font-size: 1.6rem;
    font-weight: 400;
  }

  .action-btns {
    position: absolute;
    bottom: 1.5rem;
    right: 1.5rem;
    display: flex;
    gap: 0.5rem;
  }

  .edit-btn,
  .delete-btn {
    background-color: var(--secondary);
    border: none;
    color: black;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .edit-btn:hover,
  .delete-btn:hover {
    background-color: transparent;
    border: 2px solid var(--secondary);
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
<a href="{{ route('dashboard') }}" class="back-btn"><i class="fa-solid fa-x"></i></a>

<div class="container-fluid">
  <div class="note-wrapper">
    <div class="note-card">
      <h2>{{ $note->title }}</h2>
      <p>{{ $note->content }}</p>

      {{-- Action Buttons --}}
      <div class="action-btns">
        <a href="{{ route('notes.edit', $note->id) }}" class="edit-btn">Edit</a>

        <form id="delete-form" action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="button" id="delete-button" class="delete-btn">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.getElementById('delete-button').addEventListener('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#EC79A2",
      cancelButtonColor: "#5668B0",
      confirmButtonText: "Yes, delete it!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Deleted!",
          text: "Your note has been deleted.",
          icon: "success",
          confirmButtonColor: "#CFD72A"
        }).then(() => {
          document.getElementById('delete-form').submit();
        });
      }
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
