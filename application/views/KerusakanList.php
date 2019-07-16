
</head>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Standard Cleanliness Area (SCA)</h6>
    </div>

    <div class="card-body">
      <form action="<?php echo base_url('Penilaian/cetakLaporanrange') ?>" style="width: 50%; method="post">
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
              <th>Nama Barang</th>
              <th>Tanggal</th>
              <th>Gambar</th>
              <th>Keterangan</th>
              <th>Kontak</th>
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
               $nama_area  =$data['nama_area']; 
               $nama_subarea  =$data['nama_subarea']; 
               $gambar  =$data['gambar']; 
               $keterangan  =$data['keterangan']; 
               $kontak =$data['kontak']; 
               $status =$data['status']; 

               ?> 
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_barang; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $gambar; ?></td>
                <td><?php echo $keterangan; ?></td>
                <td><?php echo $kontak; ?></td>
                <td><?php echo $status; ?></td>
                <td>
                  <a class="btn btn-info" target="_blank" href="<?php echo site_url()."kerusakan/cetakLaporansca/".$data['id_kerusakan'];?>"><i class="icon-pencil icon-white"></i> Print</a>

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
