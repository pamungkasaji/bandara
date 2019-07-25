<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Angkasa Pura - Form</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form Kerusakan</h1>
                  </div>
                  <hr>

                  <?php echo form_open_multipart('KehilanganForm/aksi_upload/'.$id_karyawan, 'class="user"') ?>
                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input class="form-control" type="text" name="tanggal" id="tanggal" value="<?php
                      $datestring = '%Y-%m-%d';
                      $time = time();
                      echo mdate($datestring, $time);?>
                      " readonly>
                    </div>


                    <div class="form-group">
                      <label for="area">Area</label>
                      <input type="text" class="form-control" name="area" id="area" value="<?php echo $area ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="subarea">Sub Area</label>
                      <input type="text" class="form-control" name="subarea" id="subarea" value="<?php echo $subarea ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                    </div>
                    <div class="form-group">
                      <label for="kontak">Kontak</label>
                      <input type="text" class="form-control" name="kontak" id="kontak">
                    </div>
                    <div class="form-group">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="status1" value="Hilang">
                      <label class="form-check-label" for="status1">Hilang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="status2" value="Ditemukan">
                      <label class="form-check-label" for="status2">Ditemukan</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="status3" value="Dikembalikan">
                      <label class="form-check-label" for="status3">Dikembalikan</label>
                    </div>
                    <div class="form-group">
                      <label for="gambar">Upload Gambar</label>
                    <input type="file" name="gambar" id="gambar"/>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                    </div>
                    <?php
                      $info = $this->session->flashdata('info');
                      if (!empty($info)) {
                          echo "<br /><div class='alert alert-danger' role='alert'>";
                          echo $info."</div>";
                      }

                    ?>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>
                    <hr>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
