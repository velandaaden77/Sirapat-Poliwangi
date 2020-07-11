  
   <!-- Header -->
   <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
         <?php $gruprapat = $this->db->get_where('grup_tipe', ['id' => $this->session->userdata('idgrup')])->row();?>

            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-users"></i> Grup <?= $gruprapat->nama_grup ?></h2>
            </div>
          </div>
            
          
          </div>
            </div>
            </div>


    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

            <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary btn-sm mb-5 mt-3" data-toggle="modal" data-target="#addanggota">Tambah Anggota</a>
              <div class="col-lg-12">
              
    <div class="table-responsive">
      <table class="table table-hover" id="anggota">
      <thead>
        <tr>
          <th scope="col">NO</th>

          <th scope="col">NAMA GRUP</th>
          <th scope="col">NAMA ANGGOTA</th>
          <th scope="col">GRUP JABATAN</th>
          <th scope="col">AKSI</th>
          <!-- <th scope="col">NO HP</th>
          <th scope="col">ALAMAT</th> -->
        </tr>
      </thead>
      <tbody>

      <?php $i=1 ?>
        <?php foreach($anggota as $g) {
          if($g->jabatan=='Ketua'){
            $ketua = '1';
          }
          ?>
          
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $g->nama_grup ?></td>
          <td><?= $g->nama_karyawan ?></td>
          <td><?= $g->jabatan ?></td>
          <td>
          
          <a href="" 
          data-toggle="modal" data-target="#editanggota<?= $i ?>" class="badge badge-info">Edit</a> 

          <a href="<?= base_url('sirapat/grup/anggota/delanggota/').$g->id_grup ?>"  class="badge badge-danger">Delete</a> 
          
          </td>
        </tr>

        <!-- Modal -->
<div class="modal fade" id="editanggota<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="editanggota" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editanggota">Edit Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      <form action="<?= base_url('sirapat/grup/anggota/editanggota'); ?>" method="post">
        <div class="form-group">
        <label for="formGroupExampleInput2">Nama Karyawan</label>
        <input type="hidden" name="idgrup" value="<?= $g->id_grup ?>">
        <input type="hidden" id="gruptipe" name="gruptipe" value="<?= $this->session->userdata('idgrup') ?>">
        <!-- <input type="text" class="form-control" disabled name="idkaryawan" value="<?= $g->idkaryawan ?>"> -->
        <input type="text" class="form-control" disabled name="karyawan" value="<?= $g->nama_karyawan ?>">
                    
        </div>

        <div class="form-group">
        <label for="formGroupExampleInput2">Jabatan Grup</label>
        
                    <select name="grupjabatan" class="form-control">
                    <option value="<?= $g->idjabatan ?>"><?= $g->jabatan ?></option>
                    <?php 
                    $grupjabatan = $this->db->get('grup_jabatan')->result_array();
                    foreach ($grupjabatan as $gj) : ?>

                    <?php
                   if($ketua=='1'){ 
                     if($gj['jabatan']=='Ketua'){}else{ ?> 
                     
                    <option value="<?= $gj['idjabatan']; ?>"><?= $gj['jabatan']; ?></option>
                     
                     <?php }
                     ?>

                    <?php
                   }else{
                   ?>

                    <option value="<?= $gj['idjabatan']; ?>"><?= $gj['jabatan']; ?></option>
                    <?php } endforeach; ?>
                    </select>
                    <?= form_error('grupjabatan', '<small class="text-danger pl-1">', '</small>'); ?>
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

      <form action="<?= base_url('sirapat/grup/anggota/addanggota'); ?>" method="post">
        <div class="form-group">
        <label for="formGroupExampleInput2">Nama Karyawan</label>
        <input type="hidden" id="gruptipe" name="gruptipe" value="<?= $this->session->userdata('idgrup') ?>">

       
                    <select name="karyawan" id="karyawan" class="form-control">
                    <option value="">Pilih Karyawan</option>
                    <?php foreach ($karyawan as $k) : ?>
                    <?php

                      $gr_kar = $this->db->get_where('grup_rapat',['id_karyawan' => $k['idkaryawan'], 'id_tipe' => $this->session->userdata('idgrup')])->row();
                     
                      if(empty($gr_kar)){
                        echo $this->session->userdata('idgrup');
                        ?>  
                      
                    <option value="<?= $k['idkaryawan']; ?>"><?= $k['nama_karyawan']; ?></option>
                      <?php }else{} ?>
                      
                    <?php endforeach; ?>
                    </select>
                    <?= form_error('karyawan', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>

        <div class="form-group">
        <label for="formGroupExampleInput2">Jabatan Grup</label>
        
                    <select name="grupjabatan" class="form-control">
                    <option value="">Pilih Jabatan</option>
                    <?php 
                    $grupjabatan = $this->db->get('grup_jabatan')->result_array();
                    foreach ($grupjabatan as $gj) : ?>

                   <?php
                   if($ketua=='1'){ 
                     if($gj['jabatan']=='Ketua'){}else{ ?> 
                     
                    <option value="<?= $gj['idjabatan']; ?>"><?= $gj['jabatan']; ?></option>

                     
                     <?php }
                     ?>

                    <?php
                   }else{
                   ?>

                    <option value="<?= $gj['idjabatan']; ?>"><?= $gj['jabatan']; ?></option>

                    <?php } endforeach; ?>
                    </select>
                    <?= form_error('grupjabatan', '<small class="text-danger pl-1">', '</small>'); ?>
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


      
      
