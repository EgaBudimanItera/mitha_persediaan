    
    
   
      <!-- BEGIN CONTENT HEADER -->
      <section class="content-header">
        <h2>
        <i class="fa fa-list-alt"></i>
        <span>Data Retur</span>
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
                  <h6>
                  <a href="<?=base_url()?>c_retur/formtambah">
                    <button type="button" class="btn btn-primary btn-sm">
                      <i class="fa fa-plus"></i> Tambahkan Retur
                    </button>
                  </a>  
                  </h6>
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
                        <a href="<?=base_url()?>c_retur/hapus_retur_dan_detail/<?=$l->retuId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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
          <!-- END BASIC DATATABLES -->
        </div>
      </section>