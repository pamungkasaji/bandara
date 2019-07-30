


</head>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Kerusakan</h1>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Kerusakan</h6>
            </div>
            <div class="card-body">
              <form class="user" method="POST" action="<?php echo base_url(); ?>DashboardKerusakan">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Sort By</span>
                  </div>
                  <select class="form-control" name="sort" id="sort">
                  <option value="tgl_kerusakan">Tanggal</option>
                  <option value="area">Area</option>
                  <option value="subarea">SubArea</option>
                  </select>
                  <input type="submit" class="btn-primary" value="ok" >
                </div>
                </form>
              <div class="input-group input-group-sm mb-3">
              <div class="table-responsive">
                <table class="table table-bordered display"  id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Area</th>
                      <th>Sub Area</th>
                      <th>Gambar</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama</th>
                      <th>Area</th>
                      <th>Sub Area</th>
                      <th>Gambar</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($tabel as $tabel) {
                      // code...
                      echo
                    '<tr>
                      <td>'.$tabel->tgl_kerusakan.'</td>
                      <td>'.$tabel->area.'</td>
                      <td>'.$tabel->subarea.'</td>
                      <td>
                      <a href="'.base_url().'/gambar/'.$tabel->gambar.'" target="_blank">
                      <img class="img-thumbnail mx-auto d-block" width="150" height="150" src="'.base_url().'/gambar/'.$tabel->gambar.'">
                      </a>
                      </td>
                      <td>'.$tabel->keterangan.'</td>
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
