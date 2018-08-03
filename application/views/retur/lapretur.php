<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Laporan Retur Barang</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <form class="form-horizontal" id="frm_historistok" action="<?=base_url()?>c_retur/cetakretur" target="_blank" method="POST">
                 
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
                     <!--  <button type="button" class="btn btn-primary lihat">Lihat</button> -->
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