<!-- footer -->
  <div class="footer-bg  d-flex justify-content-between align-items-center flex-wrap">
    <div class="text-start">
      <div class="footer-title fw-bold mb-2">Notezy</div>
      <p class="footer-lead lead mb-3">
        Got ideas? Plans? Random thoughts? Jot them all down with Notezy <br>your friendly space to think, write, and
        create.
      </p>

      <div class="d-flex gap-3 mb-3 fs-4">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-whatsapp"></i>
        <i class="bi bi-instagram"></i>
        <i class="bi bi-linkedin"></i>
      </div>
      <div class="copyright">copyright@2025</div>
    </div>
    <div class="col-md-6 text-end">
      <img src="{{ asset('images/nono.svg') }}" alt="eno.pink" class="img-fluid eno-img">
    </div>
  </div>
  <!-- end footer -->

  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
:root {
    --primary: #5668B0;
    --secondary: #CFD72A;
    --pinky: #EC79A2;
    --blacky: #333;
}

.footer-bg {
    background-color: var(--primary);
    border-radius: 1rem 1rem 0 0;
    padding: 0rem 2rem 0rem;
    color: white;
    position: relative;
    overflow: visible;
    min-height: 350px;
    z-index: 1;
    margin-top: 16rem;
}

.footer-text {
    color: white;
    font-size: 3rem;
}

.footer-title {
    font-weight: 700;
    font-size: 8rem;
    color: white;
    font-weight: bold;
    line-height: 1.2;
}

.footer-lead {
    margin-top: 0;
    padding-top: 0;
    line-height: 1.8;
}

.social-icons i {
    font-size: 1.5rem;
    margin-right: 1rem;
    color: white;
    cursor: pointer;
}

.copyright {
    font-size: 0.9rem;
    color: white;
}

.eno-img {
    position: absolute;
    bottom: 45px;
    right: 2.10rem;
    max-height: 500px;
    object-fit: contain;
    z-index: 2;
}
  </style>