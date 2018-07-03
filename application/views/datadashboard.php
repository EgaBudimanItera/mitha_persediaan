<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
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
</div>