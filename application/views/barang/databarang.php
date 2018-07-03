<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Tambahkan Barang</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <a href="<?=base_url()?>c_barang/formtambah">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambahkan Barang
                  </button>
                </a>  
                <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Kode Barang</th>
                      <th >Nama Barang</th>
                      <th >Kategori Barang</th>
                      <th >Jumlah Barang</th>
                      <th >Harga Barang</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no=1;
                      foreach ($list as $l) {
                    ?>
                    <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$l->brngId?></td>
                      <td><?=$l->brngNama?></td>
                      <td><?=$l->ktgrNama?></td>
                      <td><?=$l->brngJumlah?></td>
                      <td>Rp. <?=number_format($l->brngHarga,0,  ',', '.')?></td>
                      <td>
                        <a href="<?=base_url()?>c_barang/formubah/<?=$l->brngId?>">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a>
                        <a href="<?=base_url()?>c_barang/hapuskategori/<?=$l->brngId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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