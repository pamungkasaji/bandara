

</head>



<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Subarea</h6>
    </div>

    <div class="card-body">
        <a href="#" data-toggle="modal" data-target="#insertModal">
            <button type="button" class="btn btn-primary"><i class="icon-plus icon-white"> </i> Tambah</button>
        </a>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Kode Subarea</th>
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
              foreach ($subarea as $data)
              {
                 $id_subarea	=$data['id_subarea'];
                 $nama_subarea	=$data['nama_subarea'];

                 ?>
                 <tr class="odd gradeX">
                    <td><?php echo $id_subarea; ?></td>
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
                <!-- Logout Modal-->

<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Keluar Dari Aplikasi</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                     <?php
                                            //Jika update Sukses tampilkan Notifikasi sukses
                                            if(@$sukses):
                                            echo $sukses;
                                            echo "<br>";
                                            //Jika update gagal tampilkan Notifikasi error
                                            else:
                                            if(@$error){echo @$error;}
                                            endif;
                                            //Tampilkan Error Validasi
                                            echo validation_errors();
                                            //Jika tombol Simpan ditekan, maka jalankan controller Subarea->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
                                            if(!empty($subarea[0]['id_subarea']))
                                            {
                                                echo form_open_multipart('Subarea/simpanSubarea');
                                            }
                                            else
                                            {
                                                echo form_open_multipart('Subarea/simpanSubarea');
                                            }
                                        ?>


                                            <div class="form-group">
                                                <label>Nama Subarea</label>
                                                <input class="form-control" name="nama_subarea" >
                                            </div>
                                        <button type="submit" class="btn btn-success" name="save">Simpan</button>
                                        <a href="<?php echo site_url('Subarea'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
                                </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?php echo base_url('Login/keluar'); ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Keluar Dari Aplikasi</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                     <?php
                                            //Jika update Sukses tampilkan Notifikasi sukses
                                            if(@$sukses):
                                            echo $sukses;
                                            echo "<br>";
                                            //Jika update gagal tampilkan Notifikasi error
                                            else:
                                            if(@$error){echo @$error;}
                                            endif;
                                            //Tampilkan Error Validasi
                                            echo validation_errors();
                                            //Jika tombol Simpan ditekan, maka jalankan controller Subarea->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
                                            if(!empty($subarea[0]['id_subarea']))
                                            {
                                                echo form_open_multipart('Subarea/prosesUbah');
                                            }
                                            else
                                            {
                                                echo form_open_multipart('Subarea/simpanSubarea');
                                            }
                                        ?>


                                            <div class="form-group">
                                                <label>Nama Subarea</label>
                                                <input class="form-control" name="nama_subarea" value="<?php echo isset($subarea[0]['nama_subarea'])?$subarea[0]['nama_subarea']:'';?>">
                                            </div>
                                        <button type="submit" class="btn btn-success" name="save">Simpan</button>
                                        <a href="<?php echo site_url('Subarea'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
                                </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?php echo base_url('Login/keluar'); ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>


</html>
