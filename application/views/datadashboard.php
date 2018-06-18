    
    
   
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <h2>
          <i class="fa fa-list-alt"></i>
          <span>Dashboard</span>
        </h2>
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
                  <!-- <h6>
                    <a href="<?=base_url()?>c_user/formtambah">
                      <button type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambahkan User
                      </button>
                    </a>  
                  </h6> -->
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
                <center>
                  <h3>Aplikasi Stok Barang</h3><hr/>
                </center>
                  <p>Aplikasi ini merupakan aplikasi stok barang, aplikasi ini mengelola:</p>
                  <ol>
                    <li>Data Barang Masuk</li>
                    <li>Data Barang Keluar</li>
                    <li>Data Barang Retur</li>
                    <li>Data Stok Barang</li>
                  </ol>
                
              </div>
            </div>
          </div>
          <!-- END BASIC DATATABLES -->
        </div>
      </section>