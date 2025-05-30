@extends('base')

@section('content')

  {{-- bootstrap css --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- google font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
{{-- Tambahin Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
{{-- css sendiri --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{-- Tombol Back --}}
<a href="{{ route('dashboard') }}" class="back-btn" data-aos="fade-up"><i class="fa-solid fa-x" data-aos="fade-up"></i></a>

<div class="container-fluid">
  <div class="note-wrapper" data-aos="fade-up" data-aos-delay="200">
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
