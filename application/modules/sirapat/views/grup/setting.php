 <!-- Header -->
 <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
            <div class="col-lg-12 text-center">
            <h2 class="text-white "><i class="fas fa-setting"></i>Setting</h2>
            </div>
          </div>
          
                </div>
            </div>
            </div>

<div class="container-fluid mt--6">
    <div class="card">
    <div class="card-body">


    <div class="form-group">
        <label for="formGroupExampleInput2">Nama Grup</label>
        <input type="text" class="form-control" disabled name="nama_grup" value="<?= $this->session->userdata('nama_grup')?>">
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Password Lama</label>
        <input type="password" class="form-control" autocomplete="off" name="password1">
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Password Baru</label>
        <input type="password" class="form-control" autocomplete="off" name="password2">
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Ganti Password</button>


    
    </div>
    </div>