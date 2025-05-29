@extends('base')

@section('content')

{{-- bootstrap css --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- google font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
{{-- Tambahin Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  color: black;
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

  /* Tambahan tombol voice note */
     .voice-btn {
      background-color: transparent;
      border: none;
      color: var(--primary);
      font-size: 1.5rem;
      position: absolute;
      bottom: 1.5rem;
      left: 1.5rem;
      cursor: pointer;
    }
    .voice-btn:hover {
      color: var(--secondary);
    }
    
  
.recording-dots {
  display: inline-block;
  margin-left: 5px;
}

.recording-dots .dot {
  display: inline-block;
  width: 5px;
  height: 5px;
  margin: 0 1px;
  background-color: #fff;
  border-radius: 50%;
  animation: blink 1s infinite alternate;
}

.recording-dots .dot:nth-child(2) {
  animation-delay: 0.2s;
}
.recording-dots .dot:nth-child(3) {
  animation-delay: 0.4s;
}

@keyframes blink {
  0% { opacity: 0.2; }
  100% { opacity: 1; }
}

  /* Dropdown Bahasa Style */
/* Dropdown Bahasa Style */
.language-select {
  background-color: rgba(255, 255, 255, 0.8);
  color: var(--blacky);
  border: 2px solid var(--secondary);
  border-radius: 10px;
  padding: 0.2rem 0.5rem;
  font-size: 0.9rem;
  font-weight: 600;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}

select {
  background-color: transparent !important;
  border: none !important;
  color: white !important;
  font-weight: 600 !important;

}

.language-select:focus {
  outline: none;
  box-shadow: 0 0 5px var(--secondary);
  border-color: var(--secondary);
}

.language-select option {
  background-color: transparent;
  color: var(--blacky);
}

.d-none {
  display: none;
}
</style>

{{-- Tombol Back --}}
<a href="{{ route('dashboard') }}" class="back-btn"><i class="fa-solid fa-x"></i></a>

<div class="container-fluid">
  <div class="note-wrapper">
    <form action="{{ route('notes.update', $note->id) }}" method="POST" class="note-card">
      @csrf
      @method('PUT')

      <input type="text" name="title" value="{{ old('title', $note->title) }}" placeholder="Title" required/>
      <textarea  id="content" name="content" placeholder="Put anything here">{{ old('content', $note->content) }}</textarea>

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
