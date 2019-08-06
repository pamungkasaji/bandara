
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Kerusakan</h6>
    </div>

    <div class="card-body">
      <form action="<?php echo base_url('Kerusakan/cetakKerusakan') ?>" style="width: 30%" method="post">
        <label>Dari</label>
        <input class="form-control" type='date' name="dari"><br>
        <label>Hingga</label>
        <input class="form-control" type='date' name="hingga"><br>
        <label>Status</label>
        <select class="form-control" name="status">
          <option value="">semua</option>
          <option value="rusak">rusak</option>
          <option value="diperbaiki">diperbaiki</option>
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
              <th>Keterangan</th>
              <th>Tanggal</th>
              <th>Gambar</th>
              <th>Status</th>
              <th>Aksi</th>
              
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
               $gambar  =$data['gambar']; 
               $status  =$data['status']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $keterangan; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><img style="width: 100px;" src="<?php echo base_url().'gambar/'.$gambar;?>"></td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $status; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="<?php echo site_url()."/Kerusakan/ubahStatusRusak?id_kerusakan=".$data['id_kerusakan'];?>">Rusak</a>
                      <a class="dropdown-item" href="<?php echo site_url()."/Kerusakan/ubahStatusDiperbaiki?id_kerusakan=".$data['id_kerusakan'];?>">Diperbaiki</a>
                    </div>
                  </div>
                </td>
                <td>
                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Kerusakan/hapus?id_kerusakan=".$data['id_kerusakan'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

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
