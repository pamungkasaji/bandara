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
  <script>
    $(document).ready(function() {$("input[type=radio]").click(function() {
      var total = 0;
      $("input[type=radio]:checked").each(function() {
        total += parseFloat($(this).val());
      });
      var n = $( "input[type=radio]" ).length;
      var m = n/2;
      var ratarata = total/m;
      var ratafixed = (ratarata*100).toFixed(0);

      $("input[name*='totalSkor']").val(total);
      $("input[name*='presentase']").val(ratafixed);
    });
  });
</script>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $session['username']; ?></span>
                  <img class="img-profile rounded-circle" src="<?php echo base_url().'/gambar/'.$logo;?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
              <!-- Dropdown - User Information -->


            </ul>

          </nav>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form E-Checksheet untuk Area <?php echo $nama_area ?> dan Sub Area <?php echo $nama_subarea ?></h1>
                  </div>
                  <?php 
                  echo "<br>";
                  if(@$kosong):
                    echo $kosong;
      //Jika update gagal tampilkan Notifikasi error
                  else:  
                    if(@$duplikat){echo @$duplikat;} 
                  endif;

                  ?>
                  <form class="user" method="post" action="<?php echo site_url('MenuTeamleader');?>">
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
                      <textarea class="form-control" name="pentin" id="pentin"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="tinlan">Tindakan Lanjutan</label>
                      <input type="text" class="form-control" name="tinlan" id="tinlan">
                    </div>
                    <div class="form-group">
                      <label for="penlan">Penindak Lanjut</label>
                      <input type="text" class="form-control" name="penlan" id="penlan">
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar Dari Aplikasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan Tombol "Logout" untuk mengakhiri sesi</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('Login/keluar'); ?>">Logout</a>
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
