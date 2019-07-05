
	<!--PAGE CONTENT -->
        <div id="content">   
		
            <div class="inner" style="min-height: 700px;">
			    <hr />
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Karyawan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
							//Form ini bisa dipakai untuk menambah ataupun edit Karyawan
							if(!empty($karyawan[0]['username']))
							{
								echo "Ubah Data Karyawan";
							}
							else
							{
								echo "Tambah Data Karyawan";
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
											//Jika tombol Simpan ditekan, maka jalankan controller Karyawan->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
											if(!empty($karyawan[0]['username']))
											{
												echo form_open_multipart('Karyawan/prosesUbah'); 
											}
											else
											{
												echo form_open_multipart('Karyawan/simpanKaryawan'); 
											}											
										?>
											<!--Label kode_jenis-->
											<?php
											if(!empty($karyawan[0]['username']))
											{
											$disabled="readonly";	
											}
											else
											{
											$disabled='';
											}
											?>
											<div class="form-group">
												<label>Nama Karyawan</label>
												<input class="form-control" name="nama" value="<?php echo isset($karyawan[0]['nama'])?$karyawan[0]['nama']:'';?>">
											</div>
											<div class="form-group">
												<label>username</label>
												<input class="form-control" name="username" value="<?php echo isset($karyawan[0]['username'])?$karyawan[0]['username']:'';?>" <?php echo $disabled;?>>
											</div>
											<div class="form-group">
												<label>password</label>
												<input class="form-control" type="password" name="password" value="<?php echo isset($karyawan[0]['password'])?$karyawan[0]['password']:'';?>">
											</div>
											<div class="form-group">
												<label>Level</label>
												<SELECT name="level" class="form-control">
													<OPTION value="<?php echo isset($karyawan[0]['level'])?$karyawan[0]['level']:'';?>"><?php echo isset($karyawan[0]['level'])?$karyawan[0]['level']:'';?></OPTION>
													<OPTION value="Laki-Laki">Laki-Laki</OPTION>
													<OPTION value="Perempuan">Perempuan</OPTION>
												</SELECT>
											</div>
										<button type="submit" class="btn btn-success" name="save">Simpan</button>
										<a href="<?php echo site_url('Karyawan'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
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
