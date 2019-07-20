<?php if(isset($_GET['logout']) && $_GET['logout'] === 'true'){
        $message = "You've been logged out!";
    ?>
        <script>
        $(function() {
         $('#myModal').modal('show');
        });
        </script>

					<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Keluar Dari Aplikasi</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Tekan Tombol "Logout" untuk mengakhiri sesi</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
									<a class="btn btn-primary" href="<?php echo base_url('Login/keluar'); ?>">Logout</a>
								</div>
							</div>
						</div>
					</div>