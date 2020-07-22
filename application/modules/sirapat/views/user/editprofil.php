<!-- Header -->
<div class="header pt-5" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
            <div class="col-lg-12 text-center">
            <h2 class="text-white "><i class="fas fa-user"></i> Edit Profil</h2>
            <!-- <h4 class="text-white font-italic font-weight-light">Di Sistem Informasi Manajemen Rapat Poliwangi</h4> -->
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
            <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
            <div class="row">
        <div class="col-lg-8">
        
            <?= form_open_multipart('sirapat/user/dashboard/editprofil'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama_karyawan']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/dashboard/img/profile/user/') . $user['foto']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
            </div>
        
          </div>
        <!-- endcard -->

        </div>
      </div>
    </div>

    


   
