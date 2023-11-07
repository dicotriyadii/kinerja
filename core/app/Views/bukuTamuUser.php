<?php
  $session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Buku Tamu - KINERJA TIKSAN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">BUKU TAMU TIKSAN</span>
                </a>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Silahkan Isi Data Anda</h5>
                    <p class="text-center small">Silahkan Isi Data Dibawah Ini Dengan Benar</p>
                  </div>
                  <form action="BukuTamu_" method="POST">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tanggal</label>
                      <div class="input-group has-validation">
                        <input type="date" name="tanggal" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Masukkan NIK Anda</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Instansi</label>
                      <div class="input-group has-validation">
                        <input type="text" name="instansi" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Masukkan Instansi Anda</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nama</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nama" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Masukkan Nama</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Jabatan</label>
                      <div class="input-group has-validation">
                        <input type="text" name="jabatan" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Masukkan Jabatan</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nomor Telepon</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nomorTelepon" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Masukkan Nomor Telepon</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tujuan</label>
                      <div class="input-group has-validation">
                        <input type="text" name="tujuan" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Masukkan Tujuan</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Keterangan</label>
                      <div class="input-group has-validation">
                        <input type="text" name="keterangan" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Masukkan Keterangan</div>
                    </div>
                    <br>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                    <div class="col-12" style="text-align:right;margin-top:5px;">
                      <a href="<?=base_url()?>" >Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Sweet Alert -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php 
  $dataSession = $session->get('statusTambah');
  $dataKeterangan = $session->get('keterangan');
  if($dataSession == "Berhasil"){ 
  ?>
  <script> swal("Selamat ! ", "<?= $dataKeterangan; ?>", "success"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  }else if($dataSession == "Gagal"){
  ?>
  <script> swal("Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  } 
  ?>
</body>

</html>