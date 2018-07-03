<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Data Kategori Barang</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <a href="<?=base_url()?>c_kategori/formtambah">
                  <h6><button type="button" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambahkan kategori Barang
                  </button></h6>
                </a>  
                <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div> 
                <table id="dataTables1" class="data-table table table-bordered table-striped" >
                  <thead>
                    <tr>
                      <th class="col-md-1">No</th>
                      <th class="col-md-3">Kode Barang</th>
                      <th class="col-md-5">Nama Barang</th>
                      <th class="col-md-3">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no=1;
                      foreach ($list as $l) {
                    ?>

                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$l->ktgrId?></td>
                      <td><?=$l->ktgrNama?></td>
                      <td>
                        <a href="<?=base_url()?>c_kategori/formubah/<?=$l->ktgrId?>">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a>
                        <a href="<?=base_url()?>c_kategori/hapuskategori/<?=$l->ktgrId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                          <button type="button" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>                      
                          </button>
                        </a>                      
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
