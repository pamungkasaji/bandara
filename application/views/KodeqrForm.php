</head>

<!--PAGE CONTENT -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php
			//Form ini bisa dipakai untuk menambah ataupun edit Kodeqr
			if(!empty($kodeqr[0]['id_kodeqr']))
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kodeqr</h6>
				<?php
			}
			else
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kodeqr</h6>
				<?php
			}
			?>

		</div>

		<div class="card-body">	
			<?php 
											//Jika update Sukses tampilkan Notifikasi sukses
			if(@$sukses):
				echo $sukses;

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

			<input class="form-control" type="hidden" name="id_kodeqr" value="<?php echo isset($kodeqr[0]['id_kodeqr'])?$kodeqr[0]['id_kodeqr']:'';?>" >

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


		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->

</html>
