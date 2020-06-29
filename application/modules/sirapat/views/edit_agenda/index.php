<div class="content-wraper">
<div class="content">
<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

            <?php foreach($daftar_agenda as $da) { ?>

              <?= form_open_multipart('sirapat/admin/Update'); ?>

  <div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Nama Agenda</label>
    <input type="hidden" class="form-control" 
    id="formGroupExampleInput2" placeholder="Agenda" name="id" 
    value="<?= $da->id ?>">
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Agenda" name="nama_agenda" 
    value="<?= $da->nama_agenda ?>">
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
  <label for="formGroupExampleInput2">Jenis Rapat</label>
  <select name="jenis_rapat" id="jenis_rapat" class="form-control">
            <option value=""><?= $da->idjenis_rapat ?></option>
            <?php foreach ($jenisrapat as $m) : ?>
            <option value="<?= $m['id']; ?>"><?= $m['rapat']; ?></option>
            <?php endforeach; ?>
            </select>
            </div>
            </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tanggal</label>
    <input type="date" class="form-control" 
    id="formGroupExampleInput2" placeholder="Another input placeholder" name="tanggal"
    value="<?= $da->tanggal ?>"
    >
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Tempat</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Tempat" name="tempat" 
    value="<?= $da->tempat ?>">
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Jam Mulai</label>
    <input type="text" class="form-control" 
    id="waktu" placeholder="" name="jam_mulai" value="<?= $da->jam_mulai ?>">
  <?= form_error('jam_mulai', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Jam Selesai</label>
    <input type="text" class="form-control" 
    id="waktu" placeholder="" name="jam_selesai" value="<?= $da->jam_selesai ?>">
  <?= form_error('jam_selesai', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Peserta Rapat</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Peserta Rapat" name="peserta_rapat" 
    value="<?= $da->peserta_rapat ?>">
  </div>
  </div>

  <div class="col-lg-3">
  <div class="form-group">
  <label for="formGroupExampleInput2">Program Studi</label>

              <select name="prodi" id="prodi" class="form-control">
              <option value=""><?= $da->id_prodi ?></option>
              <?php foreach ($prodi as $p) : ?>
              <option value="<?= $p['id']; ?>"><?= $p['prodi']; ?></option>
              <?php endforeach; ?>
              </select>
              <?= form_error('jenis_rapat', '<small class="text-danger pl-1">', '</small>'); ?>
              </div>
  </div>

 

  <div class="col-lg-3">
  <div class="form-group">
    <label for="formGroupExampleInput2">Nomor Agenda</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Nomor Agenda" name="nomor_agenda"
    value="<?= $da->nomor_agenda ?>">
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Hal</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Hal" name="hal"
    value="<?= $da->hal ?>">
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Lampiran</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="lampiran" name="lampiran"
    value="<?= $da->lampiran ?>">
    <label class="custom-file-label" for="lampiran" value="<?= $da->lampiran ?>">Choose file</label>
    </div>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-danger">Hapus</button>

            <?php } ?>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>