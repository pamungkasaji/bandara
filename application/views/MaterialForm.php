
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
				<input class="form-control w-50" required name="nama_material" value="<?php echo isset($material[0]['nama_material'])?$material[0]['nama_material']:'';?>">
			</div>
			<div class="form-group">
				<label>Subarea</label>
				<?php
				if(!empty($MTR))
				{	
					$no=0;
					foreach($MTR as $detail)
					{
						$id_material=$detail['id_material'];
						$nama_subarea=$detail['nama_subarea'];
						$id_subarea=$detail['id_subarea'];

						?>	
						<SELECT name="id_subarea" required class="form-control w-50">
							<OPTION value="<?php echo isset($MTR[$no]['id_subarea'])?$MTR[$no]['id_subarea']:'';?>"><?php echo isset($MTR[$no]['nama_subarea'])?$MTR[$no]['nama_subarea']:'';?></OPTION>
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
						<?php
						$no=$no+1;
					}
					?>
					<?php
				}
				else
				{
					?>
					<SELECT name="id_subarea" required class="form-control w-50">
						<OPTION value="<?php echo isset($MTR[0]['id_subarea'])?$MTR[0]['id_subarea']:'';?>"><?php echo isset($MTR[0]['nama_subarea'])?$MTR[0]['nama_subarea']:'';?></OPTION>
						<?php
						if(!empty($subarea))
						{
							foreach($subarea as $mtr)
							{
								$id_subarea=$mtr['id_subarea'];
								$nama_subarea=$mtr['nama_subarea'];
								?>	

								<OPTION value="<?php echo $id_subarea;?>"><?php echo $nama_subarea;?></OPTION>
								<?php
							}
						}
						?>				       
					</SELECT>
					<?php
				}
				?>

				<!--Detail PO-->
				<hr>
				<b>
					Form Standard dan Pertanyaan              
				</b>
				<br>
				<br>
				<TABLE width="100%">
					<TH>
						<TD width="50%">
							<b>Standard</b>
						</TD>

						<TD width="30%">
							<b>Pertanyaan</b>
						</TD>

					</TH>
				</TABLE>	
				<TABLE id="dataTable" width="100%">
					<?php
					if(!empty($STD))
					{	
						$no=0;
						foreach($STD as $detail)
						{
							$id_standard=$detail['id_standard'];
							$pertanyaan=$detail['pertanyaan'];
							$nama_standard=$detail['nama_standard'];
							$id_material=$detail['id_material'];

							?>	
							<TR>
								<TD>
									<input class="form-control" type="hidden" name="id_standard[]" value="<?php echo isset($id_standard)?$id_standard:'';?>">

								</TD>
								
								<TD>
									<input class="form-control" name="nama_standard[]" value="<?php echo isset($nama_standard)?$nama_standard:'';?>">

								</TD>
								<TD>
									<input class="form-control" name="pertanyaan[]" value="<?php echo isset($pertanyaan)?$pertanyaan:'';?>">

								</TD>

							</TR>
							<?php
							$no=$no+1;
						}
						?>
						


						<?php
					}
					else
					{
						?>
						<TR>
							<TD>
								<INPUT type="hidden" name="id_standard[]" class="form-control" >
							</TD>
							<TD>

								<INPUT type="text" name="nama_standard[]" class="form-control">
							</TD>
							<TD>
								<INPUT type="text" name="pertanyaan[]" class="form-control">
							</TD>
						</TR>
						<?php
					}
					?>

				</TABLE>
			</div>

			

			<INPUT type="button" value="Tambah Detail" class="btn btn-info" onclick="addRow('dataTable')" />
			<button type="submit" class="btn btn-success" name="save">Simpan</button>
			<a href="<?php echo site_url('Material'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>

		</div>


		<!-- /.row -->
	</div>

</div>
<!--END PAGE CONTENT -->
<SCRIPT language="javascript">
	function addRow(tableID) {

		var table = document.getElementById(tableID);

		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);

		var colCount = table.rows[0].cells.length;

		for(var i=0; i<colCount; i++) {

			var newcell	= row.insertCell(i);

			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
					newcell.childNodes[0].value = "";
					break;
					case "checkbox":
					newcell.childNodes[0].checked = false;
					break;
					case "select-one":
					newcell.childNodes[0].selectedIndex = 0;
					break;
				}
			}
		}

		

	</SCRIPT>
	</html>

