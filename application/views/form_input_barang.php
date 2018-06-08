<?php
    @$kodebarang = $_GET['kodebarang'];
    function autoNumber($id, $table){
    $query = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' ORDER BY '.$id;
    $result = mysql_query($query);
    $data = mysql_fetch_array($result);
    $id_max = $data['max_id'];
    $sort_num = (int) substr($id_max, 1, 4);
    $sort_num++;
    $new_code = sprintf("B%04s", $sort_num);
    return $new_code;
 }
?>
    
    <!-- BEGIN CONTENT -->
    <aside class="right-side">
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Input Data Barang</span>
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
                <form class="form-horizontal" role="form" action="barang/simpan_barang.php" method="post" enctype="multipart/form-data">
                   <!--<div class="form-group">
                    <label class="col-sm-2 control-label">Kode Barang</label>
                    <div class="col-sm-2">
                      <input name="kodebarang" type="text" class="form-control" value="<?php /*echo autoNumber('kodebarang','barang');*/?>" maxlength="30" required="" readonly>
                    </div>
                    </div>-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Item</label>
                    <div class="col-sm-3">
                      <select name="jenisi" size="1" class="form-control">
                        <option value="">-- PILIH --</option>
                        <option value="A">NOTA</option>
                        <option value="B">BROSUR</option>
                        <option value="C">KOP SURAT</option>
                        <option value="D">KOP SURAT</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-5">
                      <input name="namabarang" type="text" class="form-control" value="" maxlength="30" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ukuran</label>
                    <div class="col-sm-3">
                      <select name="ukuran" size="1" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="FOLIO">FOLIO</option>
                        <option value="1/2 FOLIO">1/2 FOLIO</option>
                        <option value="1/3 FOLIO">1/3 FOLIO</option>
                        <option value="1/4 FOLIO">1/4 FOLIO</option>
                        <option value="A4">A4</option>
                        <option value="KUARTO">KUARTO</option>
                        <option value="210mm X 380mm">210mm X 380mm</option>
                        
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Rangkap</label>
                    <div class="col-sm-3">
                      <input name="rangkap" type="text" class="form-control" value="" maxlength="1" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Isi Perbuku</label>
                    <div class="col-sm-3">
                      <input name="isiperbuku" type="text" class="form-control" value="" maxlength="10" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kertas</label>
                    <div class="col-sm-3">
                      <select name="jenis" size="1" class="form-control">
                        <option value="HVS">HVS</option>
                        <option value="NCR">NCR</option>
                        <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-3">
                      <input name="harga" type="number" class="form-control" value="" maxlength="10" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">File</label>
                    <div class="col-sm-7">
                      <input  type="file" class="form-control" name="gambar" required="" id="gambar" value=""  accept="image/*"/>
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
    
