<!-- Header -->
<div class="header pt-5" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
            <div class="col-lg-12 text-center">
            <h2 class="text-white "><i class="fas fa-book"></i> Laporan</h2>
            <?php $agenda = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(6)])->row()?>
             <h1 class="text-white"><?= $agenda->nama_agenda?></h1>
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
        <h3>Detail Rapat</h3>
        </div>
        <div class="card-body">

        <div class="row">

            <?php if($laporan->status == 1) { ?>
            <div class="col-lg-4 text-center">
            <img src="<?= base_url('assets/file/qr-code/').$laporan->qrcode ?>" class="img-thumbnail" width="50%"><br>
            <h3><?= $laporan->nama_karyawan ?></h3>
            </div>
            <?php }else{ ?>

            <?php } ?>

            <div class="col-lg-8">
            <div class="row">
              <div class="col-sm-3">
                <h4>Nomor Surat</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->nomor_agenda ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Lampiran</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->lampiran ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Hal</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->hal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Tanggal</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->tanggal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Jam Mulai</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->jam_mulai ?> WIB</span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Jam Selesai</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->jam_selesai ?> WIB</span>
              </div>
              </div>

              
              <div class="row">
              <div class="col-sm-3">
                <h4>Tempat</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->tempat ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Grup Rapat</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->nama_grup ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Peserta Rapat</h4>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $laporan->peserta_rapat ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h4>Nama Agenda</h4>
              </div>
              <div class="col-sm-9">
                  <span class="text-weight-bold">: <?= $laporan->nama_agenda ?></span>
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
        <!-- endcard -->

