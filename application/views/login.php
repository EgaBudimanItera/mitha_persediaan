<!DOCTYPE html>
<html>

	<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Dashboard </title>
	    <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/Logo_IAIN_Raden_Intan_Bandar_Lampung.png"/> -->
	    <link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/back-end/assets/plugins/font-awesome/css/font-awesome.min.css">
	</head>
	<body style="background-color: #E2E2E2;">
		<br/><br/><br/>

		<div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h3>Aplikasi Stok Barang</h3>
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                    <div class="panel-body">
                    	<?=@$this->session->flashdata('msg')?>
                        <form action="<?=base_url()?>c_login/proses_login" method="POST" id="login">
                            <hr />
                            
                             <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required />
                                </div>
                            <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required />
                                </div>
                            
                             
                             <div class="form-group">
			                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
			                    Halaman utama, klik <a href="<?=base_url()?>">disini</a>
			                </div>
                            
                            </form>
                    </div>
                   
                </div>
                
                
        </div>
    </div>

		<!-- <div class="container">
		    <div class="row">
		        <div class="col-md-offset-4 col-md-4 login-from" style="border:solid thin #eae7de">
		            <h4>Aplikasi Stok Barang</h4><hr/>
		            <?=@$this->session->flashdata('msg')?>
		            <form action="<?=base_url()?>c_login/proses_login" method="POST" id="login">
		                <div class="form-group">
		                    <label for="">Username</label>
		                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required />
		                </div>
		                <div class="form-group">
		                    <label for="">Password</label>
		                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required />
		                </div>
		                
		                <div>
		                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
		                    Halaman utama, klik <a href="<?=base_url()?>">disini</a>
		                </div>
		            </form>
		            <br />     
		        </div>
		    </div>
		</div>  -->
		<script src="<?=base_url()?>assets/back-end/assets/plugins/jquery-2.1.0.min.js"></script>
  <script src="<?=base_url()?>assets/back-end/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>