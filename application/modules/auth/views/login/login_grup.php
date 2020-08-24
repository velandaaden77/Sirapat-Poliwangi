
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-transparent py-9 py-lg-6 pt-lg-6" >
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
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
                <h2 class="text-white">LOGIN GRUP</h2>
                <a href="<?= base_url('auth/admin'); ?>" class="btn btn-outline-white btn-sm">Login Sebagai Admin ?</a>
                <a href="<?= base_url('auth/user'); ?>" class="btn btn-outline-white btn-sm">Login Sebagai User ?</a>
              </div>
              <hr>

              
              <?= $this->session->flashdata('message'); ?>

              <form role="form" method="post" action="<?= base_url('auth/grup/index'); ?>">

              <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="username" type="text" id="nama_grup" name="nama_grup" 
                    value="<?= set_value('nama_grup'); ?>">
                  </div>
                  <?= form_error('nama_grup', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="password" name="password" 
                    autocomplete="off">
                  </div>
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>

            <div class="row mt-4" >
            <div class="col-6">
              <!-- <a href="<?= base_url('login/forgotpassword'); ?>" class="text-light"><small>Lupa Password?</small></a> -->
            </div>
          </div>
                
              <div class="float-right">
                  <button type="submit" name="submit" class="btn btn-primary my-4"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
