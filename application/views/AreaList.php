
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Data Area </h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="well">
                            <a href="<?php echo site_url('Area/tambahArea'); ?>">
                                <button type="button" class="btn btn-primary"><i class="icon-plus icon-white"> </i> Tambah</button>
                            </a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kode Area</th>
                                            <th>Nama Area</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //jika data Area tidak kosong maka jalankan perintah dibawah ini
                                    if(!empty($area))
                                    {
                                        //load data Area
                                        foreach ($area as $data)
                                        {
                                            $id_area =$data['id_area']; 
                                            $nama_area   =$data['nama_area']; 

                                    ?>  
                                        <tr class="odd gradeX">
                                            <td><?php echo $id_area; ?></td>
                                            <td><?php echo $nama_area; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo site_url()."/Area/ubah?id_area=".$data['id_area'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>
                                                 
                                                <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Area/hapus?id_area=".$data['id_area'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>
                                                
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
            </div>
            </div>
        </div>
       <!--END PAGE CONTENT -->
