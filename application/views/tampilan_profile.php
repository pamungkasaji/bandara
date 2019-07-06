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
                    <h1 class="h4 text-gray-900 mb-4">Form E-Checksheet untuk Area <?php echo $nama_area ?> dan Sub Area <?php echo $nama_subarea ?></h1>
                  </div>
                  <form class="user" method="post" action="<?php echo base_url(); ?>form/ceksubmit">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Tanggal : <?php
                      $datestring = '%d - %m - %Y';
                      $time = time();
                      echo mdate($datestring, $time);?>
                      " readonly>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="attendant">Nama Attendant</label>
                      <select class="form-control" name="attendant" id="attendant">
                        <?php
                        foreach($attendant as $row)
                        {
                          echo '<option value="'.$row->nama.'">'.$row->nama.'</option>';
                        } ?>
                      </select>
                    </div>

                    <label for="penilaian">Form Penilaian</label>
                    <small id="passwordHelpBlock" class="form-text text-muted">Jawaban Tidak bernilai 0, dan jawaban Iya bernilai 1</small>
                    <div class="container bg-light text-dark rounded-sm" id="penilaian" aria-describedby="info">
                      <br>
                      <?php
                      foreach($standard as $row)
                    {
                      echo '<div class="form-group">
                        <p >'.$row->pertanyaan.'</p>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions'.$row->id_standard.'" id="inlineRadio1" value="0">
                        <label class="form-check-label" for="inlineRadio1">Tidak</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions'.$row->id_standard.'" id="inlineRadio2" value="1">
                        <label class="form-check-label" for="inlineRadio2">Iya</label>
                      </div>
                    </div>';
                    }
                    ?>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Total Skor</span>
                    </div>
                    <input type="text" class="form-control" name="totalSkor" readonly aria-describedby="basic-addon1">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Presentase</span>
                    </div>
                    <input type="text" class="form-control" name="presentase" readonly aria-describedby="basic-addon1">
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>

                  <br>
                </div>

                    <div class="form-group">
                      <label for="kotin">Kode Tinjauan</label>
                      <input type="text" class="form-control" name="kotin" id="kotin">
                    </div>
                    <div class="form-group">
                      <label for="pentin">Penjelasan Tinjauan</label>
                      <textarea class="form-control" name"pentin" id="pentin"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="tinlan">Tindakan Lanjutan</label>
                      <input type="text" class="form-control" name="tinlan" id="tinlan">
                    </div>
                    <div class="form-group">
                      <label for="penlan">Penindak Lanjut</label>
                      <input type="text" class="form-control" name="penlan" id="penlan">
                    </div>
                    <div class="form-group">
                      <label for="hasil">Hasil</label>
                      <input type="text" class="form-control" name="hasil" id="hasil">
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
