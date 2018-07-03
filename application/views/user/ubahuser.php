
    <!-- BEGIN CONTENT -->
   
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <h2>
          <i class="fa fa-file-text-o"></i>
          <span>Edit Data User</span>
        </h2>
      </section>
      <!-- END CONTENT HEADER -->
      
      <!-- BEGIN MAIN CONTENT -->
      <section class="content">
        <div class="row">
          
          <!-- BEGIN HORIZONTAL FORM -->
          <div class="col-md-12">
            <div class="grid">
              <div class="grid-header">
                <span class="grid-title">
                  <h6>
                    <button type="button" class="btn btn-primary" onclick="self.history.back()">
                          <i class="fa fa-arrow-left"></i> Kembali
                    </button>
                  </h6>
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
                
              </div>
            </div>
          </div>
          <!-- END HORIZONTAL FORM -->

          
        </div>
        
        
       
      </section>
      <!-- END MAIN CONTENT -->
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Edit Data User</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              <form class="form-horizontal" role="form" action="<?=base_url()?>c_user/ubahbarang" method="post">                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">                  
                        <input type="text" class="form-control" name="username" required value="<?=$data->row()->userNama?>">
                        <small>*Isi tanpa ada spasi</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">  
                        <input type="hidden" name="userId" value="<?=$data->row()->userId?>">                
                        <input type="password" class="form-control" name="password" >
                        <small>*Isi jika anda ingin merubah password</small>
                    </div>
                  </div>   
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Level</label>
                    <div class="col-sm-9">                  
                        <select class="form-control" name="hakakses" required>
                          <option value="">--pilih--</option>
                          <option value="pimpinan" <?=$data->row()->userHakakses == 'pimpinan' ? 'selected': ''?>>Pimpinan</option>
                          <option value="admin gudang" <?=$data->row()->userHakakses == 'admin gudang' ? 'selected': ''?>>Admin Gudang<option>
                        </select>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="reset" class="btn btn-default">Bersih</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


   