<!--         

        <div class="card">
        <div class="card-header">
        <h3>Notulen Rapat</h3>
        </div>
        <div class="card-body">
        </div>
        </div> -->

        <div id="accordion">
        <div class="card">
        <div class="card-header text-center">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
           <h3><i class="fas fa-users"></i> Daftar Hadir</h3>
            </a>
        </div>
        <div id="collapseOne" class="collapse" data-parent="#accordion">
            <div class="card-body">
           
    <div class="table-responsive">
      <table class="table table-hover" id="daftar_rapat">
      <thead class="thead-light">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA KARYAWAN</th>
          <th scope="col">JABATAN</th>
          <th scope="col">STATUS</th>
        </tr>
      </thead>
      <tbody>
      <?php $absen = $this->user_m->daftarhadir()->result();
      if(empty($absen)){ ?>
      <?php }else{ ?>
      <?php 
      $i =1;
      foreach($absen as $a){ ?>
      
      <tr>
      <td><?= $i ?></td>
      <td><?= $a->nama_karyawan ?></td>
      <td><?= $a->jabatan ?></td>
      <td><?= $a->status ?></td>
      </tr>
      <?php $i++?>
      <?php } ?>
      <?php } ?>
          </tbody>
          </table>
          </div>

            </div>
        </div>
        </div>

        <!-- end collapse -->
        <div id="accordion3">
        <div class="card">
        <div class="card-header text-center">
            <a class="card-link" data-toggle="collapse" href="#foto">
           <h3><i class="fas fa-camera"></i> Dokumentasi</h3>
            </a>
        </div>
        <div id="foto" class="collapse" data-parent="#accordion3">
            <div class="card-body">
            <div class="container-fluid text-center">
            <?php $notulensi = $this->user_m->notulen()->row(); ?>
            <?php if(empty($notulensi->foto_rapat)){ ?>
            Dokumentasi Kosong :)
            <?php }else{?>
            <img src="<?= base_url('assets/dashboard/img/rapat/'.$notulensi->foto_rapat) ?>">
            <?php } ?>
            </div>
            </div>
        </div>
        </div>

        <!-- end collapse -->
        <div id="accordion2">
        <div class="card">
        <div class="card-header text-center">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
           <h3><i class="fas fa-book"></i> Notulen Rapat</h3>
            </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion2">
            <div class="card-body">
            <?php $notulensi = $this->user_m->notulen()->row(); ?>
            <?php if(empty($notulensi)){ ?>
            Data Masih Belum Di Input
            <?php }else{?>
            <!-- notulensi -->
            <div class="row">

           
            <div class="col-lg-6 text-center">
            <img src="<?= base_url('assets/dashboard/img/notulen.png')?>"  width="60%"><br>
            </div>
           
            <div class="col-lg-6">
            <div class="row">
            <div class="col-sm-3">
                   <h4>Tanggal</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->tanggal ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h4>Ruang Rapat</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->ruang_rapat ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h4>Waktu Mulai</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->waktu_mulai ?> WIB</span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h4>Waktu Selesai</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->waktu_selesai ?> WIB</span>
                </div>
                </div>
            
                <div class="row">
                <div class="col-sm-3">
                   <h4>Nomor Surat</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->nomor_agenda ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h4>Grup Rapat</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->nama_grup ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h4>Daftar Hadir</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->daftar_hadir ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h4>Total Hadir</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->total_hadir ?></span>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-3">
                   <h4>Ringkasan</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->ringkasan ?></span>
                </div>
                </div>
                <?php $k = $this->user_m->ketuarapat($this->uri->segment(6))->row(); ?>
                <div class="row">
                <div class="col-sm-3">
                   <h4>Ketua</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $k->nama_karyawan ?></span>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-3">
                   <h4>Notulen</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->notulen ?></span>
                </div>
                </div>

                <div class="row">
                
                <div class="col-sm-3">
                   <h4>PIC</h4>
                </div>
                <div class="col-sm-9">
                    <span>: <?= $notulensi->pic ?></span>
                </div>

            </div>
            </div>
            <!-- end row -->

            <div class="col-xl-12">
            <div class="row">
            <!-- Risalah Rapat -->
            <div class="col-lg-12">
            <div class="card-body bg-secondary">
            <hr>
            <div class="tex-center mb-2">
            <h3 class="text-center ">Risalah Rapat</h3>
            </div>
           <!-- tabel -->
           <div class="table-responsive">
      <table class="table table-white" id="daftar_rapat">
      <thead class="thead-dark">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">SUBTOPIK</th>
          <th scope="col">CATATAN KAKI</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i =1;
      $risalah = $this->user_m->risalahrapat()->result();
      foreach($risalah as $r){ ?>
      <tr>
      <td><?= $i ?></td>
      <td><?= $r->subtopik ?></td>
      <td><?= $r->catatan_kaki?></td>
      </tr>
      <?php $i++?>
      <?php } ?>

          </tbody>
          </table>
          </div>
          <!-- end tabel -->
        </div>
        </div>
        <!-- end risalah rapat -->

            <!-- PSBW -->
            <div class="col-lg-12">
            <div class="card-body bg-secondary">
            <hr>
            <div class="tex-center mb-2">
            <h3 class="text-center ">Permasalahan, Solusi, dan Batas Waktu</h3>
            </div>
           <!-- tabel -->
           <div class="table-responsive">
      <table class="table table-white" id="daftar_rapat">
      <thead class="thead-dark">
        <tr>
        <th scope="col">NO</th>
                <th scope="col">TOPIK/BAHASAN</th>
                <th scope="col">URAIAN/PERMASALAHAN</th>
                <th scope="col">SOLUSI</th>
                <th scope="col">PIC</th>
                <th scope="col">BATAS WAKTU</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1 ?>
      <?php
      $psbw = $this->user_m->psbw()->result();
      foreach ($psbw as $key => $p) { ?>
                <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $p->topik_bahasan?></td>
                <td><?= $p->uraian?></td>
                <td><?= $p->solusi?></td>
                <td><?= $p->pic?></td>
                <td><?= $p->bataswaktu?></td>
                </tr>
      <?php $i++?>
      <?php } ?>

          </tbody>
          </table>
          </div>
          <!-- end tabel -->
        </div>
        </div>
        <!-- end PSBW -->

        <!-- PSBW -->
        <div class="col-lg-12">
        <div class="card-body">
            <hr>
            <div class="tex-center mb-2">
            <h3 class="text-center ">Berita Acara</h3>
            </div>
           <!-- tabel -->
           <?php $beritaacara = $this->user_m->beritaacara()->row();
           if(empty($beritaacara)){
           ?>
           <?php }else{ ?>
           <div class="text-center">
           Pada Tanggal <h3><?= $beritaacara->tanggal ?></h3> Telah dilaksanakan Rapat <h3><?= $beritaacara->nama_agenda ?></h3>Dengan hasil: <h3><?= $beritaacara->hasil ?></h3>
           </div>
           <?php } ?>
          <!-- end tabel -->
        </div>
        </div>
        <!-- end PSBW -->
        </div>
        </div>
        <!-- end row -->

        </div>
        </div>
        </div>
        <!-- end collapse -->
      <?php } ?>
        </div>
      </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    


   
