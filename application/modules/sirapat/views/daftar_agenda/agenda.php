     <!-- Header -->
     <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         <?php $g = $this->db->get_where('grup_tipe', ['id' => $this->session->userdata('id_tipe')])->row() ?>
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-book"></i>  Agenda Grup <?= $g->nama_grup ?></h2>
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

            <div class="card-header bg-transparent">

          <div class="row mt-3 mb-3">
          <div class="col">
          <a href="<?= base_url('sirapat/admin/agenda/index2'); ?>" class="btn btn-dark btn-sm">
            <i class="fa fa-list "></i> Status Agenda Rapat 
            </a>
            <!-- <h3 class="box-title">Daftar Agenda Rapat</h3> -->
          </div>

          <div class="col">
            <div class="float-right">
            <a href="<?= base_url('sirapat/admin/UnggahAgenda'); ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus "></i> Tambah Agenda
            </a>
            </div>

            </div>
            </div>
            <div class="swal" data-swal="<?= $this->session->flashdata('message'); ?>"></div>        

        <section class="content">
        <div class="table-responsive">

      <table class="table table-hover" id="agenda">
      <thead class="thead-light">
     
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA AGENDA</th>
          <th scope="col">TANGGAL</th>
          <!-- <th scope="col">TEMPAT</th> -->
          <th scope="col">GRUP</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; ?>
      <?php 
      $agenda = $this->agenda_m->getagenda();
      foreach ($getagenda as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <!-- <td><?= $data->tempat ?></td> -->
          <td><?= $data->nama_grup; ?></td>

          <td>
          <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-search-plus"></i></button>
          <?php $validasi = $this->db->get_where('validasi_agenda', ['id_agenda' => $data->id])->row();  
          if(empty($validasi)){
          ?>

          
          <?= anchor('sirapat/admin/agenda/edit/'.$data->id, 
          '<button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>')?>
         

         
          <?= anchor('sirapat/admin/agenda/validasi/'.$data->id, 
          '<button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Belum dikirim"><i class="fa fa-check"></i></button>')?>
          
          
          <a href="<?= base_url('sirapat/admin/agenda/del/' . $data->id); ?>" 
            class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" data-placement="bottom" title="hapus"><i class="fa fa-trash"></i></a>
          <?php }else{ ?>
            <?= anchor('sirapat/admin/agenda/validasi/'.$data->id, 
          '<button class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="bottom" title="Sudah Dikirim"><i class="fa fa-check"></i></button>')?>
            
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#telegram"><i class="fa fa-paper-plane"></i></button>
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#a"><i class="fab fa-whatsapp"></i></button>
           
           <!-- Modal -->
      <div class="modal fade" id="a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kirim Whatsapp</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="-body">
              
            <div class="container-fluid">
           
              <form action="<?= base_url('sirapat/admin/undangan/sendwa')?>" method="post" enctype="multipart/form-data">
            <div class="row">

            <div class="col-sm-12">
            <div class="form-group">
            
            <?php $gt = $this->db->get_where('grup_tipe', ['id' => $this->session->userdata('id_tipe')])->row() ?>
                <input type="hidden" name="idtele" value=" <?= $gt->id_grup_tele ?>">
             </div>
            </div>

            <div class="col-sm-12">
            <div class="form-group">
                <label for="document">File </label>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="document" name="document">
               
                </div>
            </div>
            

            </div>
            <!-- end row -->

            </div>

        
            </div>
            <div class="modal-footer">

             <button type="submit" class="btn btn-success" value="sendDocument"><i class="fab fa-whatsapp"></i> Kirim</button>
           
            </div>
            </form>
          </div>
        </div>
      </div>
          
          
          <?php } ?>

         
          </td>

         
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

            <div class="row">
            <div class="col-sm-3">
              <h5>Isi Lampiran</h5>
            </div>
            <?php if(empty($data->lampiran_file)){ ?>
              <div class="col-sm-9">
            : -
            </div>
            <?php }else{ ?>
            <div class="col-sm-9">
            <a href="<?= base_url('assets/dashboard/file/').$data->lampiran_file?>"> <?= $data->lampiran_file ?></a>
            </div>
            <?php } ?>
            </div>

            </div>

            </div>
            <!-- end row -->

            </div>

        
            </div>
            <div class="modal-footer">

            <?php $validasi = $this->db->get_where('validasi_agenda', ['id_agenda' => $data->id])->row(); 
            if(empty($validasi)){
            ?>
              <a href="<?= base_url('sirapat/admin/agenda/print/'.$data->id) ?>" target="_blank" class="btn btn-primary btn-sm disabled" >
              <i class="fa fa-print">Print</i></a>
              <a href="<?= base_url('sirapat/admin/agenda/pdf/'.$data->id) ?>" target="_blank" class="btn btn-danger btn-sm disabled" >
              <i class="fa fa-file">PDF</i></a>
            <?php }else{ ?>
              <a href="<?= base_url('sirapat/admin/agenda/print/'.$data->id) ?>" target="_blank" class="btn btn-primary btn-sm" >
              <i class="fa fa-print">Print</i></a>
              <a href="<?= base_url('sirapat/admin/agenda/pdf/'.$data->id) ?>" target="_blank" class="btn btn-danger btn-sm" >
              <i class="fa fa-file">PDF</i></a>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>


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

           <!-- Modal -->
      <div class="modal fade" id="telegram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kirim Telegram</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div class="container-fluid">
           
              <form action="<?= base_url('sirapat/admin/undangan/sendtele')?>" method="post">
            <div class="row">

            <div class="col-sm-12">
            <div class="form-group">
            
            <?php $gt = $this->db->get_where('grup_tipe', ['id' => $this->session->userdata('id_tipe')])->row() ?>
                <input type="hidden" name="idtele" value=" <?= $gt->id_grup_tele ?>">
             </div>
            </div>

            <div class="col-sm-12">
            <div class="form-group">
                <label for="caption">Caption </label>
                <input type="text" class="form-control" 
                id="caption" placeholder="Caption" name="caption" autocomplete="off">
                <?= form_error('caption', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            </div>

            <div class="col-sm-12">
            <div class="form-group">
                <label for="document">File </label>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="document" name="document">
               
                </div>
            </div>
            

            </div>
            <!-- end row -->

            </div>

        
            </div>
            <div class="modal-footer">

             <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirim</button>
           
            </div>
            </form>
          </div>
        </div>
      </div>



  
  <!-- Membuat tooltip -->
  <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    });
    </script>

     