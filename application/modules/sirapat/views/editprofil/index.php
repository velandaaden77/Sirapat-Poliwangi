 <!-- Header -->
 <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
            <div class="col-lg-12 text-center">
            <h2 class="text-white ">Selamat Datang! <?= $user['nama_karyawan'] ?> </h2>
            <h4 class="text-white font-italic font-weight-light">Di Sistem Informasi Manajemen Rapat Poliwangi</h4>
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

            <?= form_open_multipart('sirapat/admin/dashboard/editprofil'); ?>
            <!-- <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div> -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <?php $e = $this->db->get_where('grup_rapat', ['id_karyawan' => $this->session->userdata('id_karyawan'), 'id_tipe' => $this->session->userdata('id_tipe')])->row_array()?>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $e['email'] ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>
            <!-- </div>
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
            </div> -->

            <div class="form-group float-right">
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