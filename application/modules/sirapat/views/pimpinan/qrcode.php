  <!-- Header -->
  <div class="header bg-transparent pb-6">
      <div class="container-fluid">
        <div class="header-body">
        
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-primary d-inline-block mb-0 align-center">QR CODE</h6>
              
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

        <div class="row">
        <div class="col-lg-4 text-center">
        
        <?php 
        $qrCode = new Endroid\QrCode\QrCode($dosen = $this->session->userdata('nama_dosen'));
        $qrCode->writeFile('assets/file/qr-code/item-'.$this->session->userdata('username').'.png');
        ?>
        <img src="<?= base_url('assets/file/qr-code/item-'.$this->session->userdata('username').'.png') ?>"><br>

        <h3><?= $this->session->userdata('nama_dosen') ?></h3><br>

        <form method="post" action="<?= base_url('sirapat/pimpinan/validasi/validasi_agenda')?>">

        
        <input type="hidden" class="form-control" 
        id="formGroupExampleInput2" placeholder="qrcode" name="id_validasi" value="<?= 
        $this->uri->segment(5) ?>">

        <input type="hidden" class="form-control" 
        id="formGroupExampleInput2" placeholder="qrcode" name="qrcode" value="item-<?= 
        $this->session->userdata('username') ?>.png">

        <input type="hidden" class="form-control" id="validasi" name="id_validasi" value="<?= $this->uri->segment(5) ?>">

        <button class="btn btn-primary" type="submit" name="validasi" id="validasi">Validasi</button>
        </div>

        </form>

        <div class="col-lg-8">
        <div class="row pt-2">
                <div class="col-3">
                   <h3>Nomor Agenda</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->nomor_agenda ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Nama Agenda</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->nama_agenda ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Tanggal</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->tanggal ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Tempat</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->tempat ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Jenis Rapat</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->idjenis_rapat ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Peserta Rapat</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->peserta_rapat ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Lampiran</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->lampiran ?></span> -->
                </div>
                </div>

                <div class="row">
                <div class="col-3">
                   <h3>Hal</h3>
                </div>
                <div class="col-6">
                    <!-- <span><?= $data->hal ?></span> -->
                </div>
                </div>

              
        </div>
        
        </div>

        
        </div>
        </div>

          <div class="card">
          
            <div class="card-header bg-transparent">

            <h2 class="box-title mt-3">-</h2>

          <?= $this->session->flashdata('message') ?>        

        <section class="content">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA DOSEN</th>
          <th scope="col">STATUS</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      
        
      </tbody>
      </table> 
      
      </section>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>
