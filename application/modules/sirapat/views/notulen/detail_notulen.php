  <!-- Header -->
  <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
        <?php foreach($agenda as $a) { ?>
          <div class="row align-items-center py-5">
            <div class="col-lg-12 col-7 text-center">
              <h6 class="h2 text-white d-inline-block"><?= $a->nama_agenda ?></h6><br>
              <span class="text-white text-italic"><?= $a->tanggal ?></span>
                <!-- <hr class="bg-light"> -->
            </div>
          </div>
            
          
                </div>
            </div>
            </div>

    <!-- Page content -->
    <div class="container-fluid mt--5">

    <!-- start card  -->
      <div class="row justify-content-center">
        <div class="col-xl-12">

          <div class="card text-center">
            <div class="card-body">

            <div class="swal" data-swal="<?= $this->session->flashdata('message'); ?>"></div>  
            <div class="swal1" data-swal1="<?= $this->session->flashdata('message1'); ?>"></div>

            <div class="table-responsive">
            <table class="table table-hover tabel-light">
            <thead class="thead-dark">
                <tr>
                <th scope="col">NAMA AGENDA</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">TEMPAT</th>
                <th scope="col">NOMOR AGENDA</th>
                <th scope="col">HAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?= $a->nama_agenda ?></td>
                <td><?= $a->tanggal; ?></td>
                <td><?= $a->tempat ?></td>
                <td><?= $a->nomor_agenda; ?></td>
                <td><?= $a->hal; ?></td>
                </tr>
            </tbody>
            </table>
            </div>

            

            </div>
            </div>
           
          
            <!-- endcard -->
            </div>
            </div>

            <!-- start -->
            
            <div class="card-deck">
            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Notulensi Rapat</h2>

                <?php $notulen = $this->db->get_where('notulen', ['id_agenda' => $this->uri->segment(5)])->row(); 
                if(empty($notulen)){
                ?>
                <a href="<?= base_url('sirapat/admin/notulen/tambahnotulen/'.$a->id); ?>"
                class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</a>

                <?php }else{ ?>

                <!-- <button type='button'
                class="btn btn-default btn-sm" disabled><i class="fas fa-plus-circle"></i> Tambah</button> -->

                <button type="button" data-toggle="modal" data-target="#lihatmodal<?= 1 ?>"
                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</button>

                <a href="<?= base_url('sirapat/admin/notulen/printnotulen/'.$this->uri->segment(5))?>"
            class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-print"></i> Print Notulen</a>
                

                <?php } ?>

                </div>
               
            </div>
            <?php } ?>

          <?php
           if(empty($notulen)){ ?>

            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book2.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Risalah Rapat</h2>
                <button type="button"
                class="btn btn-default btn-sm" disabled><i class="fas fa-eye"></i> Lihat</button>
                </div>
                
            </div>

            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book5.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Permasalahan, Solusi, Batas Waktu</h5>
                <button type="button" class="btn btn-default btn-sm" disabled><i class="fas fa-eye"></i> Lihat</button>
                </div>
                
            </div>

            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book4.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Berita Acara Rapat</h2>
                <button type="button" class="btn btn-default btn-sm" disabled><i class="fas fa-eye"></i> Lihat</button>
                </div>
                
            </div>
            
           <?php }else{ 

            $getnotulen = $this->db->get_where('notulen', ['id_agenda' => $this->uri->segment(5)])->row();
       
          ?>

          <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book2.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Risalah Rapat</h2>
                <a href="<?= base_url('sirapat/admin/notulen/risalahrapat/'.$getnotulen->idnotulen); ?>"
                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                <?php 
                $u = $this->uri->segment(5);
                $r = "SELECT *
                            FROM `risalah_rapat`
                            JOIN `notulen` ON `notulen`.`idnotulen` = `risalah_rapat`.`id_notulen`
                            WHERE `notulen`.`id_agenda` = $u"; 
                            
                $s = $this->db->query($r)->row(); 
                if(empty($s)){
                ?>
                <a href="<?= base_url('sirapat/admin/notulen/printrisalah/'.$getnotulen->idnotulen); ?>"
                class="btn btn-danger btn-sm" disabled target="_blank"><i class="fas fa-print"></i> Print</a>
                <?php }else{ ?>
                  <a href="<?= base_url('sirapat/admin/notulen/printrisalah/'.$getnotulen->idnotulen); ?>"
                  class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-print"></i> Print</a>
                <?php } ?>
                </div>
               
            </div>
         


            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book5.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Permasalahan, Solusi, Batas Waktu</h5>
                <a href="<?= base_url('sirapat/admin/notulen/psbw/'.$getnotulen->idnotulen); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                <a href="<?= base_url('sirapat/admin/notulen/printpsbw/'.$getnotulen->idnotulen); ?>" type="button" class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-print"></i> Print</a>
                </div>
                
            </div>

            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book4.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Berita Acara Rapat</h2>
                <a href="<?= base_url('sirapat/admin/notulen/beritaacara/'.$getnotulen->idnotulen); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                <a href="<?= base_url('sirapat/admin/notulen/printberitaacara/'.$getnotulen->idnotulen); ?>" type="button" class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-print"></i> Print</a>
                </div>
                
            </div>

           <?php } ?>
            
            </div>
       
    <!-- end -->
        
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>

            <!-- Modal -->
      <div class="modal fade" id="lihatmodal<?= 1 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Notulensi Rapat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="container-fluid">

              <div class="row">
                <div class="col-sm-3">
                   <h3>Tanggal</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->tanggal ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Ruang Rapat</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->ruang_rapat ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Waktu Mulai</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->waktu_mulai ?> WIB</span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Waktu Selesai</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->waktu_selesai ?> WIB</span>
                </div>
                </div>
            
                <div class="row">
                <div class="col-sm-3">
                   <h3>Nomor Surat</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->nomor_agenda ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Grup Rapat</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->nama_grup ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Daftar Hadir</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->daftar_hadir ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Total Hadir</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->total_hadir ?></span>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-3">
                   <h3>Ringkasan</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->ringkasan ?></span>
                </div>
                </div>

                <?php $k = $this->notulen_m->ketuarapat($notulensi->id_agenda)->row() ?>
                <div class="row">
                <div class="col-sm-3">
                   <h3>Ketua</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $k->nama_karyawan ?></span>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                   <h3>Notulen</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->notulen ?></span>
                </div>
                </div>

                <div class="row">
                
                <div class="col-sm-3">
                   <h3>PIC</h3>
                </div>
                <div class="col-sm-9">
                    <span><?= $notulensi->pic ?></span>
                </div>

               
              

                
                </div>
                <div class="modal-footer">
                <a href="<?= base_url('sirapat/admin/notulen/editnotulensi/'.$notulensi->idnotulen.'/'.$this->uri->segment(5) )?>"
                class="btn btn-primary float-left"><i class="fas fa-edit"></i> Edit</a>

                <!-- <a href="<?= base_url('sirapat/admin/notulen/delnotulensi/'.$notulensi->idnotulen.'/'.$this->uri->segment(5))?>"
                class="btn btn-danger float-left "><i class="fas fa-trash"></i> Hapus</a> -->
                </div>
          </div>
        </div>
      </div>

