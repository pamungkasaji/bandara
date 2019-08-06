
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Standard</h6>
    </div>

    <div class="card-body">
      <a href="<?php echo site_url('Material/tambahMaterial'); ?>">
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
              <th>Nama Material</th>
              <th>Nama Subarea</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                                    //jika data Material tidak kosong maka jalankan perintah dibawah ini
            if(!empty($material))
            {
                                        //load data Material
              $no = 1; foreach ($material as $data)
              {
               $id_material    =$data['id_material']; 
               $nama_material  =$data['nama_material']; 
               $nama_subarea  =$data['nama_subarea']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_material; ?></td>
                <td><?php echo $nama_subarea; ?></td>
                <td>
                  <a class="btn btn-info" href="<?php echo site_url()."/Material/ubah?id_material=".$data['id_material'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>

                  <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Material/hapus?id_material=".$data['id_material'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>

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
