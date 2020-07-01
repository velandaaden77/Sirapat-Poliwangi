  
   <!-- Header -->
   <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h1 class="text-white"><i class="fas fa-layer-group"></i> Manajemen Grup</h1>
            </div>
          </div>
            
          
          </div>
            </div>
            </div>


    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
            <div class="card-header bg-transparent">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                </div>
            <?php endif ?>
              
            <?= form_error('karyawan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

          </div>

            <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                <label for="formGroupExampleInput2">Nama Group</label>
                <input type="text" class="form-control" 
                id="grup" placeholder="Nama Group" name="grup" value="<?= set_value('grup'); ?>">
                <span class="help-block"><?= form_error('grup', '<small class="text-danger pl-1">', '</small>'); ?></span>
                </div>
                
            </div>
            </div>

          </div>
          </div>
          </div>
          </div>


      
      
