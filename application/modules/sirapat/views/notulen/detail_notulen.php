  <!-- Header -->
  <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
        <?php foreach($agenda as $a) { ?>
          <div class="row align-items-center py-5">
            <div class="col-lg-12 col-7 text-center">
              <h6 class="h1 text-white d-inline-block"><?= $a->nama_agenda ?></h6><br>
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
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-footer" >
                <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
           
            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book2.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Risalah Rapat</h2>
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-footer" >
                <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
          
            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book5.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Permasalahan, Solusi, Batas Waktu</h5>
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-footer" >
                <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>

            <div class="card text-center">
                <img src="<?= base_url('assets/dashboard/img/book4.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title">Berita Acara Rapat</h2>
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-footer" >
                <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            </div>
       
    <!-- end -->
        <?php } ?>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>

