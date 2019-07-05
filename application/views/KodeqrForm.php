
	<!--PAGE CONTENT -->
        <div id="content">   
		
            <div class="inner" style="min-height: 700px;">
			    <hr />
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Kodeqr</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
							//Form ini bisa dipakai untuk menambah ataupun edit Kodeqr
							if(!empty($kodeqr[0]['id_kodeqr']))
							{
								echo "Ubah Data Kodeqr";
							}
							else
							{
								echo "Tambah Data Kodeqr";
							}
							?>                        
						</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">		
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
											//Jika tombol Simpan ditekan, maka jalankan controller Are->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
											if(!empty($kodeqr[0]['id_kodeqr']))
											{
												echo form_open_multipart('Kodeqr/prosesUbah'); 
											}
											else
											{
												echo form_open_multipart('Kodeqr/simpanKodeqr'); 
											}											
										?>

											<div class="form-group">
												<label>Area</label>
												<SELECT name="id_area" class="form-control">
													<OPTION value="<?php echo isset($kodeqr[0]['id_area'])?$kodeqr[0]['id_area']:'';?>"><?php echo isset($kodeqr[0]['nama_area'])?$kodeqr[0]['nama_area']:'';?></OPTION>
													<?php
													if(!empty($area))
													{
														foreach($area as $data)
														{
															$id_area=$data['id_area'];
															$nama_area=$data['nama_area'];

													?>	

														<OPTION value="<?php echo $id_area;?>"><?php echo $nama_area;?></OPTION>
													<?php
														}
													}
													?>		
												</SELECT>
											</div>

											<div class="form-group">
												<label>Subarea</label>
												<SELECT name="id_subarea" class="form-control">
													<OPTION value="<?php echo isset($kodeqr[0]['id_subarea'])?$kodeqr[0]['id_subarea']:'';?>"><?php echo isset($kodeqr[0]['nama_subarea'])?$kodeqr[0]['nama_subarea']:'';?></OPTION>
													<?php
													if(!empty($subarea))
													{
														foreach($subarea as $data)
														{
															$id_subarea=$data['id_subarea'];
															$nama_subarea=$data['nama_subarea'];

													?>	

														<OPTION value="<?php echo $id_subarea;?>"><?php echo $nama_subarea;?></OPTION>
													<?php
														}
													}
													?>		
												</SELECT>
											</div>
											
										<button type="submit" class="btn btn-success" name="save">Simpan</button>
										<a href="<?php echo site_url('Kodeqr'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
                                </div>
								
                               
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
						
						
						
                    </div>
                    <!-- /.panel -->
			
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
            <!-- /.row -->
		</div>

    </div>
    <!--END PAGE CONTENT -->
