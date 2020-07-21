

  
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
          <div class="col-lg-4">
            <div class="text-center mt-6">
          <img src="<?= base_url('assets/dashboard/'); ?>img/logosirapat.png"  class="navbar-brand-img" width="80%" alt="...">
          </div>
          </div>
        <div class="col-lg-8">

        
          <div class="card bg-transparent border-0 mb-0">
            <div class="card-body px-lg-7 py-lg-6">
              <div class="text-center text-muted mb-4">
                <h2 class="text-white">FORM REGISTRASI</h2>
              </div>
              <hr>

              <form role="form" method="post" action="<?= base_url('auth/registration'); ?>">

                  <div class="row">
                <div class="col-lg-12">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nama Lengkap" type="text" id="nama" name="nama" 
                    value="<?= set_value('nama'); ?>">
                  </div>
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                </div>

                
                <div class="col-lg-6">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input class="form-control" placeholder="NIK/NIP" type="text" id="nik" name="nik" 
                    value="<?= set_value('nik'); ?>">
                  </div>
                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                </div>
                
                
                <div class="col-lg-6">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                    </div>
                    <input class="form-control" placeholder="Jabatan" type="text" id="jabatan" name="jabatan" 
                    value="<?= set_value('jabatan'); ?>">
                  </div>
                  <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                </div>

                <div class="col-lg-6">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                    <input class="form-control" placeholder="Unit" type="text" id="unit" name="unit" 
                    value="<?= set_value('unit'); ?>">
                  </div>
                  <?= form_error('unit', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                </div>
                
                <div class="col-lg-6">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="text" id="email" name="email" 
                    value="<?= set_value('email'); ?>">
                  </div>
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" id="password1" name="password1">
                  </div>
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                </div>

                <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Repeat Password" type="password" id="password2" name="password2">
                  </div>
                </div>
                </div>
                </div>
                
                <div class="row mt-1" >
            
            <div class="col-lg text-left">
              <a href="<?= base_url('auth/index'); ?>" class="text-light"><small>Sudah punya akun? Login!</small></a>
            </div>
          </div>
            
                
                <div class="float-right">
                  <button type="submit" class="btn btn-primary my-3">Daftar</button>
                </div>
                
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  