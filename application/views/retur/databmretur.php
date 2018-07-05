<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Pilih Barang Masuk Untuk Retur</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
              
              <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>  
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Kode Barang Masuk</th>
                      <th >Tanggal Barang Masuk</th>
                      <th >Nama Supplier</th>
                      <th >Total</th>
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
                      <td><?=$l->dbmkBrmkId?></td>
                      <td><?=$l->brmkTanggal?></td>
                      <td><?=$l->spliNama?></td>
                      <td>Rp. <?=number_format($l->total, 0, ',', '.')?></td>
                      <td>
                        <a href="<?=base_url()?>c_retur/formtambah/<?=$l->dbmkBrmkId?>">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Pilih
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