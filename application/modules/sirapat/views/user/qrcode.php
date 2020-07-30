  <!-- Header -->
  <div class="header pt-5" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-qrcode"></i> QRCODE</h2>
             <p class="text-white text-italic"> Validasi agenda rapat dengan menambahkan tanda tangan digital</p>
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

        <div class="row">
        <div class="col-lg-4 text-center">
        
        <?php 
        $qrCode = new Endroid\QrCode\QrCode($karyawan = $this->session->userdata('nama_karyawan'));
        $qrCode->writeFile('assets/file/qr-code/item-'.$this->session->userdata('nama_karyawan').'.png');
        ?>
        <img src="<?= base_url('assets/file/qr-code/item-'.$this->session->userdata('nama_karyawan').'.png') ?>"><br>

        <h3><?= $this->session->userdata('nama_karyawan') ?></h3><br>

        <form method="post" action="<?= base_url('sirapat/user/ketua/validasi/'.$this->uri->segment(6))?>">
        
        
        <input type="hidden" class="form-control" 
        id="formGroupExampleInput2" placeholder="qrcode" name="id_validasi" value="<?= 
        $this->uri->segment(5) ?>">

        <input type="hidden" class="form-control" 
        id="formGroupExampleInput2" placeholder="qrcode" name="qrcode" value="item-<?= 
        $this->session->userdata('nama_karyawan') ?>.png">

        <input type="hidden" class="form-control" id="validasi" name="id_validasi" value="<?= $this->uri->segment(5) ?>">

        <button class="btn btn-primary" type="submit" name="validasi" id="validasi">Validasi</button>
        </div>

        </form>

        
        <div class="col-lg-8">

        <div class="row pt-2">
                

                <?php foreach($detailagenda as $da) { ?>
        <div class="col-sm-3">
                <h3>Nomor Surat</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->nomor_agenda ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Lampiran</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->lampiran ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Hal</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->hal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Tanggal</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->tanggal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Jam Mulai</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->jam_mulai ?> WIB</span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Jam Selesai</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->jam_selesai ?> WIB</span>
              </div>
              </div>

              
              <div class="row">
              <div class="col-sm-3">
                <h3>Tempat</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->tempat ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Grup Rapat</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->nama_grup ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h3>Peserta Rapat</h3>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $da->peserta_rapat ?></span>
              </div>
              </div>

              

              <div class="row">
              <div class="col-sm-3">
                <h3>Nama Agenda</h3>
              </div>
              <div class="col-sm-9">
                  <span class="text-weight-bold">: <?= $da->nama_agenda ?></span>
              </div>
              </div>
              
        </div>
                <?php } ?>
        </div>

        
        </div>
        </div>

          
          </div>
          </div>
          </div>
          </div>
