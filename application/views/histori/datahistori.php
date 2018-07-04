<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Data History Barang</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <form class="form-horizontal" id="frm_historistok" action="<?=base_url()?>c_histori/lihat_historistok_barangcetak" method="POST">
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Barang</label>
                    <div class="col-sm-9">
                      <select name="barang" id="barang" class="form-control selectpicker" data-live-search="true" >
                        <option value="">--pilih--</option>
                        <?php foreach($data_barang->result() as $row_barang){?>
                          <option value="<?=$row_barang->brngId?>"><?=$row_barang->brngId?> - <?=$row_barang->brngNama?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Dari</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control datepicker" name="dari" required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Sampai</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control datepicker" name="sampai" required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                      <button type="button" class="btn btn-primary lihat">Lihat</button>
                      <!-- <button type="reset" class="btn btn-default">Bersih</button> -->
                      <button type="submit" class="cetak btn btn-danger" >Cetak</button>
                    </div>
                  </div>
                </form>
                <div id="result"></div>
            </div>
        </div>
    </div>
</div>