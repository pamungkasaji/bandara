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
                    <h1 class="h4 text-gray-900 mb-4">Data Penilaian berhasil dimasukkan</h1>
                    <h5 class="h5 text-gray-900 mb-4">Untuk Data Karyawan <?php echo $nama_karyawan ?> Area <?php echo $area ?> Sub Area <?php echo $subarea ?></h5>
                  </div>
                  <hr>
                  <div class="text-center">
                  <a class="btn btn-primary" href="<?php echo base_url().'presensi/input/'.$id_karyawan.'/'.$area.'/'.$subarea; ?>" role="button">Presensi</a>
                  <a class="btn btn-success" href="<?php echo base_url().'kerusakanForm/input/'.$id_karyawan.'/'.$area.'/'.$subarea; ?>" role="button" role="button">Kerusakan</a>
                  <a class="btn btn-warning" href="#" role="button">Lost And Found</a>
                </div>
                <?php
                  $info = $this->session->flashdata('info');
                  if (!empty($info)) {
                      echo "<br /><div class='alert alert-danger' role='alert'>";
                      echo $info."</div>";
                  }

                ?>
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
