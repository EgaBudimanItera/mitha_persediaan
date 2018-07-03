<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Data Barang Keluar</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              <a href="<?=base_url()?>c_barang_keluar/formtambah">
                    <button type="button" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i> Tambahkan Barang Keluar
                    </button>
                  </a> 
              <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Kode Barang Keluar</th>
                      <th >Tanggal Barang Keluar</th>
                      <th >Nama Pelanggan</th>
                      <th >Alamat</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no=1;
                      foreach ($list->result() as $l) {
                    ?>
                    <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$l->brklId?></td>
                      <td><?=$l->brklTanggal?></td>
                      <td><?=$l->brklPelanggan?></td>
                      <td><?=$l->brklAlamat?></td>
                      <td>
                        <a href="<?=base_url()?>c_barang_keluar/formubah/<?=$l->brklId?>">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a>
                        <a href="<?=base_url()?>c_barang_keluar/hapus_barangkeluar_dan_detail/<?=$l->brklId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                          <button type="button" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>                      
                          </button>
                        </a>                      
                      </td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>