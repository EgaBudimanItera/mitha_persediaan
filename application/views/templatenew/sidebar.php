    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            
                            <?php if($this->session->userdata('status') != ''){?>
                            <img alt="image" class="img-circle" width="100px" src="<?=base_url()?>assets_v1/images/user_fb.jpeg" />
                            <?php }else{?>
                            <img alt="image" class="img-circle" width="100px" src="<?=base_url()?>assets/logo-fadila.jpg" />
                            <?php }?>
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$this->session->userdata('nama')?></strong>
                            </span> 
                            <!-- <span class="text-muted text-xs block">Raport <b class="caret"></b></span> --> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                          
                            <li><a href="<?=base_url()?>adminNew/home/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="<?php if($link=='dashboard'){echo'active';}?>">
                        <a href="<?=base_url()?>c_dashboard">
                            <i class="fa fa-home"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('level') == 'admin gudang'){ ?>
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
                        <a href="<?=base_url()?>c_barang_masuk">
                            <i class="fa fa-sign-in"></i><span>Data Barang Masuk</span> 
                        </a>
                    </li>
                    <li class="<?php if($link=='barangkeluar'){echo'active';}?>">
                        <a href="<?=base_url()?>c_barang_keluar">
                            <i class="fa fa-sign-out"></i><span>Data Barang Keluar</span>   
                        </a>
                    </li>
                    <li class="<?php if($link=='retur'){echo'active';}?>">
                        <a href="<?=base_url()?>c_retur">
                            <i class="fa fa-reorder"></i><span>Data Retur</span>    
                        </a>
                    </li>
                    <li class="<?php if($link=='histori'){echo'active';}?>">
                        <a href="<?=base_url()?>c_histori">
                            <i class="fa fa-folder"></i><span>Histori Barang</span> 
                        </a>
                    </li>
                    <?php }?>
                    <?php if($this->session->userdata('level') == 'pimpinan'){?>
                     <li class="<?php if($link=='histori'){echo'active';}?>">
                        <a href="<?=base_url()?>c_histori">
                            <i class="fa fa-folder"></i><span>Histori Barang</span> 
                        </a>
                    </li>
                    <li class="<?php if($link=='user'){echo'active';}?>">
                        <a href="<?=base_url()?>c_user">
                            <i class="fa fa-user"></i><span>User</span> 
                        </a>
                    </li>
                    <?php }?>
            </ul>
        </div>
    </nav>