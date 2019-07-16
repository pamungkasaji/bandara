<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Form</title>

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
                    <h1 class="h4 text-gray-900 mb-4">Form Presensi</h1>
                  </div>
                  <hr>

                  <form class="user" method="post" action="<?php echo base_url(); ?>presensi/submit/<?php echo $id_karyawan ?>">
                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input class="form-control" type="text" name="tanggal" id="tanggal" value="<?php
                      $datestring = '%Y-%m-%d';
                      $time = time();
                      echo mdate($datestring, $time);?>
                      " readonly>
                    </div>

                    <div class="form-group">
                      <label for="karyawan">Nama Karyawan</label>
                      <input type="text" class="form-control" name="karyawan" id="karyawan" value="<?php echo $nama_karyawan ?>" readonly>
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
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="absen" id="absen" value="Hadir">
                      <label class="form-check-label" for="absen">Hadir</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="absen" id="absen" value="Mangkir">
                      <label class="form-check-label" for="absen">Mangkir</label>
                    </div>
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
