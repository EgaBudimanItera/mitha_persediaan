<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Tambah Data User</h2>
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
                        <input type="text" class="form-control" name="username" required>
                        <small>*Isi tanpa ada spasi</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">                  
                        <input type="password" class="form-control" name="password" required>
                    </div>
                  </div>   
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Level</label>
                    <div class="col-sm-9">                  
                        <select class="form-control" name="hakakses" required>
                          <option value="">--pilih--</option>
                          <option value="pimpinan">Pimpinan</option>
                          <option value="admin gudang">Admin Gudang<option>
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


   