 <!-- Header -->
 <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
            <div class="col-lg-12 text-center">
            <h2 class="text-white "><i class="fas fa-key"></i> Ganti Password</h2>
            <!-- <h4 class="text-white font-italic font-weight-light">Di Sistem Informasi Manajemen Rapat Poliwangi</h4> -->
            </div>
          </div>
          
                </div>
            </div>
            </div>

<div class="container-fluid mt--6">
    <div class="card">
    <div class="card-body">

    <?= $this->session->flashdata('message'); ?>
               
    <div class="row">
        <div class="col-lg-6">
       
            <form action="<?= base_url('sirapat/grup/dashboard/gantipassword'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Password Lama</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">Password Baru</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Ulangi Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
            </form>

        </div>
    </div>

    </div>
    </div>
    </div>