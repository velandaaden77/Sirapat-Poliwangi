<div class="container-fluid mt-3">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Notulensi Rapat</h2>

<?= $this->session->flashdata('message'); ?>
<?= form_open_multipart('sirapat/admin/notulen/tambahnotulen'); ?>

  <div class="row">
  <input type="hidden" class="form-control" 
    id="id_agenda" name="id_agenda" value="<?= $this->uri->segment(5) ?>">
  
  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="text" class="form-control" 
    id="datepicker" placeholder="Masukan Tanggal" name="tanggal" autocomplete="off" value="<?= set_value('tanggal'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Ruang Rapat</label>
    <input type="text" class="form-control" 
    id="ruang_rapat" placeholder="Ruang Rapat" name="ruang_rapat" value="<?= set_value('ruang_rapat'); ?>">
  <?= form_error('ruang_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-2">
  <div class="form-group">
    <label for="formGroupExampleInput2">Waktu Mulai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="waktumulai" value="<?= set_value('waktumulai'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-2">
  <div class="form-group">
    <label for="formGroupExampleInput2">Waktu Selesai</label>
    <input type="time" class="form-control" 
    id="waktu" placeholder="Contoh : 12:00 Wib" name="waktuselesai"value="<?= set_value('waktuselesai'); ?>">
  <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Daftar Hadir</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Daftar Hadir" name="daftar_hadir" value="<?= set_value('daftar_hadir'); ?>">
    <?= form_error('daftar_hadir', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Total Hadir</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Total Hadir" name="total_hadir" value="<?= set_value('total_hadir'); ?>">
    <?= form_error('total_hadir', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">PIC</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="PIC" name="pic" value="<?= set_value('pic'); ?>">
    <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Ringkasan</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Ringkasan" name="ringkasan" value="<?= set_value('ringkasan'); ?>"></textarea>
    <?= form_error('ringkasan', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Dokumentasi Rapat</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="foto" name="foto_rapat">
    <label class="custom-file-label" for="foto">Upload Foto</label>
    </div>
    <?= form_error('foto_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>

  <?php form_close(); ?>

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

