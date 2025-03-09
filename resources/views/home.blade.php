@extends('layouts.app')

@section('title', 'Kritik & Saran - SMK Telkom Lampung')

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Hero Section -->
    <section id="hero-animation">
      <div id="landingHero" class="section-py landing-hero position-relative">
        <div class="container">
          <div class="hero-text-box text-center position-relative">
            <h1 class="text-primary hero-title display-6 fw-extrabold">
              Suara Anda Penting Bagi Kami
            </h1>
            <h2 class="hero-sub-title h6 mb-6">
              Platform Kritik dan Saran untuk Pengembangan<br class="d-none d-lg-block" />
              SMK Telkom Lampung yang Lebih Baik
            </h2>
            <div class="landing-hero-btn d-inline-block position-relative">
              <a href="#landingContact" class="btn btn-primary btn-lg">Sampaikan Aspirasi Anda</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
      <div class="container">
        <div class="text-center mb-4">
          <span class="badge bg-label-primary">Kritik & Saran</span>
        </div>
        <h4 class="text-center mb-1">
          <span class="position-relative fw-extrabold z-1"
            >Formulir
            <img
              src="../../assets/img/front-pages/icons/section-title-icon.png"
              alt="laptop charging"
              class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
          </span>
          Pengaduan
        </h4>
        <p class="text-center mb-12 pb-md-4">Sampaikan kritik, saran, atau aspirasi Anda untuk kemajuan SMK Telkom Lampung</p>
        <div class="row g-6">
          <div class="col-lg-5">
            <div class="contact-img-box position-relative border p-2 h-100">
              <img
                src="../../assets/img/front-pages/icons/contact-border.png"
                alt="contact border"
                class="contact-border-img position-absolute d-none d-lg-block scaleX-n1-rtl" />
              <img
                src="../../assets/img/front-pages/landing-page/contact-customer-service.png"
                alt="contact customer service"
                class="contact-img w-100 scaleX-n1-rtl" />
              <div class="p-4 pb-2">
                <div class="row g-4">
                  <div class="col-md-6 col-lg-12 col-xl-6">
                    <div class="d-flex align-items-center">
                      <div class="badge bg-label-primary rounded p-1_5 me-3">
                        <i class="icon-base ti tabler-mail icon-lg"></i>
                      </div>
                      <div>
                        <p class="mb-0">Email</p>
                        <h6 class="mb-0">
                          <a href="mailto:example@gmail.com" class="text-heading">example@gmail.com</a>
                        </h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-12 col-xl-6">
                    <div class="d-flex align-items-center">
                      <div class="badge bg-label-success rounded p-1_5 me-3">
                        <i class="icon-base ti tabler-phone-call icon-lg"></i>
                      </div>
                      <div>
                        <p class="mb-0">Phone</p>
                        <h6 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+1234 568 963</a></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="card h-100">
              <div class="card-body">
                <h4 class="mb-2">Send a message</h4>
                <p class="mb-6">
                  If you would like to discuss anything related to payment, account, licensing,<br
                    class="d-none d-lg-block" />
                  partnerships, or have pre-sales questions, you’re at the right place.
                </p>
                <form id="kritikSaranForm">
                  @csrf
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="name" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama_lengkap') }}">
                      <div data-field="nama_lengkap" data-validator="notEmpty">
                          @error('nama_lengkap') {{ $message }} @enderror
                      </div>
                  </div>
              
                  <div class="mb-3">
                      <label for="role" class="form-label">Status</label>
                      <select class="form-select" id="role" name="status_pengirim">
                          <option selected disabled>Pilih status Anda</option>
                          <option value="student" {{ old('status_pengirim') == 'student' ? 'selected' : '' }}>Siswa</option>
                          <option value="parent" {{ old('status_pengirim') == 'parent' ? 'selected' : '' }}>Orang Tua</option>
                          <option value="teacher" {{ old('status_pengirim') == 'teacher' ? 'selected' : '' }}>Guru</option>
                          <option value="other" {{ old('status_pengirim') == 'other' ? 'selected' : '' }}>Lainnya</option>
                      </select>
                      <div data-field="status_pengirim" data-validator="notEmpty">
                          @error('status_pengirim') {{ $message }} @enderror
                      </div>
                  </div>
              
                  <div class="mb-3">
                      <label for="category" class="form-label">Kategori</label>
                      <select class="form-select" id="category" name="kategori">
                          <option selected disabled>Pilih kategori</option>
                          @foreach ($unitTujuan as $unit)
                              <option value="{{ $unit->id }}" {{ old('kategori') == $unit->id ? 'selected' : '' }}>{{ $unit->nama_unit }}</option>
                          @endforeach
                      </select>
                      <div data-field="kategori" data-validator="notEmpty">
                          @error('kategori') {{ $message }} @enderror
                      </div>
                  </div>
              
                  <div class="mb-3">
                      <label for="feedback" class="form-label">Kritik/Saran</label>
                      <textarea class="form-control" id="feedback" name="isi_kritik_saran" rows="5" placeholder="Tuliskan kritik atau saran Anda">{{ old('isi_kritik_saran') }}</textarea>
                      <div data-field="isi_kritik_saran" data-validator="notEmpty">
                          @error('isi_kritik_saran') {{ $message }} @enderror
                      </div>
                  </div>
              
                  <div class="mb-3">
                    <button type="button" id="submitButton" class="btn btn-primary">Kirim Aspirasi</button>
                    {{-- <button class="btn btn-primary" type="button" disabled>
                      <span class="spinner-grow me-1" role="status" aria-hidden="true"></span>
                      Mengirim...
                    </button> --}}
                  </div>
              </form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Us: End -->

    <!-- About Section -->
    <section id="about" class="section-py bg-body">
      <div class="container">
        <div class="text-center mb-4">
          <span class="badge bg-label-primary">Tentang Kami</span>
        </div>
        <h4 class="text-center mb-1">
          <span class="position-relative fw-extrabold z-1">SMK Telkom Lampung</span>
        </h4>
        <p class="text-center mb-5">
          Komitmen Kami untuk Pendidikan Berkualitas
        </p>
        
        <div class="row g-4">
          <div class="col-lg-4 col-sm-6">
            <div class="card h-100">
              <div class="card-body text-center">
                <div class="text-center mb-4 text-primary">
                <svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M13.625 50.8413C11.325 48.5413 12.85 43.7163 11.675 40.8913C10.5 38.0663 6 35.5913 6 32.4663C6 29.3413 10.45 26.9663 11.675 24.0413C12.9 21.1163 11.325 16.3913 13.625 14.0913C15.925 11.7913 20.75 13.3163 23.575 12.1413C26.4 10.9663 28.875 6.46631 32 6.46631C35.125 6.46631 37.5 10.9163 40.425 12.1413C43.35 13.3663 48.075 11.7913 50.375 14.0913C52.675 16.3913 51.15 21.2163 52.325 24.0413C53.5 26.8663 58 29.3413 58 32.4663C58 35.5913 53.55 37.9663 52.325 40.8913C51.1 43.8163 52.675 48.5413 50.375 50.8413C48.075 53.1413 43.25 51.6163 40.425 52.7913C37.6 53.9663 35.125 58.4663 32 58.4663C28.875 58.4663 26.5 54.0163 23.575 52.7913C20.65 51.5663 15.925 53.1413 13.625 50.8413Z" fill="currentColor"></path>
                  <path d="M43 26.4663L28.325 40.4663L21 33.4663M13.625 50.8413C11.325 48.5413 12.85 43.7163 11.675 40.8913C10.5 38.0663 6 35.5913 6 32.4663C6 29.3413 10.45 26.9663 11.675 24.0413C12.9 21.1163 11.325 16.3913 13.625 14.0913C15.925 11.7913 20.75 13.3163 23.575 12.1413C26.4 10.9663 28.875 6.46631 32 6.46631C35.125 6.46631 37.5 10.9163 40.425 12.1413C43.35 13.3663 48.075 11.7913 50.375 14.0913C52.675 16.3913 51.15 21.2163 52.325 24.0413C53.5 26.8663 58 29.3413 58 32.4663C58 35.5913 53.55 37.9663 52.325 40.8913C51.1 43.8163 52.675 48.5413 50.375 50.8413C48.075 53.1413 43.25 51.6163 40.425 52.7913C37.6 53.9663 35.125 58.4663 32 58.4663C28.875 58.4663 26.5 54.0163 23.575 52.7913C20.65 51.5663 15.925 53.1413 13.625 50.8413Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                </div>
                <h5>Pendidikan Berkualitas</h5>
                <p>Menyediakan pendidikan teknologi dan informasi yang berkualitas untuk masa depan siswa</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-sm-6">
            <div class="card h-100">
              <div class="card-body text-center">
                <div class="text-center mb-4 text-primary">
                <svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M31.9999 8.46631C27.1437 8.46489 22.4012 9.93672 18.399 12.6874C14.3969 15.438 11.3233 19.3381 9.58436 23.8723C7.84542 28.4066 7.52291 33.3617 8.65945 38.0831C9.79598 42.8045 12.3381 47.0701 15.9499 50.3163C17.4549 47.3526 19.7511 44.8636 22.5841 43.125C25.417 41.3864 28.676 40.4662 31.9999 40.4663C30.0221 40.4663 28.0887 39.8798 26.4442 38.781C24.7997 37.6822 23.518 36.1204 22.7611 34.2931C22.0043 32.4659 21.8062 30.4552 22.1921 28.5154C22.5779 26.5756 23.5303 24.7938 24.9289 23.3952C26.3274 21.9967 28.1092 21.0443 30.049 20.6585C31.9888 20.2726 33.9995 20.4706 35.8268 21.2275C37.654 21.9844 39.2158 23.2661 40.3146 24.9106C41.4135 26.5551 41.9999 28.4885 41.9999 30.4663C41.9999 33.1185 40.9464 35.662 39.071 37.5374C37.1956 39.4127 34.6521 40.4663 31.9999 40.4663C35.3238 40.4662 38.5829 41.3864 41.4158 43.125C44.2487 44.8636 46.545 47.3526 48.0499 50.3163C51.6618 47.0701 54.2039 42.8045 55.3404 38.0831C56.477 33.3617 56.1545 28.4066 54.4155 23.8723C52.6766 19.3381 49.603 15.438 45.6008 12.6874C41.5987 9.93672 36.8562 8.46489 31.9999 8.46631Z" fill="currentColor"></path>
                  <path d="M32 40.4663C37.5228 40.4663 42 35.9892 42 30.4663C42 24.9435 37.5228 20.4663 32 20.4663C26.4772 20.4663 22 24.9435 22 30.4663C22 35.9892 26.4772 40.4663 32 40.4663ZM32 40.4663C28.6759 40.4663 25.4168 41.3852 22.5839 43.1241C19.7509 44.863 17.4548 47.3524 15.95 50.3163M32 40.4663C35.3241 40.4663 38.5832 41.3852 41.4161 43.1241C44.2491 44.863 46.5452 47.3524 48.05 50.3163M56 32.4663C56 45.7211 45.2548 56.4663 32 56.4663C18.7452 56.4663 8 45.7211 8 32.4663C8 19.2115 18.7452 8.46631 32 8.46631C45.2548 8.46631 56 19.2115 56 32.4663Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                </div>
                <h5>Pengembangan Karakter</h5>
                <p>Membentuk karakter siswa yang berintegritas, disiplin, dan siap untuk dunia kerja</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-sm-6">
            <div class="card h-100">
              <div class="card-body text-center">
                <div class="text-center mb-4 text-primary">
                <svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M13.625 50.8413C11.325 48.5413 12.85 43.7163 11.675 40.8913C10.5 38.0663 6 35.5913 6 32.4663C6 29.3413 10.45 26.9663 11.675 24.0413C12.9 21.1163 11.325 16.3913 13.625 14.0913C15.925 11.7913 20.75 13.3163 23.575 12.1413C26.4 10.9663 28.875 6.46631 32 6.46631C35.125 6.46631 37.5 10.9163 40.425 12.1413C43.35 13.3663 48.075 11.7913 50.375 14.0913C52.675 16.3913 51.15 21.2163 52.325 24.0413C53.5 26.8663 58 29.3413 58 32.4663C58 35.5913 53.55 37.9663 52.325 40.8913C51.1 43.8163 52.675 48.5413 50.375 50.8413C48.075 53.1413 43.25 51.6163 40.425 52.7913C37.6 53.9663 35.125 58.4663 32 58.4663C28.875 58.4663 26.5 54.0163 23.575 52.7913C20.65 51.5663 15.925 53.1413 13.625 50.8413Z" fill="currentColor"></path>
                  <path d="M43 26.4663L28.325 40.4663L21 33.4663M13.625 50.8413C11.325 48.5413 12.85 43.7163 11.675 40.8913C10.5 38.0663 6 35.5913 6 32.4663C6 29.3413 10.45 26.9663 11.675 24.0413C12.9 21.1163 11.325 16.3913 13.625 14.0913C15.925 11.7913 20.75 13.3163 23.575 12.1413C26.4 10.9663 28.875 6.46631 32 6.46631C35.125 6.46631 37.5 10.9163 40.425 12.1413C43.35 13.3663 48.075 11.7913 50.375 14.0913C52.675 16.3913 51.15 21.2163 52.325 24.0413C53.5 26.8663 58 29.3413 58 32.4663C58 35.5913 53.55 37.9663 52.325 40.8913C51.1 43.8163 52.675 48.5413 50.375 50.8413C48.075 53.1413 43.25 51.6163 40.425 52.7913C37.6 53.9663 35.125 58.4663 32 58.4663C28.875 58.4663 26.5 54.0163 23.575 52.7913C20.65 51.5663 15.925 53.1413 13.625 50.8413Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                </div>
                <h5>Fasilitas Modern</h5>
                <p>Dilengkapi dengan fasilitas modern untuk mendukung proses pembelajaran</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<!-- Modal untuk Menampilkan Nomor Tiket -->
