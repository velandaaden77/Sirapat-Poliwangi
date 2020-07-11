<!-- Header -->
<div class="header bg-default pt-5">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
            <div class="col-lg-12 text-center">
            <h2 class="text-white ">Selamat Datang! <?= $user['nama_karyawan'] ?> </h2>
            <h4 class="text-white font-italic font-weight-light">Di Sistem Informasi Manajemen Rapat Poliwangi</h4>
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

        <div class="card-body">
        <div class="card-deck">
        <?php foreach($gruprapat as $key => $data) { ?>
            <div class="col-lg-3">
            <div class="card text-center" style="max-width: 18rem;">
                <img src="<?= base_url('assets/dashboard/img/book2.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title"><?= $data->nama_grup?></h2>
                <button type="button"
                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Grup</button>
                </div>
                <div class="card-footer" >
                <small class="text-muted">Sebagai : <?= $data->jabatan ?></small>
                </div>
            </div>
            </div>
        <?php } ?>
          
          

            
          
          </div>
        </div>
          </div>
        <!-- endcard -->

        </div>
      </div>
    </div>

    


   
