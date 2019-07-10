</head>

<!--PAGE CONTENT -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php
			//Form ini bisa dipakai untuk menambah ataupun edit Area
			if(!empty($area[0]['id_area']))
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Ubah Data Area</h6>
				<?php
			}
			else
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Tambah Data Area</h6>
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
											//Jika tombol Simpan ditekan, maka jalankan controller Area->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
			if(!empty($area[0]['id_area']))
			{
				echo form_open_multipart('Area/prosesUbah'); 
			}
			else
			{
				echo form_open_multipart('Area/simpanArea'); 
			}											
			?>

			<input class="form-control" type="hidden" name="id_area" value="<?php echo isset($area[0]['id_area'])?$area[0]['id_area']:'';?>" >

			<div class="form-group">
				<label>Ini Nama Area</label>
				<input class="form-control" required name="nama_area" value="<?php echo isset($area[0]['nama_area'])?$area[0]['nama_area']:'';?>">
			</div>
			<button type="submit" class="btn btn-success" name="save">Simpan</button>
			<a href="<?php echo site_url('Area'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
		</div>


		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->

</html>

