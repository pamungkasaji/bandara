
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Standard</h6>
    </div>

    <div class="card-body">
      <a href="<?php echo site_url('Standard/tambahStandard'); ?>">
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
              <th>Nama Standard Area</th>
              <th>Pertanyaan</th>
              <th>Material</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                                    //jika data Standard tidak kosong maka jalankan perintah dibawah ini
            if(!empty($standard))
            {
                                        //load data Standard
              $no = 1; foreach ($standard as $data)
              {
               $id_standard    =$data['id_standard']; 
               $nama_standard  =$data['nama_standard']; 
               $pertanyaan        =$data['pertanyaan'];
               $nama_material        =$data['nama_material'];

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_standard; ?></td>
                <td><?php echo $pertanyaan; ?></td>
                <td><?php echo $nama_material; ?></td>
                <td>
                  <a class="btn btn-info" href="<?php echo site_url()."/Standard/ubah?id_standard=".$data['id_standard'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>

                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Standard/hapus?id_standard=".$data['id_standard'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

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
