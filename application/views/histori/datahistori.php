    
    
   
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <i class="fa fa-list-alt"></i>
        <span>Data History Barang</span>
        
      </section>
      <!-- END CONTENT HEADER -->
      


    <section class="content">
        <div class="row">
          <!-- BEGIN BASIC DATATABLES -->
          <div class="col-md-12">
            <div class="grid no-border">
              <div class="grid-header">
                <i class="fa fa-perusahaan"></i>
                <span class="grid-title">
                  <!-- <a href="<?=base_url()?>c_barang/formtambah">
                    <button type="button" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i> Tambahkan Barang
                    </button>
                  </a>   -->
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="grid-body">
                <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <form class="form-horizontal">
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Barang</label>
                    <div class="col-sm-9">
                      <select name="barang" id="barang" class="form-control selectpicker" data-live-search="true" >
                        <option value="">--pilihh--</option>
                        <?php foreach($data_barang->result() as $row_barang){?>
                          <option value="<?=$row_barang->brngId?>"><?=$row_barang->brngId?> - <?=$row_barang->brngNama?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Dari</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="dari" required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Sampai</label>
                    <div class="col-sm-9">
                      <div class="input-group date form_date" data-date="2017-01-01T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                        <input type="text" class="form-control" name="sampai" required>
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                      <input type="hidden" id="dtp_input" value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-primary">Lihat</button>
                      <!-- <button type="reset" class="btn btn-default">Bersih</button> -->
                      <a href="#" class="tambahbarangmasukdetail btn btn-danger" >Cetak</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>