
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Data Karyawan </h2>
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
							<a href="<?php echo site_url('Karyawan/tambahKaryawan'); ?>">
								<button type="button" class="btn btn-primary"><i class="icon-plus icon-white"> </i> Tambah</button>
							</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>username</th>
											<th>Nama</th>
											<th>Divisi</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									//jika data Karyawan tidak kosong maka jalankan perintah dibawah ini
									if(!empty($karyawan))
									{
										//load data Karyawan
										foreach ($karyawan as $data)
										{
											$username		=$data['username']; 
											$nama			=$data['nama']; 
											$level       	=$data['level']; 

									?>	
                                        <tr class="odd gradeX">
										    <td><?php echo $username; ?></td>
                                            <td><?php echo $nama; ?></td>
											<td><?php echo $level; ?></td>
                                            <td>
												<a class="btn btn-info" href="<?php echo site_url()."/Karyawan/ubah?username=".$data['username'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>
											
												<a href="<?php echo site_url()."/Karyawan/hapus?username=".$data['username'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i>  Hapus</a>
												
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
