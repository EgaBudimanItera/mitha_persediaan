<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Ubah Data Supplier</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" role="form" action="<?=base_url()?>c_supplier/ubahsupplier" method="post">
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Supplier</label>
                    <div class="col-sm-3">
                      <input name="spliId" type="text" class="form-control" value="<?=$list->spliId?>" maxlength="10" readonly="">
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="daritanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Supplier</label>
                    <div class="col-sm-3">
                      <input name="spliNama" type="text" class="form-control" value="<?=$list->spliNama?>">
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="hinggatanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Owner Supplier</label>
                    <div class="col-sm-3">
                      <input name="spliOwner" type="text" class="form-control" value="<?=$list->spliOwner?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Telpon Supplier</label>
                    <div class="col-sm-3">
                      <input name="spliTelp" type="number" class="form-control" value="<?=$list->spliTelp?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat Supplier</label>
                    <div class="col-sm-3">
                      <textarea class="form-control" name="spliAlamat"><?=$list->spliAlamat?></textarea> 
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