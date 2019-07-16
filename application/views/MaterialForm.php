
</head>

<!--PAGE CONTENT -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php
			//Form ini bisa dipakai untuk menambah ataupun edit Material
			if(!empty($material[0]['id_material']))
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Ubah Data Material</h6>
				<?php
			}
			else
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Tambah Data Material</h6>
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
			//Jika tombol Simpan ditekan, maka jalankan controller Material->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
			if(!empty($material[0]['id_material']))
			{
				echo form_open_multipart('Material/prosesUbah');
			}
			else
			{
				echo form_open_multipart('Material/simpanMaterial');
			}
			?>

			<input class="form-control" type="hidden" name="id_material" value="<?php echo isset($material[0]['id_material'])?$material[0]['id_material']:'';?>" >

			<div class="form-group">
				<label>Nama Material</label>
				<input class="form-control" required name="nama_material" value="<?php echo isset($material[0]['nama_material'])?$material[0]['nama_material']:'';?>">
			</div>
			<div class="form-group">
				<label>Subarea</label>
				<SELECT name="id_subarea" required class="form-control">
					<OPTION value="<?php echo isset($material[0]['id_subarea'])?$material[0]['id_subarea']:'';?>"><?php echo isset($material[0]['nama_subarea'])?$material[0]['nama_subarea']:'';?></OPTION>
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
			<a href="<?php echo site_url('Material'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>

		</div>


		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->

</html>
