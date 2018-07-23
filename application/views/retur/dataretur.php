<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Data Retur</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              <a href="<?=base_url()?>c_retur/formviewtambah">
                    <button type="button" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i> Tambahkan Retur
                    </button>
                  </a> 
              <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Kode Retur</th>
                      <th >Kode Barang Masuk</th>
                      <th >Nama Supplier</th>
                      <th >Tanggal</th>
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
                      <td><?=$l->retuId?></td>
                      <td><?=$l->retuBrmkId?></td>
                      <td><?=$l->spliNama?></td>
                      <td><?=$l->retuTanggal?></td>
                      <td>
                        <a href="<?=base_url()?>c_retur/formubah/<?=$l->retuId?>">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a>
                        <!-- <a href="<?=base_url()?>c_retur/hapus_retur_dan_detail/<?=$l->retuId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                          <button type="button" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>                      
                          </button>
                        </a>    -->                   
                      </td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>