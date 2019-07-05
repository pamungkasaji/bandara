
	<!--PAGE CONTENT -->
        <div id="content">   
		
            <div class="inner" style="min-height: 700px;">
			    <hr />
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penilaian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
							//Form ini bisa dipakai untuk menambah ataupun edit Penilaian
							if(!empty($penilaian[0]['username']))
							{
								echo "Ubah Data Penilaian";
							}
							else
							{
								echo "Tambah Data Penilaian";
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
											//Jika tombol Simpan ditekan, maka jalankan controller Penilaian->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
											if(!empty($penilaian[0]['username']))
											{
												echo form_open_multipart('Penilaian/prosesUbah'); 
											}
											else
											{
												echo form_open_multipart('Penilaian/simpanPenilaian'); 
											}											
										?>
											<!--Label kode_jenis-->
											<div class="form-group">
												<label>Area</label>
												<input class="form-control" name="area" value="<?php echo $this->uri->segment(3);?>" readonly="readonly">
											</div>
											<div class="form-group">
												<label>Subarea</label>
												<input class="form-control" name="subarea" value="<?php echo $this->uri->segment(4);?>" readonly="readonly">
											</div>
											<div class="form-group">
												<label>Nilai</label>
												<SELECT name="nilai" class="form-control">
													<OPTION value="<?php echo isset($penilaian[0]['nilai'])?$penilaian[0]['nilai']:'';?>"><?php echo isset($penilaian[0]['nilai'])?$penilaian[0]['nilai']:'';?></OPTION>
													<OPTION value="Laki-Laki">Bersih</OPTION>
													<OPTION value="Perempuan">Tidak</OPTION>
												</SELECT>
											</div>
										<button type="submit" class="btn btn-success" name="save">Simpan</button>
										<a href="<?php echo site_url('Penilaian'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
                                </div>
								
                               
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
						
						<!--  -->
						
                    </div>
                    <!-- /.panel -->
			
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
            <!-- /.row -->
		</div>

    </div>
    <!--END PAGE CONTENT -->
