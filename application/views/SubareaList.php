
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Data Subarea </h2>
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
							<a href="<?php echo site_url('Subarea/tambahSubarea'); ?>">
								<button type="button" class="btn btn-primary"><i class="icon-plus icon-white"> </i> Tambah</button>
							</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
												 
												<a href="<?php echo site_url()."/Subarea/hapus?id_subarea=".$data['id_subarea'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>
												
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
