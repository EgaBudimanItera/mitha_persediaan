<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Detail Data Barang Masuk</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <form action="#"  class="form-horizontal">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Kode Barang Masuk</label>
                    <div class="col-sm-9">
                      <input name="brngId" type="text" class="form-control" readonly value="<?=$data_barang_masuk->brmkId?>" required>
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="daritanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Supplier Barang</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="brngKtgrId" required disabled>
                        <option value="">--pilih--</option>
                        <?php foreach($supplier->result() as $data_supplier){?>
                        <option value="<?=$data_supplier->spliId?>" <?=$data_barang_masuk->brmkSuplId == $data_supplier->spliId ? 'selected' : ''?>><?=$data_supplier->spliId?> - <?=$data_supplier->spliNama?></option>
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
                    <label class="col-sm-3 control-label">Tanggal Barang Masuk</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control datepicker" name="tanggalbarangmasuk" value="<?=$data_barang_masuk->brmkTanggal?>" disabled required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>
                  
                  <!-- <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                       <button type="reset" class="btn btn-default">Bersih</button> 
                      <a href="#" class="tambahbarangmasukdetail btn btn-danger" >Tambah Detail Barang</a>
                    </div>
                  </div> -->
                <hr/>
                <div class="hideBarangMasuk" style="display: none;">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Barang</label>
                      <div class="col-sm-9">
                        <select name="barang" id="barang" class="form-control">
                          <option value="">--pilih--</option>
                          <?php foreach($barang->result() as $data_barang){?>
                          <option value="<?=$data_barang->brngId?>"><?=$data_barang->brngId?> - <?=$data_barang->brngNama?></option>
                          <?php }?>
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
                <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <table id="tbDetailBarang"  class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Harga Barang</th><!-- 
                      <th>Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no =1; foreach($data_barang_masuk_detail->result() as $rowbrgmskdetail){?>
                    <tr>
                      
                      <td><?=$rowbrgmskdetail->dbmkBrngId.' - '.$rowbrgmskdetail->brngNama?></td>
                      <td><?=$rowbrgmskdetail->dbmkJumlah?><input type="hidden" name="idbrgdetaile[]" value="<?=$rowbrgmskdetail->dbmkId?>"><input type="hidden" name="jmlbrgdetaile[]" value="<?=$rowbrgmskdetail->dbmkJumlah?>"></td>
                      <td>Rp. <?=number_format($rowbrgmskdetail->dbmkHarga, 0, ',', '.')?><input type="hidden" name="hargabrgdetaile[]" value="<?=$rowbrgmskdetail->dbmkHarga?>"></td>
                      <!-- <td>
                        <a href="<?=base_url()?>c_barang_masuk/hapusdetailbarang/<?=$rowbrgmskdetail->dbmkId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn btn-danger btn-xs">Hapus</a>
                      </td> -->
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>


   