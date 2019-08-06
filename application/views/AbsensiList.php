
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Absensi</h6>
    </div>

    <div class="card-body">
      <form action="<?php echo base_url('Absensi/cetakAbsensi') ?>" style="width: 30%" method="post">
        <label>Dari</label>
        <input class="form-control" type='date' name="dari"><br>
        <label>Hingga</label>
        <input class="form-control" type='date' name="hingga"><br>
        <label>Status</label>
        <select class="form-control" name="status">
          <option value="">semua</option>
          <option value="mangkir">Mangkir</option>
          <option value="hadir">Hadir</option>

        </select><br>
        <input class="btn btn-info" target="_blank" type="submit" value="Print">
      </form>
      <br>
      <?php 
      if(@$sukses):
        echo $sukses;
      //Jika update gagal tampilkan Notifikasi error
      else:  
        if(@$error){echo @$error;} 
      endif;

      ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                <td>
                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Absensi/hapus?id_absensi=".$data['id_absensi'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

                </td>
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

</html>
