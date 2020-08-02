     <!-- Header -->
     <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-book"></i>  Status Agenda Rapat</h2>
            </div>
            </div>
          
          </div>
            </div>
             </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">

        <form action="<?= base_url('sirapat/admin/agenda/filteragenda') ?>" method="post" >
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
          <a href="<?= base_url('sirapat/admin/agenda/index'); ?>" class="btn btn-danger btn-sm">
            <i class="fa fa-list "></i> Daftar Agenda Rapat
            </a>
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
      <?php $date = $this->input->post('tahun').'-'.$this->input->post('bulan');
      $g = $this->input->post('grup');
      $status = $this->agenda_m->filter($date,$g)->result();
      // echo $date, $g;
      ?>
      <?php foreach ($status as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <!-- <td><?= $data->tempat ?></td> -->
          <td><?= $data->nama_grup; ?></td>

          <td>
          <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-search-plus"></i></button>
          <?php $validasi = $this->db->get_where('validasi_agenda', ['id_agenda' => $data->id])->row();  
          if($validasi->status == 1){
          ?>

         

            <?php if($data->status_agenda == 1 ) { ?>
            <a href="" 
            class="btn btn-outline-danger btn-sm disabled" ><i class="fa fa-info"></i> Sudah Terlaksana</a>

          <?php }else{ ?>
            <a href="<?= base_url('sirapat/admin/agenda/update_status/' . $data->id); ?>" 
            class="btn btn-danger btn-sm btn-status"><i class="fa fa-info"></i> Belum Terlaksana</a>
          <?php } ?>

          <?php }else{ ?>
          
          
          
         
          <?= anchor('sirapat/admin/agenda/validasi/'.$data->id, 
          '<button class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="bottom" title="Menunguu Validasi"><i class="fa fa-check"></i></button>')?>

         <?php } ?>
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


  
  <!-- Membuat tooltip -->
  <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    });
    </script>

     