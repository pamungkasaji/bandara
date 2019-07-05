<head>
     <meta charset="UTF-8" />
    <title>Sistem Informasi Pembelian PT. SUnBreads | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/magic/magic.css')?>" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- BEGIN BODY -->
<body >
   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="<?php echo base_url('assets/img/sunjava.png')?>" id="logoimg" alt=" Logo" />
    </div>
    <div class="tab-content">
		<?php
			if(!empty($error))
			{
				echo $error;	
			}								
		?>
        <div id="login" class="tab-pane active">
			<?php
			//Jika tombol Simpan ditekan, maka jalankan controller Login->function cekStatusLogin untuk validasi Login			
				echo form_open_multipart('Login/cekStatusLogin'); 									
			?>
            <form action="<?php echo site_url('Login/cekStatusLogin'); ?>" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                <input type="text" name="username" placeholder="username" class="form-control" />
                <input type="password" name="password" placeholder="Password" class="form-control" />
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
		
	 <p class="text-warning">Untuk Testing , username Login sebagai Admin : PT14001</p>
		   <p class="text-warning">Untuk Testing , username Login sebagai Pemilik : OWN1201</p>
		   <p class="text-warning">Untuk Testing , username Login sebagai Karyawan Gudang : PT15001</p>
		  <p class="text-warning">Untuk Testing , username Login sebagai Karyawan Keuangan : PT15002</p>
		   <p class="text-warning">Untuk Testing , username Login sebagai Karyawan Pembelian : PT15003</p>
		   <p class="text-warning">Password sama :123456</p>

		  
    </div>
</div>

	  <!--END PAGE CONTENT -->     

      <!-- PAGE LEVEL SCRIPTS -->
		<script src="<?php echo base_url('assets/plugins/jquery-2.0.3.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js')?>"></script>
		<script src="<?php echo base_url('assets/js/login.js')?>"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
