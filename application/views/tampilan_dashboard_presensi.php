


</head>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Presensi</h1>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Presensi</h6>
            </div>
            <div class="card-body">
              <form class="user" method="POST" action="<?php echo base_url(); ?>DashboardPresensi">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Masukkan tanggal</span>
                  </div>
                  <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="YYYY-MM-DD" aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($tanggal)){
                    echo $tanggal;
                  } ?>">
                  <input type="submit" class="btn-primary" value="ok" >
                </div>
                </form>
              <div class="input-group input-group-sm mb-3">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Area</th>
                      <th>Sub Area</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama</th>
                      <th>Area</th>
                      <th>Sub Area</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($tabel as $tabel) {
                      // code...
                      echo
                    '<tr>
                      <td>'.$tabel->nama.'</td>
                      <td>'.$tabel->area.'</td>
                      <td>'.$tabel->subarea.'</td>
                      <td>'.$tabel->tgl_absensi.'</td>
                      <td>'.$tabel->status.'</td>
                    </tr>';
                  };
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->


</html>
