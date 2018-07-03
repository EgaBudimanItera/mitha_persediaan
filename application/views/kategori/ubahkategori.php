<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Ubah Kategori</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>
                <form class="form-horizontal" role="form" action="<?=base_url()?>c_kategori/ubahkategori" method="post">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID Kategori</label>
                    <div class="col-sm-3">
                      <input name="ktgrId" type="text" class="form-control" value="<?=$list->ktgrId?>" maxlength="10" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-3">
                      <input name="ktgrNamaBacca" type="text" class="form-control" value="<?=$list->ktgrNama?>" maxlength="30" readonly>
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Nama Kategori Sebelum Perubahan
                      </small>
                    </div>
                    <div class="col-sm-3">
                      <input name="ktgrNama" type="text" class="form-control" value="<?=$list->ktgrNama?>" maxlength="30" required="">
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Nama Kategori Perubahan
                      </small>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-default">Bersih</button>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>