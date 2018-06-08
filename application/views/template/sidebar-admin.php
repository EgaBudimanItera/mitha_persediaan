	
		<!-- BEGIN SIDEBAR -->
		<aside class="left-side sidebar-offcanvas">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?=base_url()?>assets/front-end/images/logoola.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><strong>username yang login</strong></p>
						<a href="#"><i class="fa fa-circle text-green"></i> Online</a>
					</div>
				</div>
				<form action="#" method="get" class="sidebar-form">
					
					
				</form>
				<ul class="sidebar-menu">
					
					<li class="<?php if($link=='dashboard'){echo'active';}?>">
						<a href="<?=base_url()?>">
							<i class="fa fa-home"></i><span>Dashboard</span>
						</a>
					</li>
					<li class="<?php if($link=='kategori'){echo'active';}?>">
						<a href="<?=base_url()?>c_kategori">
							<i class="fa fa-briefcase"></i><span>Data Kategori Barang</span>	
						</a>
					</li>
					<li class="<?php if($link=='supplier'){echo'active';}?>">
						<a href="<?=base_url()?>c_supplier">
							<i class="fa fa-database"></i><span>Data Supplier</span>	
						</a>
					</li>
					<li class="<?php if($link=='barang'){echo'active';}?>">
						<a href="<?=base_url()?>c_barang">
							<i class="fa fa-file-text"></i><span>Data Barang</span>	
						</a>
					</li>
					<li class="<?php if($link=='barangmasuk'){echo'active';}?>">
						<a href="#">
							<i class="fa fa-sign-in"></i><span>Data Barang Masuk</span>	
						</a>
					</li>
					<li class="<?php if($link=='barangkeluar'){echo'active';}?>">
						<a href="#">
							<i class="fa fa-sign-out"></i><span>Data Barang Keluar</span>	
						</a>
					</li>
					<li class="<?php if($link=='retur'){echo'active';}?>">
						<a href="#">
							<i class="fa fa-reorder"></i><span>Data Retur</span>	
						</a>
					</li>
					<li class="<?php if($link=='histori'){echo'active';}?>">
						<a href="#">
							<i class="fa fa-folder"></i><span>Histori Barang</span>	
						</a>
					</li>
				</ul>
			</section>
		</aside>
		<!-- END SIDEBAR -->
		
		