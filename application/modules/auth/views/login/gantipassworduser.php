
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-transparent py-9 py-lg-6 pt-lg-6" >
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <!-- <h1 class="text-white">SI RAPAT</h1>
              <p class="text-lead text-white">Sistem Manajemen Rapat Berbasis Web <br>
                Politeknik Negeri Banyuwangi</p> -->
            </div>
          </div>
          </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-4">
      <div class="row justify-content-center">
        <div class="row">
          <div class="col-lg-6">
            <div class="text-center mt-6">
          <img src="<?= base_url('assets/dashboard/'); ?>img/logosirapat.png"  class="navbar-brand-img" width="50%" alt="...">
          </div>
          </div>
        <div class="col-lg-6">

        
          <div class="card bg-transparent border-0 mb-0">
            
            <div class="card-body px-lg-7 py-lg-6">
              <div class="text-center text-muted mb-4">
                <h2 class="text-white">GANTI PASSWORD</h2>
                <h5 class="mb-2 text-white"><?= $this->session->userdata('reset_email'); ?></h5>
                <!-- <a href="<?= base_url('auth/index'); ?>" class="btn btn-outline-white btn-sm">Kembali Login?</a> -->
              </div>
              <hr>

              
              <?= $this->session->flashdata('message'); ?>
              <form class="user" method="post" action="<?= base_url('auth/user/changepassword'); ?>">
                <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password Baru...">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi password...">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                Ganti Password
                </button>
            </form>
              

            </div>
          </div>
        </div>
      </div>
    </div>
  
