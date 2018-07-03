<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Tambah Data Barang</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" role="form" action="<?=base_url()?>c_barang/tambahbarang" method="post">
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang</label>
                    <div class="col-sm-3">
                      <input name="brngId" type="text" class="form-control" readonly value="<?=$idbarang?>" required>
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
                      <select class="form-control selectpicker" data-live-search="true" name="brngKtgrId" required>
                        <option value="">--pilih--</option>
                        <?php foreach($kategori as $data_kategori){?>
                        <option value="<?=$data_kategori->ktgrId?>"><?=$data_kategori->ktgrId?> - <?=$data_kategori->ktgrNama?></option>
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
                      <input name="brngNama" type="text" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan Barang</label>
                    <div class="col-sm-3">
                      <textarea name="brngKet" class="form-control" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Barang</label>
                    <div class="col-sm-3">
                      <input name="brngHarga" type="number" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Barang</label>
                    <div class="col-sm-3">
                      <input name="brngJumlah" type="number" class="form-control" required>
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
   