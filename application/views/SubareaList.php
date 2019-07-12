
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Subarea</h6>
    </div>

    <div class="card-body">
      <a href="<?php echo site_url('Subarea/tambahSubarea'); ?>">
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
              <th>Nama Subarea</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                                    //jika data Subarea tidak kosong maka jalankan perintah dibawah ini
            if(!empty($subarea))
            {
                                        //load data Subarea
              $no = 1; foreach ($subarea as $data)
              {
               $id_subarea    =$data['id_subarea']; 
               $nama_subarea  =$data['nama_subarea']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_subarea; ?></td>
                <td>
                  <a class="btn btn-info" href="<?php echo site_url()."/Subarea/ubah?id_subarea=".$data['id_subarea'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>

                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Subarea/hapus?id_subarea=".$data['id_subarea'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

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
