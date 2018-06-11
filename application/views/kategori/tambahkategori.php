

      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <h2> 
          <i class="fa fa-file-text-o"></i>
          <span>Tambah Data Kategori Barang</span>
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
                  <h5>
                    <button type="button" class="btn btn-primary" onclick="self.history.back()">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </button>
                  </h5>
                </span>
                <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div id="info-alert">
                <?=@$this->session->flashdata('msg')?>
              </div>
              <div class="grid-body">
                <form class="form-horizontal" role="form" action="<?=base_url()?>c_kategori/tambahkategori" method="post">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID Kategori</label>
                    <div class="col-sm-3">
                      <input name="ktgrId" type="text" class="form-control" value="<?=$list?>" maxlength="10" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-3">
                      <input name="ktgrNama" type="text" class="form-control" value="" maxlength="30" required="">
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
   