 <!-- Header -->
 <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
            <div class="col-lg-12 text-center">
            <h2 class="text-white "><i class="fas fa-user"></i> Edit Profil</h2>
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
        <div class="col-lg-8">
        
            <?= form_open_multipart('sirapat/grup/dashboard/editprofil'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Grup</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_grup" name="nama_grup" value="<?= $grup['nama_grup']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $grup['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
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
    </div>