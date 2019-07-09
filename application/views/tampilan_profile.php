

</head>

<body id="page-top">

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!--<?php echo $error;?>-->


          	<?php echo form_open_multipart('profile/aksi_upload/'.$id_karyawan);?>

          	File Gambar <input type="file" name="gambar" />

          	<br /><br />

          	<input type="submit" value="upload" />

          </form>

        </div>
        <!-- /.container-fluid -->




</html>
