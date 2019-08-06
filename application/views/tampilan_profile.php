

</head>

<body id="page-top">

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!--<?php echo $error;?>-->

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
          </div>


          	<?php echo form_open_multipart('profile/aksi_upload/'.$id_karyawan);?>

            <div class="form-group text-center">
              File Gambar <br>
             <img src="<?php echo base_url().'/gambar/'.$logo;?>" class="img-responsive rounded-circle mx-auto d-block margin" style="display:inline" width="35%" height="35%">
            <input type="file" name="gambar" />
          </div>

          	<br />

            <div class="form-group text-center">
          	<button type="submit" class="btn btn-primary">
              Submit
            </button>
          </div>

          </form>

        </div>
        <!-- /.container-fluid -->




</html>
