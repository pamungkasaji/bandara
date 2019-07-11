<?php 
if(!empty($level[0]['level']))
{
	$level= $level[0]['level'];
}
elseif(!empty($session[0]['level']))
{
	$level= $session[0]['level'];
}
?>
<!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
             
                <br />
                <div class="media-body">
                     <h5 class="media-heading">Welcome <?php echo isset ($session['username'])?$session['username']:''; ?></h5>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel">
                    <a href="<?php echo site_url('Welcome'); ?>" >
                        <i class="icon-table"></i> Dashboard 
                    </a>                   
                </li>
			<?php
				//Jika Karyawan Login sebagai Admin
				if($level=='admin')
				{
				?>
				<li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-book"> </i> MASTER     
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="component-nav">
                        <li class=""><a href="<?php echo site_url('Karyawan'); ?>"><i class="icon-angle-right"></i> Karyawan </a></li>
                        <li class=""><a href="<?php echo site_url('Area'); ?>"><i class="icon-angle-right"></i> Area </a></li>
                        <li class=""><a href="<?php echo site_url('Subarea'); ?>"><i class="icon-angle-right"></i> Subarea </a></li>
                        <li class=""><a href="<?php echo site_url('Kodeqr'); ?>"><i class="icon-angle-right"></i> Kodeqr </a></li>
				   </ul>
                </li>
				<?php
				}
				elseif($level=='teamleader') 
				{
				?>				
				<li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#laporan-nav">
                        <i class="icon-print"> </i> TEAM LEADER     
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default">3</span>&nbsp;
                    </a>
                    <ul class="collapse" id="laporan-nav">
                        <li class=""><a href="<?php echo site_url('kerusakan'); ?>"><i class="icon-angle-right"></i> Kerusakan (PR) </a></li>
						<li class=""><a href="<?php echo site_url('lostfound'); ?>"><i class="icon-angle-right"></i> Lost Found (GR) </a></li>
						<li class=""><a href="<?php echo site_url('pengeluaran'); ?>"><i class="icon-angle-right"></i> Pengeluaran Bahan Baku </a></li>

				   </ul>
                </li>

				<?php
				}
				//Jika  Login sebagai Owner
				elseif($level=='supervisor')
				{
				?>
				<li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#laporan-nav">
                        <i class="icon-print"> </i> Supervisor     
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default">4</span>&nbsp;
                    </a>
                    <ul class="collapse" id="laporan-nav">
                        <li class=""><a href="<?php echo site_url('LaporanPR'); ?>"><i class="icon-angle-right"></i> Laporan Permintaan (PR) </a></li>
                        <li class=""><a href="<?php echo site_url('LaporanPO'); ?>"><i class="icon-angle-right"></i> Laporan Pembelian (PO) </a></li>
                        <li class=""><a href="<?php echo site_url('LaporanGR'); ?>"><i class="icon-angle-right"></i> Laporan Penerimaan (GR) </a></li>
						<li class=""><a href="<?php echo site_url('LaporanPengeluaran'); ?>"><i class="icon-angle-right"></i> Laporan Pengeluaran </a></li>

				   </ul>
                </li>
				
				<?php
				}
				?>
				 <li class="panel">
                    <a href="<?php echo base_url('Login/keluar'); ?>">
                        <i class="icon-signout"></i> Logout 
                    </a>                   
                </li>
            </ul>

        </div>
        <!--END MENU SECTION -->
