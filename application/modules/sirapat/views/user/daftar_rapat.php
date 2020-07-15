     <!-- Header -->
     <div class="header pt-5" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-7">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-book"></i> Daftar Rapat</h2>
             <?php $grup = $this->db->get_where('grup_tipe', ['id' => $this->uri->segment(5)])->row()?>
             <h1 class="text-white"> Grup <?= $grup->nama_grup?></h1>
            </div>
            </div>
          
          </div>
            </div>
             </div>

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">


<form action="<?= base_url('sirapat/user/ketua/filterdata/'.$this->uri->segment(5)) ?>" method="post" >
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-5">
  <div class="form-group ">
              <select name="tahun" class="form-control form-control-sm">

              <option>Pilih Tahun</option>
              <?php $tahun_now = date("Y");
              for($i=2020;$i<=$tahun_now;$i++){ ?>

              <option value="<?= $i ?>"> <?= $i ?></option>
              <?php } ?>
              </select>
              <?= form_error('tahun', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

<div class="col-lg-5">
  <div class="form-group ">
              <select name="bulan" class="form-control form-control-sm">
              <option>Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
              </select>
              <?= form_error('gruprapat', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
  </div>

  <div class="col-lg-2">
  <button type="submit" class="btn btn-primary btn-sm"> Tampilkan</button>
  </div>
  
  </div>
</div>
</div>
</form>

<?php 

if(empty($this->input->post('tahun')) || empty($this->input->post('bulan'))){}else {

  if($this->input->post('bulan') == '01'){
		$bln2 = 'Januari';
		}elseif($this->input->post('bulan') == '02'){
			$bln2 = 'Februari';
		}elseif($this->input->post('bulan') == '03'){
			$bln2 = 'Maret';
		}elseif($this->input->post('bulan') == '04'){
			$bln2 = 'April';
		}elseif($this->input->post('bulan') == '05'){
			$bln2 = 'Mei';
		}elseif($this->input->post('bulan') == '06'){
			$bln2 = 'Juni';
		}elseif($this->input->post('bulan') == '07'){
			$bln2 = 'Juli';
		}elseif($this->input->post('bulan') == '08'){
			$bln2 = 'Agustus';
		}elseif($this->input->post('bulan') == '09'){
			$bln2 = 'September';
		}elseif($this->input->post('bulan') == '10'){
			$bln2 = 'Oktober';
		}elseif($this->input->post('bulan') == '11'){
			$bln2 = 'November';
		}elseif($this->input->post('bulan') == '12'){
			$bln2 = 'Desember';
    }
    
    ?>
          <div class="card">

            <div class="card-header bg-transparent">

          <div class="row mt-3 mb-3">
          <div class="col">
            <h3 class="box-title">Daftar Rapat</h3>
          </div>

          <div class="col">
            <div class="float-right">
           
            </div>
            </div>
            </div>
          <?= $this->session->flashdata('message') ?>        

        <section class="content">
        <div class="table-responsive">
      <table class="table table-hover" id="daftar_rapat">
      <thead class="thead-light">
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NAMA AGENDA</th>
          <th scope="col">TANGGAL</th>
          <th scope="col">TEMPAT</th>
          <th scope="col">GRUP</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php $i=1; 
      $pencarian = $this->input->post('bulan');
      $getallagenda= $this->user_m->getallagenda($pencarian)->result();
      ?>
      <?php foreach ($getallagenda as $key => $data) : ?>
      
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $data->nama_agenda; ?></td>
          <td><?= $data->tanggal; ?></td>
          <td><?= $data->tempat ?></td>
          <td><?= $data->nama_grup; ?></td>

          <td>
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-search-plus"></i> Detail</button>
          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#detailmodal<?= $i ?>"><i class="fa fa-file"></i> Notulen</button>
          </td>


      <!-- Modal -->
      <div class="modal fade" id="detailmodal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Rapat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="container-fluid">

              <div class="row">

            <?php if($data->status == 1) { ?>
            <div class="col-lg-4 text-center">
            <img src="<?= base_url('assets/file/qr-code/').$data->qrcode ?>" class="img-thumbnail"><br>
            <h5><?= $data->nama_karyawan ?></h5>
            </div>
            <?php }else{ ?>

            <?php } ?>

            <div class="col-lg-8">
            <div class="row">
              <div class="col-sm-3">
                <h5>Nomor Surat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->nomor_agenda ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Lampiran</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->lampiran ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Hal</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->hal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Tanggal</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->tanggal ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Jam Mulai</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->jam_mulai ?> WIB</span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Jam Selesai</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->jam_selesai ?> WIB</span>
              </div>
              </div>

              
              <div class="row">
              <div class="col-sm-3">
                <h5>Tempat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->tempat ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Grup Rapat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->nama_grup ?></span>
              </div>
              </div>

              <div class="row">
              <div class="col-sm-3">
                <h5>Peserta Rapat</h5>
              </div>
              <div class="col-sm-9">
                  <span>: <?= $data->peserta_rapat ?></span>
              </div>
              </div>

              

              <div class="row">
              <div class="col-sm-3">
                <h5>Nama Agenda</h5>
              </div>
              <div class="col-sm-9">
                  <span class="text-weight-bold">: <?= $data->nama_agenda ?></span>
              </div>
              </div>

            </div>

            </div>
            <!-- end row -->

              </div>

            </div>
            <div class="modal-footer">
              <a href="<?= base_url('sirapat/admin/agenda/print/'.$data->id) ?>" target="_blank" class="btn btn-primary btn-sm" >

              <i class="fa fa-print">Print</i></a>
              <a href="<?= base_url('sirapat/admin/agenda/pdf/'.$data->id) ?>" target="_blank" class="btn btn-danger btn-sm" >
              <i class="fa fa-file">PDF</i></a>
            </div>
          </div>
        </div>
      </div>


        </tr>

      <?php $i++; ?>
      <?php endforeach; ?>
        
      </tbody>
      </table> 
      </div>
      <!-- endtabel -->

    
      
      </section>
      </div>

          </div>
          </div>
          </div>
          </div>
          </div>
<?php } ?>