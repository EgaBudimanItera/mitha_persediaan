<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Tambah Data Retur</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              <form class="form-horizontal" role="form" action="<?=base_url()?>c_retur/tambahbarang" method="post">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Kode Retur</label>
                    <div class="col-sm-9">
                      <input name="brngId" type="text" class="form-control" readonly value="<?=$id_retur?>" required>
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="daritanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Retur</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="date" class="form-control" name="tanggalretur" required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Kode Barang Masuk</label>
                    <div class="col-sm-9">
                      <select class="form-control selectpicker" data-live-search="true" name="kodebarangmasuk" id="kodebarangmasuk" required>
                        <option value="">--pilih--</option>
                        <?php foreach($list_barang_masuk->result() as $rowbarangmasuk){?>
                          <option value="<?=$rowbarangmasuk->brmkId?>"><?=$rowbarangmasuk->brmkId?> - <?=$rowbarangmasuk->spliNama?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <!-- <button type="reset" class="btn btn-default">Bersih</button> -->
                      <a href="#" class="tambahbarangmasukdetail btn btn-danger" >Tambah Detail Barang</a>
                    </div>
                  </div>
                <hr/>
                <div class="hideBarangMasuk" style="display: none;">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Barang</label>
                      <div class="col-sm-9">
                        <select name="barang" id="barang" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">--pilih--</option>
                          <!-- <?php foreach($barang->result() as $data_barang){?>
                          <option value="<?=$data_barang->brngId?>"><?=$data_barang->brngId?> - <?=$data_barang->brngNama?></option>
                          <?php }?> -->
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jumlah Barang</label>
                      <div class="col-sm-9">
                        <input type="number" name="jumlahBarang" id="jumlahBarang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Harga Barang</label>
                      <div class="col-sm-9">
                        <input type="number" name="hargaBarang" id="hargaBarang" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                      <div class="col-sm-9">
                        <button type="button" class="btn btn-success tambahdetail"><i class="fa fa-plus"></i> Tambah</button>
                      </div>
                    </div>
                    
                  
                </div>
                <table id="tbDetailBarang"  class="table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Harga Barang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>


   