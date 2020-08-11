  
   <!-- Header -->
   <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
         <?php $gruprapat = $this->db->get_where('grup_tipe', ['id' => $this->uri->segment(5)])->row();?>

            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-users"></i> <?= $gruprapat->nama_grup ?></h1>
            </div>
          </div>
            
          
          </div>
            </div>
            </div>
    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                </div>
            <?php endif ?>
            <div class="swal" data-swal="<?= $this->session->flashdata('message'); ?>"></div>  
            <div class="swal1" data-swal1="<?= $this->session->flashdata('message1'); ?>"></div> 
              
            <?= form_error('karyawan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <div class="swal" data-swal="<?= $this->session->flashdata('message'); ?>"></div>     

              <button type="button" disabled class="btn btn-secondary mb-5 mt-3">Jumlah Anggota : <?= $jmlanggota ?></button>
              <a href="" class="btn btn-primary mb-5 mt-3" data-toggle="modal" data-target="#addanggota">Tambah Anggota</a>
              
              <a href="" class="btn btn-danger mb-5 mt-3" data-toggle="modal" data-target="#editgrup">Edit Grup</a>
             
              <div class="col-lg-12">
              
              <div class="table-responsive">
      <table class="table table-hover" id="grupdata">
      <thead>
        <tr>
          <th scope="col">NO</th>

          <th scope="col">NAMA GRUP</th>
          <th scope="col">NAMA ANGGOTA</th>
          <th scope="col">UNIT</th>
          <th scope="col">AKSI</th>
          
        </tr>
      </thead>
      <tbody>

      <?php $i=1 ?>
        <?php foreach($grup as $g) { ?>

        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $g->nama_grup ?></td>
          <td><?= $g->nama_karyawan ?></td>
          <td><?= $g->unit ?></td>
          <td>
          
          <a href="<?= base_url('sirapat/superadmin/manajemen_grup/delanggota/').$g->id_grup.'/'.$this->uri->segment(5); ?>"  class="badge badge-danger tombol-hapus">Hapus</a> 
          
          </td>
        </tr>

        <?php $i++; ?>
        <?php } ?>
      
        
      </tbody>
      </table>  
      </div>
      </div>
     
          </div>
          </div>
          </div>
          </div>
          </div>


<!-- Modal -->
<div class="modal fade" id="addanggota" tabindex="-1" role="dialog" aria-labelledby="addanggota" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addanggota">Tambah Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     
      <div class="modal-body">

      <form action="<?= base_url('sirapat/superadmin/manajemen_grup/addanggota'); ?>" method="post">
        <div class="form-group">
        <label for="formGroupExampleInput2">karyawan</label>
        <input type="hidden" id="gruptipe" name="gruptipe" value="<?= $this->uri->segment(5) ?>">

        <select name="karyawan" id="kar" class="form-control">
                    <option value="">Pilih Karyawan</option>
                    <?php foreach ($karyawan as $k) : ?>
                    <?php

                      $gr_kar = $this->db->get_where('grup_rapat',['id_karyawan' => $k['idkaryawan'], 'id_tipe' => $this->uri->segment(5)])->row();
                     
                      if(empty($gr_kar)){
                        echo $this->session->userdata('idgrup');
                        ?>  
                      
                    <option value="<?= $k['idkaryawan']; ?>"><?= $k['nama_karyawan']; ?></option>
                      <?php }else{} ?>
                      
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('karyawan', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>

        

      </div>

      <div class="modal-footer">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editgrup" tabindex="-1" role="dialog" aria-labelledby="editgrup" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editgrup">Edit Grup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     
      <div class="modal-body">

      <form action="<?= base_url('sirapat/superadmin/manajemen_grup/editgrup'); ?>" method="post">
        
        <?php $g = $this->db->get_where('grup_tipe', ['id' => $this->uri->segment(5)])->row()?>
          <div class="col-lg-12">
            <div class="form-group">
              <label for="formGroupExampleInput2">Nama Grup</label>
              <input type="hidden" name="id" value="<?= $this->uri->segment(5) ?>">
              <input type="text" class="form-control" 
              id="Nama Grup" placeholder="Nama Grup" name="grup" value="<?= $g->nama_grup; ?>">
              <span class="help-block"><?= form_error('grup', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

      </div>

      <div class="modal-footer">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>

      
      
<script type="text/javascript">
      $(document).ready(function() { 
      $("#kar").select2();
      }
      </script>