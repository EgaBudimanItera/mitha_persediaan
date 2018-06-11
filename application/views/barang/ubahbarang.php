
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-file-text-o"></i>
        <span>Ubah Data Barang</span>
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
                  <button type="button" class="btn btn-primary" onclick="self.history.back()">
                        <i class="fa fa-arrow-left"></i> Kembali
                  </button>
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
                <form class="form-horizontal" role="form" action="<?=base_url()?>c_barang/ubahbarang" method="post">
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang</label>
                    <div class="col-sm-3">
                      <input name="brngId" type="text" class="form-control" readonly value="<?=$list->brngId?>" required>
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="daritanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kategori Barang</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="brngKtgrId" required>
                        <option value="">--pilih--</option>
                        <?php foreach($kategori as $data_kategori){?>
                        <option value="<?=$data_kategori->ktgrId?>" <?=$data_kategori->ktgrId == $list->brngKtgrId ? 'selected' : ''?>><?=$data_kategori->ktgrId?> - <?=$data_kategori->ktgrNama?></option>
                        <?php }?>
                      </select>
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="hinggatanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-3">
                      <input name="brngNama" type="text" class="form-control" value="<?=$list->brngNama?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan Barang</label>
                    <div class="col-sm-3">
                      <textarea name="brngKet" class="form-control" required><?=$list->brngKet?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Barang</label>
                    <div class="col-sm-3">
                      <input name="brngHarga" type="number" class="form-control" value="<?=$list->brngHarga?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Barang</label>
                    <div class="col-sm-3">
                      <input name="brngJumlah" type="number" class="form-control" value="<?=$list->brngJumlah?>" required>
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
          <!-- END HORIZONTAL FORM -->
        </div>
        
        
       
      </section>
      <!-- END MAIN CONTENT -->
    </aside>
    <!-- END CONTENT -->