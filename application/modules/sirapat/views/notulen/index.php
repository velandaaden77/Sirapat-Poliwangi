      <!-- Header -->
      <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-book"></i>  Notulen Rapat</h2>
            </div>
            </div>
          
          </div>
            </div>
             </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col-xl-12">

          

          <?= $this->session->flashdata('message') ?>        

            <div class="card">
            <div class="card-body">

            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA AGENDA</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">TEMPAT</th>
                <th scope="col">NOMOR AGENDA</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>

            <?php $i=1; ?>
            <?php foreach ($data_agenda as $key => $data) : ?>
            
                <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $data->nama_agenda ?></td>
                <td><?= $data->tanggal; ?></td>
                <td><?= $data->tempat ?></td>
                <td><?= $data->nomor_agenda; ?></td>
                  <td >
                  <a href="<?= base_url('sirapat/admin/notulen/detail_notulen/'.$data->id); ?>" 
                  class="btn btn-dark btn-sm"><i class="fa fa-forward"></i></a>
                  </td>
                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>

           

            </table>
            </div>

            </div>
            </div>

          </div>
          </div>
          </div>
          </div>
          </div>

