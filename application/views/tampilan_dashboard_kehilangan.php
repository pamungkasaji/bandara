


</head>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Kehilangan</h1>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Kehilangan</h6>
            </div>
            <div class="card-body">
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
                      <th>Kontak</th>
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
                      <th>Kontak</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($tabel as $tabel) {
                      // code...
                      echo
                    '<tr>
                      <td>'.$tabel->tanggal.'</td>
                      <td>'.$tabel->area.'</td>
                      <td>'.$tabel->subarea.'</td>
                      <td>
                      <a href="'.base_url().'/gambar/'.$tabel->gambar.'" target="_blank">
                      <img class="img-thumbnail mx-auto d-block" width="150" height="150" src="'.base_url().'/gambar/'.$tabel->gambar.'">
                      </a>
                      </td>
                      <td>'.$tabel->keterangan.'</td>
                      <td>'.$tabel->kontak.'</td>
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
