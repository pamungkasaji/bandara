</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kodeqr</h6>
    </div>

    <div class="card-body">
      <a href="<?php echo site_url('Kodeqr/tambahKodeqr'); ?>">
        <button type="button" class="btn btn-primary"><i class="icon-plus icon-white"> </i> Tambah</button>
      </a>
      <br>
      <?php 
      echo "<br>";
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
              <th>Area</th>
              <th>Subarea</th>
              <th>Kode QR</th>
              <th>Aksi</th>

            </tr>
          </thead>
          <tbody>
           <?php
                  //jika data kodeqr tidak kosong maka jalankan perintah dibawah ini
           if(!empty($kodeqr))
           {
                    //load data kodeqr
            $no = 1; foreach ($kodeqr as $data)
            {
              $id_kodeqr    =$data['id_kodeqr']; 
              $area         =$data['nama_area']; 
              $subarea    =$data['nama_subarea']; 
              $qr_code         =$data['qr_code']; 

              ?>  
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $area; ?></td>
                <td><?php echo $subarea; ?></td>
                <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$qr_code;?>"></td>
                <td>
                  <a class="btn btn-info" href="<?php echo site_url()."/Kodeqr/ubah?id_kodeqr=".$data['id_kodeqr'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>

                  <a class="btn btn-info" target="_blank" href="<?php echo site_url()."Kodeqr/pdfdetails/".$data['id_kodeqr'];?>"><i class="icon-pencil icon-white"></i> Print</a>

                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Kodeqr/hapus?id_kodeqr=".$data['id_kodeqr'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

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