a

    <!-- content -->
    <!-- Header -->
    <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-file-signature"></i> Daftar Validasi Agenda</h2>
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
        <div class="card-header">
            <h4>Daftar Agenda Yang Perlu di Validasi</h4>
        </div>

        <div class="card-body">
          <!-- <?= $this->session->flashdata('message') ?>         -->
          <div class="swal" data-swal="<?= $this->session->flashdata('message'); ?>"></div>

      <?php foreach ($notifvalidasi as $n) { ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>Validasi Baru!!!</strong> <span class="font-italic"><?= $n->nama_agenda ?></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <?php } ?>

      <section class="content">
      <table class="table table-hover table-responsive-md" id="validasiagenda">
      <thead class="thead-light">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA AGENDA</th>
          <th scope="col">TANGGAL</th>
          <th scope="col">TEMPAT</th>
          <th scope="col">STATUS</th>
          <th scope="col"></th>
          <!-- <th scope="col"></th> -->
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php foreach ($validasi as $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <td><?= $data->tempat; ?></td>

          <?php $validasi = $this->db->get_where('validasi_agenda', ['id_pimpinan' => $this->session->userdata('role_id_karyawan')])->result();
          if($data->status == 1){
          ?>
          <td><span class="text-primary">Sudah Di Validasi</span></td>
          <?php }else{ ?>
          <td> <span class="text-danger">Belum Di Validasi</span></td>
          <?php } ?>
    
          <td >

          <button class="btn btn-primary btn-sm" 
          data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-info"></i> Detail</button>

          

          <?php if($data->status == 1 ){ ?>

          <a href="<?= base_url('sirapat/user/ketua/batalvalidasi/').$data->id_validasi.'/'.$this->uri->segment(5) ?>"
          class="btn btn-danger btn-sm btn-batal"><i class="fas fa-fw fa-undo"></i> Batal</a>
            
          
          <?php }else{ ?>

          <?= anchor('sirapat/user/ketua/qrcode/'.$data->id_validasi.'/'.$this->uri->segment(5), 
          '<button class="btn btn-dark btn-sm"><i class="fas fa-fw fa-qrcode"></i> QR Code</button>')?>

          <a href="<?= base_url('sirapat/user/ketua/validasimanual/').$data->id_validasi.'/'.$this->uri->segment(5) ?>"
          class="btn btn-warning btn-sm btn-validm"><i class="fas fa-fw fa-file-signature"></i> Validasi Manual</a>

          
          <?php } ?>
          </td>

          <!-- <?php if($data->status == 1 ){ ?>
          <?php }else{ ?>
          <td>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" 
            data-validasi="<?=$data->id_validasi?>" data-agenda="<?=$data->id_agenda?>" data-grup="<?=$data->id_tipe?>">
            <span>Validasi Manual</span>
          </div>
          
          </td>
          <?php } ?> -->

           
      <!-- Modal -->
      <div class="modal fade" id="detailmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Agenda Rapat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div class="container-fluid">

            
            <div class="row">

            <?php if($data->status == 1) { ?>
            <div class="col-lg-4 text-center">
            <img src="<?= base_url('assets/file/qr-code/').$data->qrcode ?>" class="img-thumbnail"><br>
            <h5><?= $data->nama_karyawan ?></h5>
            </div>
            <?php }else{ ?>

            <?php } ?>

            <div class="col-lg-8">
            <div class="row">
              <div class="col-sm-3">
                <h5>Nomor Surat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->nomor_agenda ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Lampiran</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->lampiran ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Hal</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->hal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Tanggal</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->tanggal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Jam Mulai</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->jam_mulai ?> WIB</span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Jam Selesai</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->jam_selesai ?> WIB</span>
              </div>
              </div>

              
              <div class="row">
              <div class="col-sm-3">
                <h5>Tempat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->tempat ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Grup Rapat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->nama_grup ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Peserta Rapat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->peserta_rapat ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Nama Agenda</h5>
              </div>
              <div class="col-sm-9">
                  <span class="text-weight-bold">: <?= $data->nama_agenda ?></span>
              </div>
              </div>

            </div>

            </div>
            <!-- end row -->
            </div>

            </div>
            <div class="modal-footer">
              <a href="<?= base_url('sirapat/admin/agenda/print/'.$data->id) ?>" target="_blank" class="btn btn-primary btn-sm" >
              <i class="fa fa-print">Print</i></a>

              <a href="<?= base_url('sirapat/admin/agenda/pdf/'.$data->id) ?>" target="_blank" class="btn btn-danger btn-sm" >
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

      
      </section>
      </div>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>

    <!-- end content -->

    <!-- <script type="text/javascript">
  ambildata( );
  function ambildata() {
    $.ajax({
      type: 'post',
      url:"<?= base_url('sirapat/user/ketua/validasiagenda') ?>",
      datatype: 'json',
      success: function() {
        console.log();
        
      }
    });
  }
  </script> -->

  
        