<div class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="ticketModalLabel">Tiket Anda</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
              <p>Berikut adalah nomor tiket Anda. Harap disimpan untuk keperluan pengecekan.</p>
              <div class="input-group mb-3">
                  <input type="text" class="form-control text-center" id="ticketNumber" readonly>
                  <button class="btn btn-primary" onclick="copyTicket()">Salin</button>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
      </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
      // Setup CSRF token untuk Laravel
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
      });

      function submitKritikSaran() {
          let submitButton = $('#submitButton'); // Ambil tombol kirim
          let originalButtonHtml = submitButton.html(); // Simpan teks asli tombol

          // Ganti tombol dengan loading spinner & disable sementara
          submitButton.prop('disabled', true).html(`
              <span class="spinner-grow me-1" role="status" aria-hidden="true"></span>
              Mengirim...
          `);

          let formData = {
              nama_lengkap: $('#name').val(),
              status_pengirim: $('#role').val(),
              kategori: $('#category').val(),
              isi_kritik_saran: $('#feedback').val(),
          };

          $.ajax({
              url: "{{ route('kritik-saran.store') }}",
              type: "POST",
              data: formData,
              dataType: "json",
              success: function (response) {
                  if (response.success) {
                      // Tampilkan nomor tiket di dalam modal
                      $('#ticketNumber').val(response.ticket_number);
                      $('#ticketModal').modal('show'); // Tampilkan modal

                      // Reset form setelah sukses
                      $('#kritikSaranForm')[0].reset();
                  }
              },
              error: function (xhr) {
                  let errors = xhr.responseJSON.errors;
                  $('.error-message').text(''); // Hapus pesan error sebelumnya
                  if (errors) {
                      for (let key in errors) {
                          $(`[data-field="${key}"]`).text(errors[key][0]).show();
                      }
                  }
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Harap periksa kembali form Anda!',
                  }).then(() => {
                      // Kembalikan tombol ke keadaan semula
                      // submitButton.prop('disabled', false).html(originalButtonHtml);
                      $('#submitButton').prop('disabled', false).html('Kirim Aspirasi');
                  });                  
              }
          });
      }

      // Event handler untuk tombol submit
      $('#submitButton').click(function (e) {
          e.preventDefault();
          submitKritikSaran();
      });
  });

  // Fungsi untuk menyalin nomor tiket ke clipboard
  function copyTicket() {
      let ticketInput = document.getElementById("ticketNumber");
      ticketInput.select();
      ticketInput.setSelectionRange(0, 99999); // Untuk mobile
      document.execCommand("copy");

      // Tutup modal sebelum menampilkan SweetAlert
      $('#ticketModal').modal('hide');

      // Beri jeda sebentar agar modal benar-benar tertutup sebelum SweetAlert muncul
      setTimeout(() => {
          Swal.fire({
              icon: 'success',
              title: 'Disalin!',
              text: 'Nomor tiket berhasil disalin.',
              timer: 1500,
              showConfirmButton: false
          }).then(() => {
              // Kembalikan tombol ke keadaan semula
              $('#submitButton').prop('disabled', false).html('Kirim Aspirasi');
              // Refresh halaman setelah pesan sukses
              window.location.reload();
          });
      }, 300); // Delay 300ms untuk memastikan modal tertutup dulu
  }

</script>

@endsection