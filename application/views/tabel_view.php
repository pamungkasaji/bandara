<?php include 'template/head.php'; ?>

<?php include 'template/header.php'; ?>

    <!-- Sidebar -->
    <?php include 'template/navigasi.php'; ?>



      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>

                  </tr>
                </thead>
                <tbody>
                 <?php
                  //jika data kodeqr tidak kosong maka jalankan perintah dibawah ini
                 if(!empty($kodeqr))
                 {
                    //load data kodeqr
                  foreach ($kodeqr as $data)
                  {
                    $area         =$data['nama_area']; 
                    $subarea    =$data['nama_subarea']; 
                    $qr_code         =$data['qr_code']; 

                    ?>  
                    <tr>
                      <td><?php echo $area; ?></td>
                      <td><?php echo $subarea; ?></td>
                      <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$qr_code;?>"></td>
                      <td>
                        <a class="btn btn-info" href="<?php echo site_url()."/Kodeqr/ubah?id_kodeqr=".$data['id_kodeqr'];?>"><i class="icon-pencil icon-white"></i> Ubah</a>

                        <a class="btn btn-info" href="<?php echo site_url()."Kodeqr/pdfdetails/".$data['id_kodeqr'];?>"><i class="icon-pencil icon-white"></i> Print</a>

                        <a onclick="return confirm('Yakin data anda ingin di hapus??')" href="<?php echo site_url()."/Kodeqr/hapus?id_kodeqr=".$data['id_kodeqr'];?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Hapus</a>
                        
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2019</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

<?php include 'template/footer.php'; ?>

</html>
