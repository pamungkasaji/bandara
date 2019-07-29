
</head>

<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Kerusakan</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Keterangan</th>
              <th>Tanggal</th>
              <th>Area</th>
              <th>Subarea</th>
              <th>Gambar</th>
              <th>Status</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
                                    //jika data Subarea tidak kosong maka jalankan perintah dibawah ini
            if(!empty($kerusakan))
            {
                                        //load data Subarea
              $no = 1 ;foreach ($kerusakan as $data)
              {
               $id_kerusakan    =$data['id_kerusakan']; 
               $keterangan  =$data['keterangan']; 
               $tanggal  =$data['tgl_kerusakan']; 
               $nama_area  =$data['area']; 
               $nama_subarea  =$data['subarea']; 
               $gambar  =$data['gambar']; 
               $status  =$data['status']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $keterangan; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $nama_area; ?></td>
                <td><?php echo $nama_subarea; ?></td>
                <td><img style="width: 100px;" src="<?php echo base_url().'gambar/'.$gambar;?>"></td>
                <td><?php echo $status; ?></td>

              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

<!-- Begin Page Content -->
<div class="container-fluid">


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Kehilangan</h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
       <thead>
        <tr>
          <th>No</th>
          <th>Barang</th>
          <th>Tanggal</th>
          <th>Area</th>
          <th>Subarea</th>
          <th>Gambar</th>
          <th>Kontak</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
                                    //jika data Subarea tidak kosong maka jalankan perintah dibawah ini
        if(!empty($kehilangan))
        {
                                        //load data Subarea
          $no = 1 ;foreach ($kehilangan as $data)
          {
           $id_kehilangan    =$data['id_kehilangan']; 
           $nama_barang  =$data['nama_barang']; 
           $tanggal  =$data['tanggal']; 
           $nama_area  =$data['area']; 
           $nama_subarea  =$data['subarea']; 
           $gambar  =$data['gambar']; 
           $keterangan  =$data['keterangan']; 
           $kontak =$data['kontak']; 
           $status =$data['status']; 

           ?> 
           <tr class="odd gradeX">
            <td><?php echo $no++; ?></td>
            <td><?php echo $nama_barang; ?></td>
            <td><?php echo $tanggal; ?></td>
            <td><?php echo $nama_area; ?></td>
            <td><?php echo $nama_subarea; ?></td>
            <td><img style="width: 100px;" src="<?php echo base_url().'gambar/'.$gambar;?>"></td>
            <td><?php echo $kontak; ?></td>
            <td><?php echo $status; ?></td>
          </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Absensi</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Area</th>
              <th>Subarea</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                                    //jika data Subarea tidak kosong maka jalankan perintah dibawah ini
            if(!empty($absensi))
            {
                                        //load data Subarea
              $no = 1 ;foreach ($absensi as $data)
              {
               $id_absensi    =$data['id_absensi']; 
               $nama    =$data['nama']; 
               $tanggal  =$data['tgl_absensi']; 
               $nama_area  =$data['area']; 
               $nama_subarea  =$data['subarea']; 
               $status  =$data['status']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $nama_area; ?></td>
                <td><?php echo $nama_subarea; ?></td>
                <td><?php echo $status; ?></td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Standard Cleanliness Area (SCA)</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Area</th>
              <th>Subarea</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
                                    //jika data Subarea tidak kosong maka jalankan perintah dibawah ini
            if(!empty($penilaian))
            {
                                        //load data Subarea
              $no = 1 ;foreach ($penilaian as $data)
              {
               $id_penilaian    =$data['id_penilaian']; 
               $nama_area  =$data['nama_area']; 
               $nama_subarea  =$data['nama_subarea']; 
               $tanggal  =$data['tanggal']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_area; ?></td>
                <td><?php echo $nama_subarea; ?></td>
                <td><?php echo $tanggal; ?></td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

</html>