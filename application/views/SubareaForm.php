
	<!--PAGE CONTENT -->
        <div id="content">   
		
            <div class="inner" style="min-height: 700px;">
			    <hr />
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Subarea</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
							//Form ini bisa dipakai untuk menambah ataupun edit Subarea
							if(!empty($subarea[0]['id_subarea']))
							{
								echo "Ubah Data Subarea";
							}
							else
							{
								echo "Tambah Data Subarea";
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
											<!--Label kode_jenis-->
											<?php
											if(!empty($subarea[0]['id_subarea']))
											{
											$disabled="readonly";	
											}
											else
											{
											$disabled='';
											}
											?>
										
											<input class="form-control" type="hidden" name="id_subarea" value="<?php echo isset($subarea[0]['id_subarea'])?$subarea[0]['id_subarea']:'';?>" <?php echo $disabled;?>>
							
											<div class="form-group">
												<label>Nama Subarea</label>
												<input class="form-control" name="nama_subarea" value="<?php echo isset($subarea[0]['nama_subarea'])?$subarea[0]['nama_subarea']:'';?>">
											</div>
										<button type="submit" class="btn btn-success" name="save">Simpan</button>
										<a href="<?php echo site_url('Subarea'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
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
