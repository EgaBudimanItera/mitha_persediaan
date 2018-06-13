
    <!-- BEGIN CONTENT -->
   
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <h2>
          <i class="fa fa-file-text-o"></i>
          <span>Lihat Data Barang Keluar</span>
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
                <!-- <form class="form-horizontal" role="form" action="<?=base_url()?>c_barang_keluar/tambahbarang" method="post"> -->
                  <form action="#" class="form-horizontal">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Kode Barang Keluar</label>
                    <div class="col-sm-9">
                      <input name="brngId" type="text" class="form-control" readonly value="<?=$data_barang_keluar->brklId?>" required>
                      <!-- <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="daritanggal">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" /> -->
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Barang Keluar</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="tanggalbarangkeluar" value="<?=$data_barang_keluar->brklTanggal?>" disabled required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Pelanggan</label>
                    <div class="col-sm-9">
                      <input type="text" name="pelanggan" class="form-control" required disabled value="<?=$data_barang_keluar->brklPelanggan?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat Pelanggan</label>
                    <div class="col-sm-9">
                      <textarea name="alamatpelanggan" class="form-control" required disabled><?=$data_barang_keluar->brklAlamat?></textarea>
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
                        <select name="barang" id="barang" class="form-control" required>
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
                <table id="tbDetailBarang"  class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Harga Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no =1; foreach($data_barang_keluar_detail->result() as $rowbrgmskdetail){?>
                    <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$rowbrgmskdetail->dbrkBrngId.' - '.$rowbrgmskdetail->brngNama?></td>
                      <td><?=$rowbrgmskdetail->dbrkJumlah?><input type="hidden" name="idbrgdetaile[]" value="<?=$rowbrgmskdetail->dbrkId?>"><input type="hidden" name="jmlbrgdetaile[]" value="<?=$rowbrgmskdetail->dbrkJumlah?>"></td>
                      <td>Rp. <?=number_format($rowbrgmskdetail->dbrkHarga, 0, ',', '.')?><input type="hidden" name="hargabrgdetaile[]" value="<?=$rowbrgmskdetail->dbrkHarga?>"></td>
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
          <!-- END HORIZONTAL FORM -->

          
        </div>
        
        
       
      </section>
      <!-- END MAIN CONTENT -->


   