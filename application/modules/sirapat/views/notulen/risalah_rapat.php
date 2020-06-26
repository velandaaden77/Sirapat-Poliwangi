<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Risalah Rapat</h2>

<?= $this->session->flashdata('message'); ?>

<form action="<?= base_url('sirapat/admin/notulen/tambahnotulen'); ?>" method="post">

  <div class="row">

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Subtopik</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Subtopik" name="subtopik" value="<?= set_value('pic'); ?>">
    <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Catatan Kaki</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Catatan Kaki" name="catatankaki" value="<?= set_value('ringkasan'); ?>"></textarea>
    <?= form_error('ringkasan', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
  <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
  <button type="submit" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah Risalah Rapat</button>

</form>


            

</div>
</div>
            <div class="card">
            <div class="card-body">

            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">SUBTOPIK</th>
                <th scope="col">CATATAN KAKI</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                  <td >
                  <a href="<?= base_url('sirapat/admin/notulen/viewnotulen/'); ?>" 
                  class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
                  </td>

                </tr>
            </tbody>
            </table>
            </div>

            </div>
            </div>
</div>
</div>
</div>