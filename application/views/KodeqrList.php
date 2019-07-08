
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Data Kodeqr </h2>
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
							<a href="<?php echo site_url('Kodeqr/tambahKodeqr'); ?>">
								<button type="button" class="btn btn-primary"><i class="icon-plus icon-white"> </i> Tambah</button>
							</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Area</th>
											<th>Subarea</th>
                                            <th>QR code</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									//jika data kodeqr tidak kosong maka jalankan perintah dibawah ini
									if(!empty($kodeqr))
									{
										//load data kodeqr
										foreach ($kodeqr as $data)
										{
											$area         =$data['nama_area']; 
											$subarea		=$data['nama_subarea']; 
                                            $qr_code         =$data['qr_code']; 

									?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo $area; ?></td>
											<td><?php echo $subarea; ?></td>
                                            <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$qr_code;?>"></td>
                                            <td>
												<a class="btn btn-info" href="<?php echo site_url()."/Kodeqr/ubah?id_kodeqr=".$data['id_kodeqr'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>

												<a class="btn btn-info" href="<?php echo site_url()."Kodeqr/pdfdetails/".$data['id_kodeqr'];?>"><i class="icon-pencil icon-white"></i> Print</a>

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
            </div>
			</div>
		</div>
       <!--END PAGE CONTENT -->
