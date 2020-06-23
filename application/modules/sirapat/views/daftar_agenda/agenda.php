  <!-- Header -->
  <div class="header bg-transparent pb-6">
      <div class="container-fluid">
        <div class="header-body">
        
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-primary d-inline-block mb-0 align-center">Daftar Agenda</h6>
              
            </div>
          </div>
            
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                  
        </div>
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

            <h2 class="box-title mt-3">Daftar Agenda</h2>
            
            <a href="<?= base_url('sirapat/admin/UnggahAgenda'); ?>" class="btn btn-primary btn-flat mb-5">
            <i class="fa fa-plus "></i>Tambah Agenda
            </a>

          <?= $this->session->flashdata('message') ?>        

        <section class="content">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA AGENDA</th>
          <th scope="col">TANGGAL</th>
          <th scope="col">TEMPAT</th>
          <th scope="col">NOMOR AGENDA</th>
          <th scope="col">HAL</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($row->result() as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <td><?= $data->tempat ?></td>
          <td><?= $data->nomor_agenda; ?></td>
          <td><?= $data->hal; ?></td>

          <td>
          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-search-plus"></i></button>
          </td>

          <td class="pl-0">
          <?= anchor('sirapat/admin/agenda/edit/'.$data->id, 
          '<button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>')?>
          </td>

          <td class="pl-0">
          <?= anchor('sirapat/admin/agenda/validasi/'.$data->id, 
          '<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="validasi"><i class="fa fa-check"></i></button>')?>
          </td>

          <td class="pl-0">
            <a href="<?= base_url('sirapat/admin/agenda/del/' . $data->id); ?>" 
            class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="hapus"><i class="fa fa-trash"></i></a>
          </td>


      <!-- Modal -->
      <div class="modal fade" id="detailmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Agenda</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="container-fluid">

              <div class="row">
                <div class="col-sm-3">
                   <h3>Nomor Agenda</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->nomor_agenda ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Nama Agenda</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->nama_agenda ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Tanggal</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->tanggal ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Tempat</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->tempat ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Jenis Rapat</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->idjenis_rapat ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Peserta Rapat</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->peserta_rapat ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Lampiran</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->lampiran ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Hal</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $data->hal ?></span>
                </div>
                </div>

              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>

          
              <a href="<?= base_url('sirapat/admin/agenda/print/'.$data->id) ?>" target="_blank" class="btn btn-primary" >

              <i class="fa fa-print">Print</i></a>
              <a href="<?= base_url('sirapat/admin/agenda/pdf/'.$data->id) ?>" target="_blank" class="btn btn-danger" >
              <i class="fa fa-file">PDF</i></a>
            </div>
          </div>
        </div>
      </div>


        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
        
      </tbody>
      </table> 

      <?= $this->pagination->create_links(); ?> 
      
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