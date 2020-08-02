
  
   <!-- Header -->
   <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-users"></i> Edit Karyawan</h1>
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
              
              <?php $dk = $this->superadmin_m->editkaryawan()->row();
             
              $unitk = $this->db->get('karyawan_unit')->result_array()?>
            <form action="<?= base_url('sirapat/superadmin/data_karyawan/update/'.$this->uri->segment(5)) ?>" method="post">
      <div class="container-fluid">
     
            <div class="row">

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">NIK/NIP</label>
              <input type="hidden" name="idkaryawan" value="<?= $dk->idkaryawan ?>">
              <input type="text" class="form-control" 
              id="nik_nip" placeholder="NIK/NIP" name="nik_nip" value="<?= $dk->nik_nip; ?>">
              <span class="help-block"><?= form_error('nik_nip', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
            <label for="formGroupExampleInput2">UNIT</label>

                        <select name="unit" id="unit" class="form-control" value="<?= set_value('unit'); ?>">
                        <option value="<?= $dk->unit; ?>"><?= $dk->unit; ?></option>
                        <?php foreach ($unitk as $p) : ?>
                        <option value="<?= $p['id']; ?>"><?= $p['unit']; ?></option>
                        <?php endforeach; ?>
                        </select>
                        <?= form_error('unit', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            </div>    
            
            <div class="col-lg-12">
            <div class="form-group">
              <label for="formGroupExampleInput2">Nama Karyawan</label>
              <input type="text" class="form-control" 
              id="nama_karyawan" placeholder="Nama karyawan" name="nama_karyawan" value="<?= $dk->nama_karyawan; ?>">
              <span class="help-block"><?= form_error('nama_karyawan', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">TEMPAT, TGL LAHIR</label>
              <input type="text" class="form-control" 
              id="ttl" placeholder="Tempat, tanggal lahir" name="ttl" value="<?= $dk->ttl; ?>">
              <span class="help-block"><?= form_error('ttl', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

                          

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">JABATAN</label>
              <input type="text" class="form-control" 
              id="jabatan" placeholder="Jabatan" name="jabatan" value="<?= $dk->jabatan; ?>">
              <span class="help-block"><?= form_error('jabatan', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">EMAIL</label>
              <input type="text" class="form-control" 
              id="email" placeholder="Email" name="email" value="<?= $dk->email; ?>">
              <span class="help-block"><?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="form-group">
              <label for="formGroupExampleInput2">NO HANDPHONE</label>
              <input type="text" class="form-control" 
              id="no_hp" placeholder="No Handphone" name="no_hp" value="<?= $dk->no_hp; ?>">
              <span class="help-block"><?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>

            <div class="col-lg-12">
            <div class="form-group">
              <label for="formGroupExampleInput2">ALAMAT</label>
              <input type="text" class="form-control" 
              id="alamat" placeholder="Alamat" name="alamat" value="<?= $dk->alamat; ?>">
              <span class="help-block"><?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?></span>
            </div>
            </div>
            <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Edit </button>
                            </div>
            </div>
            </div>
            </form>
          </div>
          </div>
          </div>
          </div>
          </div>


