     <!-- Header -->
     <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-users"></i> Absensi Karyawan</h2>
            </div>

            </div>
                </div>
                    </div>
                        </div>

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">

        <form action="<?= base_url('sirapat/admin/absensi/filterabsen') ?>" method="post" >
<div class="card text-center">
<div class="card-body">
<div class="row">
<div class="col-lg-2">
  <div class="form-group ">
              <select name="tahun" class="form-control form-control-sm">

              <!-- <option>Pilih Tahun</option> -->
              <?php $tahun_now = date("Y");
              for($i=2020;$i<=$tahun_now;$i++){ ?>

              <option value="<?= $i ?>"> <?= $i ?></option>
              <?php } ?>
              </select>
              <?= form_error('tahun', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

<div class="col-lg-3">
  <div class="form-group ">
              <select name="bulan" class="form-control form-control-sm">
              <option>Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
              </select>
              <?= form_error('gruprapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

          <div class="col-lg-3">
          <div class="form-group">
                <?php $grup = $this->db->get('grup_tipe')->result_array()?>
                        <select name="grup" class="form-control form-control-sm ">
                       <option>Pilih Grup</option>
                        <?php foreach ($grup as $g) : ?>
                        <option value="<?= $g['id']; ?>"><?= $g['nama_grup']; ?></option>
                        <?php endforeach; ?>
                        </select>
                        <?= form_error('unit', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            </div>

  <div class="col-lg-2">
  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-list "></i> Tampilkan Filter</button>
  </div>
  <div class="col-lg-2">
  <a href="<?= base_url('sirapat/admin/agenda/index2'); ?>" class="btn btn-dark btn-sm">
            <i class="fa fa-list "></i> Tampilkan Semua
            </a>
  </div>
 
  </div>
</div>
</div>
</form>

          <div class="card">

            <div class="card-header bg-transparent">

          <div class="row mt-3 mb-3">
          <div class="col">
            <h3 class="box-title">Daftar Rapat</h3>
          </div>

          <div class="col">
            <div class="float-right">
            
            </div>
            </div>
            </div>
          <?= $this->session->flashdata('message') ?>        

        <section class="content">
        <div class="table-responsive">
      <table class="table table-hover" id="absensi">
      <thead class="thead-light">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA AGENDA</th>
          <th scope="col">TANGGAL</th>
          <th scope="col">TEMPAT</th>
          <th scope="col">GRUP</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php $date = $this->input->post('tahun').'-'.$this->input->post('bulan');
      $g = $this->input->post('grup');
      $getagenda = $this->absensi_m->filterdata($date,$g)->result();
      ?>
      <?php foreach ($getagenda as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <td><?= $data->tempat ?></td>
          <td><?= $data->nama_grup; ?></td>

          <td>
          <?php $a = $this->db->get_where('absensi', ['id_agenda' => $data->id])->row();
          if(empty($a)){
          ?>
          <a href="<?= base_url('sirapat/admin/absensi/detail_absensi/'.$data->id); ?>" 
          class="btn btn-dark btn-sm"><i class="fa fa-forward"></i></a>
          <?php }else{?>
            <a href="<?= base_url('sirapat/admin/absensi/detail_absensi/'.$data->id); ?>" 
          class="btn btn-danger btn-sm"><i class="fa fa-forward"></i></a>
          <?php }?>
          </td>

        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
        
      </tbody>
      </table> 
      </div>
      <!-- endtabel -->
      
      </section>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>


<script>
function deletedata($id) {

Swal.fire({
    title: 'Apakaah anda yakin',
    text: "Data Agenda Akan dihapus",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!'

}, 
function() {
  $.ajax({
    url: "<?= base_url('sirapat/admin/agenda/del/'); ?>",
    type: "get",
    data: {id:id},
    success:function() {
      Swal.fire('Data berhasil di hapus', 'success');
    }
  });
});

  
}
</script>