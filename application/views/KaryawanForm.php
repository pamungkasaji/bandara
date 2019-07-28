</head>

<!--PAGE CONTENT -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php
			//Form ini bisa dipakai untuk menambah ataupun edit karyawan
			if(!empty($karyawan[0]['id_karyawan']))
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Ubah Data karyawan</h6>
				<?php
			}
			else
			{
				?> <h6 class="m-0 font-weight-bold text-primary">Tambah Data karyawan</h6>
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
											//Jika tombol Simpan ditekan, maka jalankan controller Karyawan->function simpan untuk menambah data atau function prosesUbah untuk mengubah data
			if(!empty($karyawan[0]['id_karyawan']))
			{
				echo form_open_multipart('Karyawan/prosesUbah'); 
			}
			else
			{
				echo form_open_multipart('Karyawan/simpanKaryawan'); 
			}											
			?>

			<input class="form-control" type="hidden" name="id_karyawan" value="<?php echo isset($karyawan[0]['id_karyawan'])?$karyawan[0]['id_karyawan']:'';?>" >
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input class="form-control" name="nama" value="<?php echo isset($karyawan[0]['nama'])?$karyawan[0]['nama']:'';?>">
			</div>
			<div class="form-group">
				<label>username</label>
				<input class="form-control" name="username" value="<?php echo isset($karyawan[0]['username'])?$karyawan[0]['username']:'';?>" >
			</div>
			<div class="form-group">
				<label>password</label>
				<input class="form-control" name="password" >
			</div>
			<div class="form-group">
				<label>Level</label>
				<SELECT name="level" class="form-control">
					<OPTION value="<?php echo isset($karyawan[0]['level'])?$karyawan[0]['level']:'';?>"><?php echo isset($karyawan[0]['level'])?$karyawan[0]['level']:'';?></OPTION>
					<OPTION value="admin">Admin</OPTION>
					<OPTION value="supervisor">Supervisor</OPTION>
					<OPTION value="teamleader">Team Leader</OPTION>
					<OPTION value="attendant">Attendant</OPTION>
				</SELECT>
			</div>
			<button type="submit" class="btn btn-success" name="save">Simpan</button>
			<a href="<?php echo site_url('Karyawan'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
		</div>



		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->

</html>
