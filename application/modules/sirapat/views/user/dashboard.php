<!-- Header -->
<div class="header bg-default pt-5">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
            <div class="col-lg-12 text-center">
            <h2 class="text-white ">Selamat Datang! <?= $user['nama_karyawan'] ?> </h2>
            <h4 class="text-white font-italic font-weight-light">Di Sistem Informasi Manajemen Rapat Poliwangi</h4>
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

        <div class="card-body">

        <?php 
            $gr = $this->db->get_where('grup_rapat', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row();
            if(empty($gr)){ ?>

        <div class="text-center">
        <img src="<?= base_url('assets/dashboard/img/grupkosong.jpg')?>" class="mx-auto d-block" width="30%" alt="...">
        <span class="font-italic">Maaf anda belum bergabung dengan grup apapun</span>
        </div>
        
        <?php }else{ ?>


        <div class="card-deck"> 
        
        

        <?php foreach($gruprapat as $key => $data) : ?>
        
            <div class="col-lg-3">
            <div class="card text-center" style="max-width: 18rem;">
                <img src="<?= base_url('assets/dashboard/img/gruprapat.jpg')?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h2 class="card-title"><?= $data->nama_grup?></h2>
                <button type="button"
                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Grup</button>
                </div>
                <div class="card-footer" >
                <small class="text-muted">Sebagai : <?= $data->jabatan ?></small>
                </div>
            </div>
            </div>
        <?php  endforeach; ?>
        <?php } ?>
          

         

            
          
          </div>
        </div>
          </div>
        <!-- endcard -->

        </div>
      </div>
    </div>

    


   
