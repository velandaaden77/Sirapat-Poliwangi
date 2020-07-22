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