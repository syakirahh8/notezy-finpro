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
  <div class="note-wrapper">
    <form action="{{ route('notes.update', $note->id) }}" method="POST" class="note-card" data-aos="fade-up" data-aos-delay="200">
      @csrf
      @method('PUT')

      <input type="text" name="title" value="{{ old('title', $note->title) }}" class="text-white" placeholder="Title" required/>
      <textarea  id="content" name="content" class="text-white" placeholder="Put anything here">{{ old('content', $note->content) }}</textarea>

      {{-- Tambahin di tombol voice --}}
        <button type="button" id="voiceBtn" class="voice-btn">
            <i class="bi bi-mic-fill"></i>
            <span class="recording-dots d-none">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            </span>
        </button>

        {{-- Dropdown Bahasa (di samping Save button) --}}
        <div style="position: absolute; bottom: 1.5rem; left: 4rem;">
         <select id="langSelect" class="form-select w-auto">
         <option value="id-ID">Bahasa Indonesia</option>
         <option value="en-US">English</option>
         </select>
        </div>

      <button type="submit" class="save-btn">Update</button>
    </form>
  </div>
</div>

<script>
  // Voice-to-text script
const voiceBtn = document.getElementById('voiceBtn');
const contentField = document.getElementById('content');
const dots = document.querySelector('.recording-dots');
const langSelect = document.getElementById('langSelect');

// Pastikan browser support
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

if (SpeechRecognition) {
  const recognition = new SpeechRecognition();
  recognition.continuous = false;
  recognition.interimResults = false;

  // Saat tombol voice diklik
  voiceBtn.addEventListener('click', () => {
    recognition.lang = langSelect.value; // Bahasa sesuai dropdown
    recognition.start();
    dots.classList.remove('d-none'); // Tampilkan animasi getar
  });

  // Hasil rekaman
  recognition.onresult = (event) => {
    const hasil = event.results[0][0].transcript;
    contentField.value += hasil + " ";
    contentField.classList.add('filled');
  };

  // Rekaman selesai
  recognition.onend = () => {
    dots.classList.add('d-none'); // Sembunyikan animasi getar
  };

  // Error handling
  recognition.onerror = (event) => {
    console.log("Error:", event.error);
    alert("Gagal mengenali suara. Pastikan microphone aktif dan beri izin akses.");
    dots.classList.add('d-none');
  };
} else {
  voiceBtn.disabled = true;
  alert("Browser tidak mendukung Speech Recognition API.");
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
