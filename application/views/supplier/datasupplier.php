<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Data Supplier</h2>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <a href="<?=base_url()?>c_supplier/formtambah">
                  <button type="button" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambahkan Supplier
                  </button>
                </a>  
                <div id="info-alert">
                  <?=@$this->session->flashdata('msg')?>
                </div>
                <table id="dataTables1" class="data-table table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="col-md-1">No</th>
                      <th class="col-md-3">Kode Supplier</th>
                      <th class="col-md-3">Nama Supplier</th>
                      <th class="col-md-3">Nama Owner</th>
                      <th class="col-md-3">Alamat</th>
                      <th class="col-md-3">No Telp</th>
                      <th class="col-md-3">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; foreach($list as $data){?>
                    <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$data->spliId?></td>
                      <td><?=$data->spliNama?></td>
                      <td><?=$data->spliOwner?></td>
                      <td><?=$data->spliAlamat?></td>
                      <td><?=$data->spliTelp?></td>
                      <td>
                        <a href="<?=base_url()?>c_supplier/formubah/<?=$data->spliId?>">
                          <button type="button" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a>
                        <a href="<?=base_url()?>c_supplier/hapuskategori/<?=$data->spliId?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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