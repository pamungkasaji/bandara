
</head>

<!--PAGE CONTENT -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php
			//Form ini bisa dipakai untuk menambah ataupun edit Subarea
			if(!empty($subarea[0]['id_subarea']))
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Ubah Data Subarea</h6>
				<?php
			}
			else
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Tambah Data Subarea</h6>
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

			<input class="form-control" type="hidden" name="id_subarea" value="<?php echo isset($subarea[0]['id_subarea'])?$subarea[0]['id_subarea']:'';?>" >

			<div class="form-group">
				<label>Nama Subarea</label>
				<input class="form-control" required name="nama_subarea" value="<?php echo isset($subarea[0]['nama_subarea'])?$subarea[0]['nama_subarea']:'';?>">
			</div>
			<button type="submit" class="btn btn-success" name="save">Simpan</button>
			<a href="<?php echo site_url('Subarea'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>

		</div>


		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->

</html>
