
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Kehilangan</h6>
    </div>

    <div class="card-body">
      <form action="<?php echo base_url('Kehilangan/cetakKehilangan') ?>" style="width: 30%" method="post">
        <label>Dari</label>
        <input class="form-control" type='date' name="dari"><br>
        <label>Hingga</label>
        <input class="form-control" type='date' name="hingga"><br>
        <label>Status</label>
        <select class="form-control" name="status">
          <option value="">semua</option>
          <option value="hilang">hilang</option>
          <option value="menemukan">Menemukan</option>
          <option value="dikembalikan">Dikembalikan</option>
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
              <th>Barang</th>
              <th>Tanggal</th>
              <th>Gambar</th>
              <th>Kontak</th>
              <th>Status</th>
              <th>Aksi</th>
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
               $gambar  =$data['gambar']; 
               $keterangan  =$data['keterangan']; 
               $kontak =$data['kontak']; 
               $status =$data['status']; 
               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_barang; ?></td>
                <td><?php echo $tanggal; ?></td>

                <td><img style="width: 50px;" src="<?php echo base_url().'gambar/'.$gambar;?>"></td>
                <td><?php echo $kontak; ?></td>
                <td>

                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $status; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="<?php echo site_url()."/Kehilangan/ubahStatusHilang?id_kehilangan=".$data['id_kehilangan'];?>">Hilang</a>
                      <a class="dropdown-item" href="<?php echo site_url()."/Kehilangan/ubahStatusMenemukan?id_kehilangan=".$data['id_kehilangan'];?>">Menemukan</a>
                      <a class="dropdown-item" href="<?php echo site_url()."/Kehilangan/ubahStatusDikembalikan?id_kehilangan=".$data['id_kehilangan'];?>">Dikembalikan</a>
                    </div>
                  </div>
                </td>
                <td>
                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Kehilangan/hapus?id_kehilangan=".$data['id_kehilangan'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

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
