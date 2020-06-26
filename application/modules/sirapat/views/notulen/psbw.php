<div class="container-fluid ">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">
            <h2 class="box-title mb-3">Permasalahan, Solusi, dan Batas Waktu</h2>

<?= $this->session->flashdata('message'); ?>

<form action="<?= base_url('sirapat/admin/notulen/tambahpsbw'); ?>" method="post">

  <div class="row">

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Topik / Bahasan</label>
    <input type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Topik / Bahasan" name="topikbahasan" value="<?= set_value('topibahasank'); ?>">
    <?= form_error('topikbahasan', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Uraian / Permasalahan</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Uraian / Permasalahan" name="uraian" value="<?= set_value('uraian'); ?>"></textarea>
    <?= form_error('uraian', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-12">
  <div class="form-group">
    <label for="formGroupExampleInput2">Solusi</label>
    <textarea  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Solusi" name="solusi" value="<?= set_value('solusi'); ?>"></textarea>
    <?= form_error('solusi', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">PIC</label>
    <input  type="text" class="form-control" 
    id="formGroupExampleInput2" placeholder="Pic" name="pic" value="<?= set_value('pic'); ?>">
    <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-6">
  <div class="form-group">
    <label for="formGroupExampleInput2">Batas Waktu</label>
    <input  type="date" class="form-control" 
    id="formGroupExampleInput2" placeholder="Batas Waktu" name="bataswaktu" value="<?= set_value('bataswaktu'); ?>">
    <?= form_error('bataswaktu', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
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
                <th scope="col">TOPIK/BAHASAN</th>
                <th scope="col">URAIAN/PERMASALAHAN</th>
                <th scope="col">SOLUSI</th>
                <th scope="col">PIC</th>
                <th scope="col">BATAS WAKTU</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
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