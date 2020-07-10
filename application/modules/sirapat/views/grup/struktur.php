 <!-- Header -->
 <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
            <div class="col-lg-12 text-center">
            <h2 class="text-white ">Struktur Grup <?= $grup['nama_grup'] ?> </h2>
            </div>
          </div>
          
                </div>
            </div>
            </div>

<div class="container-fluid mt--6">
    <div class="card">
    <div class="card-body">


    <?php 
    $idgrup = $this->session->userdata('idgrup');
    $anggota = "SELECT *
                FROM `grup_rapat` JOIN `karyawan`
                ON `grup_rapat`.`id_karyawan` = `karyawan`.`idkaryawan` 
                WHERE `grup_rapat`.`id_jabatan` = 1 
                AND `grup_rapat`.`id_tipe` = $idgrup
                "; 
    $ketua = $this->db->query($anggota)->row();
    ?>

    <?php 
    $idgrup = $this->session->userdata('idgrup');
    $anggota = "SELECT *
                FROM `grup_rapat` JOIN `karyawan`
                ON `grup_rapat`.`id_karyawan` = `karyawan`.`idkaryawan` 
                WHERE `grup_rapat`.`id_jabatan` = 2 
                AND `grup_rapat`.`id_tipe` = $idgrup
                "; 
    $wakil = $this->db->query($anggota)->row();
    ?>

    <?php 
    $idgrup = $this->session->userdata('idgrup');
    $anggota = "SELECT *
                FROM `grup_rapat` JOIN `karyawan`
                ON `grup_rapat`.`id_karyawan` = `karyawan`.`idkaryawan` 
                WHERE `grup_rapat`.`id_jabatan` = 3 
                AND `grup_rapat`.`id_tipe` = $idgrup
                "; 
    $sekertaris = $this->db->query($anggota)->row();
    ?>

    <?php 
    $idgrup = $this->session->userdata('idgrup');
    $anggota = "SELECT *
                FROM `grup_rapat` JOIN `karyawan`
                ON `grup_rapat`.`id_karyawan` = `karyawan`.`idkaryawan` 
                WHERE `grup_rapat`.`id_jabatan` = 4 
                AND `grup_rapat`.`id_tipe` = $idgrup
                "; 
    $bendahara = $this->db->query($anggota)->row();
    ?>

    <?php 
    $idgrup = $this->session->userdata('idgrup');
    $query = "SELECT *
                FROM `grup_rapat` JOIN `karyawan`
                ON `grup_rapat`.`id_karyawan` = `karyawan`.`idkaryawan` 
                WHERE `grup_rapat`.`id_jabatan` = 5 
                AND `grup_rapat`.`id_tipe` = $idgrup
                "; 
    $anggota = $this->db->query($query)->result();
    ?>

<div class="col-xl-12">

        <div class="row">
            <div class="col-lg-12">
            <div class="text-center">
                <img src="<?= base_url('assets/dashboard/img/').$ketua->foto ?>" class="rounded" style="width: 10%" alt="...">
                <h4>Ketua</h4>
                <h5><?= $ketua->nama_karyawan ?></h5>
            </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-xl-4">
                <div class="text-center">
                <img src="<?= base_url('assets/dashboard/img/').$wakil->foto ?>" class="rounded" style="width: 30%" alt="...">
                <h4>Wakil</h4>
                <h5><?= $wakil->nama_karyawan ?></h5>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="text-center">
                <img src="<?= base_url('assets/dashboard/img/').$sekertaris->foto ?>" class="rounded" style="width: 30%" alt="...">
                <h4>Sekertaris</h4>
                <h5><?= $sekertaris->nama_karyawan ?></h5>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="text-center">
                <img src="<?= base_url('assets/dashboard/img/').$bendahara->foto ?>" class="rounded" style="width: 30%" alt="...">
                <h4>Bendahara</h4>
                <h5><?= $bendahara->nama_karyawan ?></h5>
                </div>
            </div>
            
            </div>

        <div class="row">
            <?php foreach ($anggota as $key => $data) {
            ?>
            <div class="col-xl-3">
                <div class="text-center">
                <img src="<?= base_url('assets/dashboard/img/').$data->foto ?>" class="rounded" style="width: 30%" alt="...">
                <h4>Anggota</h4>
                <h5><?= $data->nama_karyawan ?></h5>
                </div>
            </div>
            <?php } ?>
            </div>

            </div>
            <!-- col-lg -->
            
        </div>


    
    </div>
    </div>