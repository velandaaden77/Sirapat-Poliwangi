
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-blue py-9 py-lg-6 pt-lg-6" >
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">SI RAPAT</h1>
              <p class="text-lead text-white">Sistem Manajemen Rapat Berbasis Web <br>
                Politeknik Negeri Banyuwangi</p>
            </div>
          </div>
          </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-4">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-7 py-lg-6">
              <div class="text-center text-muted mb-4">
                <h2>LOGIN PIMPINAN</h2>
               
              </div>
              <hr>

              
              <?= $this->session->flashdata('message'); ?>

              <form role="form" method="post" action="<?= base_url('auth/pimpinan/index'); ?>">

              <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" id="username" name="username" 
                    value="<?= set_value('username'); ?>">
                  </div>
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="password" name="password" >
                  </div>
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>

            <div class="row mt-4" >
            <div class="col-6">
              <a href="<?= base_url('login/forgotpassword'); ?>" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="<?= base_url('auth/registration'); ?>" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
                
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary my-4">Login</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
