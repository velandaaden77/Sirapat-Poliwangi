  
   <!-- Header -->
   <div class="header bg-default pb-6">
      <div class="container-fluid">
     
        <div class="header-body">
          <div class="row align-items-center py-5">
        
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-layer-group"></i> Manajemen Grup Rapat</h1>
            </div>
              </div>
            
          
          </div>
            </div>
              </div>


     <!-- Page content -->
     <div class="container-fluid mt--5">
      <div class="row justify-content-center">
        
          <form role="form" action="<?= base_url('sirapat/superadmin/manajemen_grup/tambahgrup') ?>" method="post">
          <div class="card text-center" style="width: 50rem; ">

            <div class="card-body">

            <div class="swal" data-swal="<?= $this->session->flashdata('message'); ?>"></div>  
            <div class="swal1" data-swal1="<?= $this->session->flashdata('message1'); ?>"></div>  

              <div class="form-group">
                  <label for="formGroupExampleInput2">NAMA GROUP</label>
                  <input type="input" class="form-control" 
                  id="grup" placeholder="Masukan nama grup" name="grup" autocomplete="off">
                  <span class="help-block">
                  <?= form_error('grup', '<small class="text-danger pl-1">', '</small>'); ?></span>
              </div> 

              <button type="submit" class="btn btn-primary">Tambah</button>

            </div>
            </div>
            </form>
        
            </div>
            <!-- end row -->

            <div class="row">

           
            <?php foreach($grup as $g ) { ?>
            
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('sirapat/superadmin/manajemen_grup/detailgrup/'). $g->id ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title text-uppercase mb-0"><?= $g->nama_grup?></h4><br>
                      <!-- <span class="h5 font-weight-bold text-muted mb-0">ANNGOTA :</span>
                      <span class="h5 font-weight-bold mb-0"><?= $jmlgrup ?></span> -->
                      <a href="<?= base_url('sirapat/superadmin/manajemen_grup/delgrup/').$g->id ?>" class="btn btn-danger btn-sm tombol-hapus">hapus grup</a>
                    </div>

                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                      <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
            <?php } ?>

            

            </div>
            <!-- end card -->

            </div>
            <!-- end container -->


      
      
