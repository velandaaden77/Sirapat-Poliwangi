<!-- Header -->
<div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
            <div class="col-lg-12 text-center">
            <h2 class="text-white "><i class="far fa-edit"></i> Update Agenda Rapat</h2>
            <?php $ag = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row(); ?>
            <h4 class="text-white "><?= $ag->nama_agenda ?></h4>

            </div>
          </div>
            
          
                </div>
            </div>
            </div>

<div class="content-wraper">
<div class="content">
<div class="container-fluid mt--6 ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
 
            <?php foreach($daftar_agenda as $da) { ?>

              <?= form_open_multipart('sirapat/admin/Update'); ?>

  <div class="row">
  
  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Nomor Surat</label>
    <input type="hidden" name="idagenda" value="<?= $this->uri->segment(5)?>">
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Nomor Surat" name="nomor_agenda"  value="<?= $da->nomor_agenda ?>">
    <?= form_error('nomor_agenda', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-8">
  <div class="form-group">
    <label for="formGroupExampleInput2">Kepada </label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Kepada" name="peserta_rapat"  value="<?= $da->peserta_rapat ?>">
    <?= form_error('peserta_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="text" class="form-control" 
    id="datepicker" placeholder="Masukan Tanggal" name="tanggal" autocomplete="off"  value="<?= $da->tanggal ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Jam Mulai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="jmmulai"  value="<?= $da->jam_mulai ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Jam Selesai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="jmselesai" value="<?= $da->jam_selesai ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tempat</label>
    <input type="text" class="form-control" 
    id="tempat" placeholder="Tempat" name="tempat"  value="<?= $da->tempat ?>">
  <?= form_error('tempat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <hr class="bg-primary">

  <div class="col-lg-8">
  <div class="form-group <?= form_error('nama_agenda') ? 'has-error' : null?>">
    <label for="formGroupExampleInput2">Nama Agenda</label>
    <input type="text" class="form-control" 
    id="nama_agenda" placeholder="Agenda" name="nama_agenda"  value="<?= $da->nama_agenda ?>">
    <span class="help-block"><?= form_error('nama_agenda', '<small class="text-danger pl-1">', '</small>'); ?></span>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Hal</label>
    <input type="text"  class="form-control" 
    id="formGroupExampleInput2" placeholder="Hal" name="hal"  value="<?= $da->hal ?>"></input>
    <?= form_error('hal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Lampiran</label>
    <input type="text"  class="form-control" 
    id="formGroupExampleInput2" placeholder="Lampiran" name="lampiran1"  value="<?= $da->lampiran ?>"></input>
    <?= form_error('lampiran1', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Isi Lampiran</label>
    
    <div class="custom-file">
    <?= $da->lampiran_file ?>
    <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
    
    </div>
    <?= form_error('lampiran', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
  <label for="formGroupExampleInput2">Grup Rapat</label>

              <select name="gruprapat" id="gruprapat" class="form-control" >
              <option value="<?= $da->id_tipegrup ?>"><?= $da->nama_grup ?></option>
              <?php 
              $grup = $this->db->get('grup_tipe')->result_array();
              foreach ($grup as $g) : ?>
              <option value="<?= $g['id']; ?>"><?= $g['nama_grup']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('gruprapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>
  
 <!-- start -->
  
 <!-- end -->

  </div>

  <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>

            <?php } ?>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 <!-- Membuat datepicker -->
 <script>
    // set minDate to 0 for today's date
    $('#datepicker').datepicker({ minDate: 0 });
 </script>
