
</head>

<!--PAGE CONTENT -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php
			//Form ini bisa dipakai untuk menambah ataupun edit Standard
			if(!empty($standard[0]['id_standard']))
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Ubah Data Standard</h6>
				<?php
			}
			else
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Tambah Data Standard</h6>
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
			//Jika tombol Simpan ditekan, maka jalankan controller Standard->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
			if(!empty($standard[0]['id_standard']))
			{
				echo form_open_multipart('Standard/prosesUbah');
			}
			else
			{
				echo form_open_multipart('Standard/simpanStandard');
			}
			?>

			<input class="form-control" type="hidden" name="id_standard" value="<?php echo isset($standard[0]['id_standard'])?$standard[0]['id_standard']:'';?>" >

			<div class="form-group">
				<label>Nama Standard</label>
				<input class="form-control" required name="nama_standard" value="<?php echo isset($standard[0]['nama_standard'])?$standard[0]['nama_standard']:'';?>">
			</div>
			<div class="form-group">
				<label>Pertanyaan</label>
				<input class="form-control" required name="pertanyaan" value="<?php echo isset($standard[0]['pertanyaan'])?$standard[0]['pertanyaan']:'';?>">
			</div>
			<button type="submit" class="btn btn-success" name="save">Simpan</button>
			<a href="<?php echo site_url('Standard'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>

		</div>


		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->

</html>
