
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Standard Cleanliness Area (SCA)</h6>
    </div>

    <div class="card-body">
      <form action="<?php echo base_url('Kerusakan/cetakLaporanrange') ?>" style="width: 50%" method="post">
        <label>Dari</label>
        <input class="form-control" type='date' name="dari"><br>
        <label>Hingga</label>
        <input class="form-control" type='date' name="hingga"><br>
        <input class="btn btn-info" target="_blank" type="submit" value="Print">
      </form>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Area</th>
              <th>Subarea</th>
              <th>Gambar</th>
              <th>Keterangan</th>
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
               $tanggal  =$data['tgl_kerusakan']; 
               $nama_area  =$data['area']; 
               $nama_subarea  =$data['subarea']; 
               $gambar  =$data['gambar']; 
               $keterangan  =$data['keterangan']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $nama_area; ?></td>
                <td><?php echo $nama_subarea; ?></td>
                <td><img style="width: 50px;" src="<?php echo base_url().'gambar/'.$gambar;?>"></td>
                <td><?php echo $keterangan; ?></td>
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
